<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Curl;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Hash;
use validator;

class CreateServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('customAuth');
    }



    public function Category(Request $request)
    {
        $id = ''; $result = '';
        if (session()->has('service_id') AND session('category_code') ==4 ) {
            $id = session()->get('service_id');
            
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-1/get-create')
                            ->withData( array(
                                'service_id'  => $id,
                                'languaje' => 'ES'
                                ) )
                            ->asJson( true )
                            ->get();
            if($result == "Return Not Found"){
                $result = '';
            }
           
        }else {
            $service = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step/create')
                        ->withData( array(

                            'category_code' => '4',
                            'user_id'  => session()->get('user.id')
                            ) )
                        ->asJson( true )
                        ->post();

            if (is_array($service) && array_key_exists('id', $service)){

            } else {
                $caracters = array('"','[',']',',');
                $service = str_replace($caracters,'',$service);
                if (is_array($service)) {
                    $res = '';
                    foreach ($service as $r) {
                        $res .= $r . '\\n';
                    }
                } else {
                    $res = $service;
                }
               
                return redirect('/becomeahost')->with(['message-alert' => '' . $res . '']);
            }

            $id = $service['id'];

            session()->put('service_id', $id);
            Session::put('category_code',4);
        }

        $recreational=''; $family=''; $sporty=''; $category=''; $category2=''; $selected_entry = ''; $selected_until = '';
        if (isset($result) AND !empty($result) AND !is_null($result) AND $result != 'Return Not Found') {
            $selected_entry = $result[0]['Entry'];
            $selected_until = $result[0]['Until'];
                foreach ($result as $value) {
                    if ($value['type_categories_id'] == 1) {
                        $recreational = $value['Check'];
                    }elseif ($value['type_categories_id'] == 2) {
                        $family = $value['Check'];
                    } elseif ($value['type_categories_id'] == 3) {
                        $sporty = $value['Check'];
                    } elseif ($value['type_categories_id'] == 4) {
                        $category = $value['Check'];
                    } elseif ($value['type_categories_id'] == 5) {
                        $category2 = $value['Check'];
                    }
                }
            }
        return view("CreateService.category", [ 'id' => $id, 'result' => $result, 'recreational'=> $recreational, 'family' => $family, 'sporty' => $sporty, 'category' => $category, 'category2' => $category2,'selected_entry' => $selected_entry, 'selected_until' => $selected_until ]);
    }


    public function SaveCategory(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
            }

        if ($request->input('recreational') !== null) {
                $recreational = ($request->input('recreational') == 'on') ? true:false;
            } else {
                $recreational = false;
            }
        if ($request->input('family') !== null) {
                $family = ($request->input('family') == 'on') ? true:false;
            } else {
                $family = false;
            }
        if ($request->input('sporty') !== null) {
                $sporty = ($request->input('sporty') == 'on') ? true:false;
            } else {
                $sporty = false;
            }
        if ($request->input('category') !== null) {
                $category = ($request->input('category') == 'on') ? true:false;
            } else {
                $category = false;
            }
        if ($request->input('category2') !== null) {
                $category2 = ($request->input('category2') == 'on') ? true:false;
            } else {
                $category2 = false;
            }
        // Enviar los datos a la API para crear un nuevo servicio
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-1/create')
                    ->withHeaders( array(
                        'api-token:'.session()->get('user.remember_token')
                    ))
                    ->withData( array(
                        'user_id' => session()->get('user.id'),
                        'recreational'=>$recreational,
                        'family'=>$family,
                        'sporty'=>$sporty,
                        'category'=>$category,
                        'category2'=>$category2,
                        'service_id' => $id,
                        'num_guest_day'=>$request->input('num_guest_day'),
                        'num_guest_service'=>$request->input('num_guest_service'),
                        'time_service'=>$request->input('time_service'),
                        'duration'=>$request->input('duration'),
                        'entry'=>$request->input('entry'),
                        'until'=>$request->input('until')
                        ) )
                    ->asJson( true )
                    ->post();

       // dd($response);

        $caracters = array('"','[',']',',');
        $response = str_replace($caracters,'',$response);
        if (is_array($response)) {
            $res = '';
            foreach ($response as $r) {
                $res = $r . '\\n';
            }
        } else {
            $res = $response;
        }
        //dd($res);
        if ($res == 'Add Step-1' OR $res == 'Update Step-1'){
            
            return redirect('/create-service/hosting')/*->with(['id' => $request->input('service_id')])*/;
        }else{
            //dd($res);
            return redirect('/create-service/category')->with(['message-alert' => '' . $res  . $request->input('service_id').  ''/*,'id' => $request->input('service_id')*/]);
            }
        }   else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function Hosting(Request $request)
    {
        $id = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            $currencies = Curl::to(env('MIGOHOOD_API_URL').'/currency/get-currency')
                        ->withData( array(
                            //'service_id' => $id,
                            'languaje' => 'ES',
                            ) )
                        ->asJson( true )
                        ->get();
            $durations = Curl::to(env('MIGOHOOD_API_URL').'/duration/get-duration')
                        ->withData( array(
                            //'service_id' => $id,
                            'languaje' => 'ES',
                            ) )
                        ->asJson( true )
                        ->get();
            $payments = Curl::to(env('MIGOHOOD_API_URL').'/payment/get-payment')
                        ->withData( array(
                            //'service_id' => $id,
                            'languaje' => 'ES',
                            ) )
                        ->asJson( true )
                        ->get();
            // Buscamos si existen amenities guardadas para el servicio actual

            $saved_hosting = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-2/get-hosting')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $selected_currency = ''; $selected_duration = ''; $selected_payment = ''; $price = ''; $selected_entry = ''; $selected_until = '';
            if (isset($saved_hosting) AND !empty($saved_hosting) AND !is_null($saved_hosting) AND $saved_hosting != 'Not Found') {
                $selected_currency = $saved_hosting[0]['Currency-Name'];
                $selected_duration = $saved_hosting[0]['Type-Duration'];
                $selected_payment = $saved_hosting[0]['Type-Payment'];
                $price = $saved_hosting[0]['Price'];
                $selected_entry = $saved_hosting[0]['Time-Entry'];
                $selected_until = $saved_hosting[0]['Until'];
            }
            //dd($saved_hosting);
            //dd($payments);
            //dd($selected_until);
            //dd($price);
            return view("CreateService.hosting", ['id' => $id, 'currencies' => $currencies, 'durations' => $durations, 'payments' => $payments, 'selected_currency' => $selected_currency, 'selected_duration' => $selected_duration, 'selected_payment' => $selected_payment, 'price' => $price, 'selected_entry' => $selected_entry, 'selected_until' => $selected_until ] );


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveHosting(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            // Enviar los datos a la API para guardar
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-2/hosting')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                'service_id' => $id,
                                'currency_id' => $request->input('currency'),
                                'price' => $request->input('price'),
                                'duration_code' => $request->input('duration'),
                                'politic_payment_code' => $request->input('politic_payment'),
                                'time_entry' => $request->input('time_entry'),
                                'until' => $request->input('until')
                                ) )
                            ->asJson( true )
                            ->post();
           // dd($response);
            if ($response == 'Update Step 2' OR $response == 'Add Step-2') {
                return redirect('/create-service/basics');
            } else{
                return redirect('/create-service/hosting')->with(['message-alert' =>''.$response.'']);
        } 
    }else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }


    public function Basics(Request $request)
    {

        if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $saved_listing = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-3/get-basics')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $AptoDe2a12 = ''; $AptoDe0a2 = ''; $SeadmitenMascotas = ''; $PermitidoFumar = ''; $Desc_Otro_Evento = ''; $guest_phone = ''; $guest_email = '';  $guest_profile = ''; $guest_payment = ''; $guest_provided = ''; $guest_recomendation = ''; $interaction = '';
             $title = ''; $description = '';
            if (isset($saved_listing) AND !empty($saved_listing) AND !is_null($saved_listing) AND $saved_listing != 'Not Found') {
                foreach ($saved_listing as $value) {
                    if ($value['rules_id'] == 1) {
                        $AptoDe2a12 = $value['Check'];
                    } elseif ($value['rules_id'] == 2) {
                        $AptoDe0a2 = $value['Check'];
                    } elseif ($value['rules_id'] == 3) {
                        $SeadmitenMascotas = $value['Check'];
                    } elseif ($value['rules_id'] == 4) {
                        $PermitidoFumar = $value['Check'];
                    } elseif ($value['rules_id'] == 6) {
                        $Desc_Otro_Evento = $value['Description'];
                    } elseif ($value['rules_id'] == 7) {
                        $guest_phone = $value['Check'];
                    } elseif ($value['rules_id'] == 8) {
                        $guest_email = $value['Check'];
                    } elseif ($value['rules_id'] == 9) {
                        $guest_profile = $value['Check'];
                    } elseif ($value['rules_id'] == 10) {
                        $guest_payment = $value['Check'];
                    } elseif ($value['rules_id'] == 11) {
                        $guest_provided = $value['Check'];
                    } elseif ($value['rules_id'] == 12) {
                        $guest_recomendation = $value['Check'];
                    } elseif ($value['description_id'] == 13) {
                        $interaction = $value['content'];
                    } elseif ($value['description_id'] == 1) {
                        $title = $value['content'];
                    } elseif ($value['description_id'] == 8) {
                        $description = $value['content'];
                    }elseif ($value['description_id'] == 13) {
                        $interaction = $value['content'];
                    }
                }
            }
            //dd($saved_listing);
            //return;

            return view("CreateService.basics", ['id' => $id, 'AptoDe2a12' => $AptoDe2a12, 'AptoDe0a2' => $AptoDe0a2, 'SeadmitenMascotas' => $SeadmitenMascotas, 'PermitidoFumar' => $PermitidoFumar, 'Desc_Otro_Evento' => $Desc_Otro_Evento, 'guest_phone' => $guest_phone, 'guest_email' => $guest_email,  'guest_profile' => $guest_profile, 'guest_payment' => $guest_payment, 'guest_provided' => $guest_provided, 'guest_recomendation' => $guest_recomendation, 'interaction' => $interaction ]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveBasics(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }



            if ($request->input('AptoDe2a12') !== null) {
                $AptoDe2a12 = ($request->input('AptoDe2a12') == 'on') ? true:false;
            } else {
                $AptoDe2a12 = false;
            }
            if ($request->input('AptoDe0a2') !== null) {
                $AptoDe0a2 = ($request->input('AptoDe0a2') == 'on') ? true:false;
            } else {
                $AptoDe0a2 = false;
            }
            if ($request->input('SeadmitenMascotas') !== null) {
                $SeadmitenMascotas = ($request->input('SeadmitenMascotas') == 'on') ? true:false;
            } else {
                $SeadmitenMascotas = false;
            }
            if ($request->input('PermitidoFumar') !== null) {
                $PermitidoFumar = ($request->input('PermitidoFumar') == 'on') ? true:false;
            } else {
                $PermitidoFumar = false;
            }

            if ($request->input('guest_phone') !== null) {
                $guest_phone = ($request->input('guest_phone') == 'on') ? true:false;
            } else {
                $guest_phone = false;
            }
            if ($request->input('guest_email') !== null) {
                $guest_email = ($request->input('guest_email') == 'on') ? true:false;
            } else {
                $guest_email = false;
            }
            if ($request->input('guest_profile') !== null) {
                $guest_profile = ($request->input('guest_profile') == 'on') ? true:false;
            } else {
                $guest_profile = false;
            }
            if ($request->input('guest_payment') !== null) {
                $guest_payment = ($request->input('guest_payment') == 'on') ? true:false;
            } else {
                $guest_payment = false;
            }
            if ($request->input('guest_provided') !== null) {
                $guest_provided = ($request->input('guest_provided') == 'on') ? true:false;
            } else {
                $guest_provided = false;
            }
            if ($request->input('guest_recomendation') !== null) {
                $guest_recomendation = ($request->input('guest_recomendation') == 'on') ? true:false;
            } else {
                $guest_recomendation = false;
            }


            // Enviar los datos a la API para crear nuevas habitaciones
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-3/basics')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'AptoDe2a12' => $AptoDe2a12,
                            'AptoDe0a2' => $AptoDe0a2,
                            'SeadmitenMascotas' => $SeadmitenMascotas,
                            'PermitidoFumar' => $PermitidoFumar,
                            'Desc_Otro_Evento' => $request->input('Desc_Otro_Evento'),
                            'desc_guest' => $request->input('des_guest'),
                            'guest_phone' => $guest_phone,
                            'guest_email' => $guest_email,
                            'guest_profile' => $guest_profile,
                            'guest_payment' => $guest_payment,
                            'guest_provided' => $guest_provided,
                            'guest_recomendation' => $guest_recomendation,
                            'des_title' => $request->input('title'),
                            'description' => $request->input('description')
                            ) )
                        ->asJson( true )
                        ->post();

            //dd($response);
            if ($response == 'Update Step-3' OR $response == 'Add Step-3') {
                return redirect('/create-service/photos');
            } else {
                return redirect('/create-service/basics')->with(['message-alert' =>''.$response.'']);
            }


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }

    public function Photos(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            $res= Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-4/get-image')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id
                        ) )
                        ->asJson( true )
                        ->get();
            //dd($res);
            $photo1 = ''; $description1 = '';$photo2 = ''; $description2 = '';
            if (isset($res) AND !empty($res) AND !is_null($res) AND $res != 'Not Found') {
                if (isset($res[0]['ruta'])) {
                    $photo1 = $res[0]['ruta'];
                    $description1 = $res[0]['description'];
                }

                if (isset($res[1]['ruta'])) {
                    $photo2 = $res[1]['ruta'];
                    $description2 = $res[1]['description'];
                }

            }

            return view("CreateService.photos", ['id' => $id, 'photo1' => $photo1, 'description1' => $description1, 'photo2' => $photo2, 'description2' => $description2]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SavePhotos(Request $request)
    {

        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }
            $rules = array(
                'file1' => 'image',
                'file2' => 'image'
            );
            $validator = \Validator::make($request->all(), $rules);
            if($validator->fails())
            {
                //return response()->json($validator->errors()->all());
                return redirect('/create-service/photos')->with(['message-alert' =>''.$validator->errors()->all().'']);
            }
            $img1 = ''; $desc1 = ''; $name1 = '';
            // Verifico si me da indicio de que ya habia una foto guardada
            if ($request->has('old1') AND $request->input('old1') == '1') {
                //echo "string";
                // se va a reemplazar el viejo
                if ($request->hasFile('file1')) {
                    //echo "string1";
                    $img1 = $request->file('file1');
                    $name1 = 'imagen'.str_random(20).'_service_'.$id.'.'.$img1->getClientOriginalExtension();
                }

                if ($request->has('description1')) {
                    //echo "string2";
                    $desc1 = $request->input('description1');
                }
            } elseif ($request->hasFile('file1')) {
                //echo "string3";
                $img1 = $request->file('file1');
                $name1 = 'imagen'.str_random(20).'_service_'.$id.'.'.$img1->getClientOriginalExtension();
                if ($request->has('description1')) {
                    //echo "string4";
                    $desc1 = $request->input('description1');
                }
            }

            $img2 = ''; $desc2 = ''; $name2 = '';
            // Verifico si me da indicio de que ya habia una foto guardada
            if ($request->has('old2') AND $request->input('old2') == 1) {
                // se va a reemplazar el viejo
                if ($request->hasFile('file2')) {
                    $img2 = $request->file('file2');
                    $name2 = 'imagen'.str_random(20).'_service_'.$id.'.'.$img2->getClientOriginalExtension();
                }

                if ($request->has('description2')) {
                    $desc2 = $request->input('description2');
                }
            } elseif ($request->hasFile('file2')) {
                $img2 = $request->file('file2');
                $name2 = 'imagen'.str_random(20).'_service_'.$id.'.'.$img2->getClientOriginalExtension();
                if ($request->has('description2')) {
                    $desc2 = $request->input('description2');
                }
            }

            if (!empty($name1)) {
                $img1->move('/files/images/',$name1);
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-4/image')
                            ->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name1),
                                "description" => $desc1
                            ))
                            ->containsFile()
                            ->post();

                //unlink('files/images/'.$name1);
                //dd($res);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-services/photos')->with(['message-alert' =>''.$res.'']);
                }
            }

            if (!empty($name2)) {
                $img2->move('/files/images/',$name2);
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-4/image')
                            ->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name2),
                                "description" => $desc2
                            ))
                            ->containsFile()
                            ->post();
               // unlink('files/images/'.$name2);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-service/photos')->with(['message-alert' =>''.$res.'']);
                }
            }

            return redirect('/create-service/location');

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function Location(Request $request)
    {
        $id='';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($id);
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-5/get-location')
                        ->withData( array(
                            'service_id'  => $id
                            ) )
                        ->asJson( true )
                        ->get();

            //dd($result);
            $address = ''; $apartment = ''; $description = ''; $states = ''; $cities = ''; $longitude = ''; $latitude = ''; $around = '';
            if (isset($result) AND !empty($result) AND !is_null($result) AND $result != 'Not Found') {
                foreach ($result as $key) {
                    if ($key['type'] == 'Address1') {
                        $address = $key['content'];
                    } elseif ($key['type'] == 'Address2') {
                        $apartment = $key['content'];
                    } elseif ($key['type'] == 'Desc_Neighborhood') {
                        $description = $key['content'];
                    } elseif ($key['type'] == 'Desc_Surroundings') {
                        $around = $key['content'];
                    } elseif ($key['type'] == 'Longitude') {
                        $longitude = $key['content'];
                    } elseif ($key['type'] == 'Latitude') {
                        $latitude = $key['content'];
                    }
                }

                //dd($latitude);

                $states = Curl::to(env('MIGOHOOD_API_URL').'/state/get-state')
                            ->withData( array(
                                'country_id' => $result[0]['country_id'],
                                ) )
                            ->asJson( true )
                            ->get();
                //print_r($states);
                $cities = Curl::to(env('MIGOHOOD_API_URL').'/city/get-city')
                            ->withData( array(
                                'state_id' => $result[0]['state_id'],
                                ) )
                            ->asJson( true )
                            ->get();
                //print_r($cities);
                //return;
            } else {
                $result = '';
            }

            $countries = Curl::to(env('MIGOHOOD_API_URL').'/country/get-country')
                            ->asJson( true )
                            ->get();


            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
                session()->put('message-alert', ''.$msg.'');
            }

            return view("CreateService.locations", ['id' => $id, 'countries' => $countries, 'result' => $result, 'address' => $address, 'apartment' => $apartment, 'description' => $description, 'around' => $around, 'states' => $states, 'cities' => $cities, 'longitude' => $longitude, 'latitude' => $latitude]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }

    public function SaveLocation(Request $request)
    {
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-5/location')
                    ->withHeaders( array(
                        'api-token:'.session()->get('user.remember_token')
                    ))
                    ->withData( array(
                        'service_id' => $request->input('service_id'),
                        'country_id' => $request->input('country'),
                        'city_id' => $request->input('city'),
                        'zipcode' => $request->input('zipcode'),
                        'state_id' => $request->input('state'),
                        'address1' => $request->input('address'),
                        'apt' => $request->input('apartment'),
                        'des_neighborhood' => $request->input('info'),
                        'des_around' => $request->input('around'),
                        'des_longitude' => $request->input('longitude'),
                        'des_latitude' => $request->input('latitude')
                        ) )
                    ->asJson( true )
                    ->post();


        if ($response == 'Add Location' OR $response == 'Update Location') {
            return redirect('/create-service/notes');
        } else {
            return redirect('/create-service/location')->with(['message-alert' =>''.$response.'']);
        }

    }


    public function Notes(Request $request)
    {
         if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

        $saved_notes = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-6/get-notes')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $anything = ''; $alcohol = ''; $certification = ''; $requiments = ''; $aditional = ''; $norequiments = ''; $food = ''; $Snacks = ''; $drinks = ''; $transport = ''; $accommodation = ''; $other = ''; $nooffers = '';$aditional2 = '';  $food2 = ''; $Snacks2 = ''; $drinks2 = ''; $transport2 = ''; $accommodation2 = ''; $other2 = ''; 
            if (isset($saved_notes) AND !empty($saved_notes) AND !is_null($saved_notes) AND $saved_notes != 'Not Found') {
                foreach ($saved_notes as $value) {
                    if ($value['emergency_id'] == 21) {
                        $anything = $value['content'];
                    } elseif ($value['emergency_id'] == 22) {
                        $alcohol = $value['check'];
                    } elseif ($value['emergency_id'] == 23) {
                        $certification = $value['check'];
                    } elseif ($value['emergency_id'] == 24) {
                        $requiments = $value['content'];
                    } elseif ($value['emergency_id'] == 25) {
                        $aditional = $value['check'];
                        $aditional = $value['content'];
                    } elseif ($value['emergency_id'] == 26) {
                        $norequiments = $value['check'];
                    } elseif ($value['emergency_id'] == 27) {
                        $food = $value['check'];
                        $food2 = $value['content'];
                    } elseif ($value['emergency_id'] == 28) {
                        $Snacks = $value['check'];
                        $Snacks2 = $value['content'];
                    } elseif ($value['emergency_id'] == 29) {
                        $drinks = $value['check'];
                        $drinks2 = $value['content'];
                    } elseif ($value['emergency_id'] == 30) {
                        $transport = $value['check'];
                        $transport2 = $value['content'];
                    } elseif ($value['emergency_id'] == 31) {
                        $accommodation = $value['check'];
                        $accommodation2 = $value['content'];
                    } elseif ($value['emergency_id'] == 32) {
                        $other = $value['check'];
                        $other2 = $value['content'];
                    } elseif ($value['emergency_id'] == 33) {
                        $nooffers = $value['content'];
                    }
                }
            }
            //dd($saved_notes);
            return view("CreateService.notes", ['id' => $id, 'anything' => $anything, 'alcohol' => $alcohol, 'certification' => $certification, 'requiments' => $requiments, 'aditional2' => $aditional2, 'aditional' => $aditional, 'norequiments' => $norequiments, 'food' => $food, 'Snacks' => $Snacks, 'drinks' => $drinks, 'transport' => $transport, 'accommodation'=>$accommodation, 'other'=>$other,'nooffers'=>$nooffers, 'food2' => $food2, 'Snacks2' => $Snacks2, 'drinks2' => $drinks2, 'transport2' => $transport2, 'accommodation2'=>$accommodation2, 'other2'=>$other2 ]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveNotes(Request $request){
            if (session()->has('service_id')) {
                $id = session()->get('service_id');
                $msg = '';
                if (session()->has('message-alert')) {
                    $msg = session()->get('message-alert');
                    session()->forget('message-alert');
                }

                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-6/notes')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                'service_id' => $id,
                                'desc_anything'=> !empty($request->input('desc_anything')) ? $request->input('desc_anything'):'',
                                'bool_alcohol'=> $request->input('bool_alcohol') !== null ?  1 : 0,
                                'bool_certification'=> $request->input('bool_certification') !== null ?  1 : 0,
                                'desc_requiments'=> !empty($request->input('desc_requiments'))?  $request->input('desc_requiments'):'',
                                'bool_aditional'=> $request->input('bool_aditional') !== null ?  1 : 0,
                                'desc_aditional'=> !empty($request->input('desc_aditional'))?  $request->input('desc_aditional'):'',
                                'bool_norequiments'=> $request->input('bool_norequiments') !== null ? 1 : 0,
                                'bool_food'=> $request->input('bool_food') !== null ?  1 : 0,
                                'desc_food'=> !empty($request->input('desc_food'))?  $request->input('desc_food'):'',
                                'bool_snacks'=> $request->input('bool_snacks') !== null ?  1 : 0,
                                'desc_snacks'=> !empty($request->input('desc_snacks'))?  $request->input('desc_snacks'):'',
                                'bool_drinks'=> $request->input('bool_drinks') !== null ?  1 : 0,
                                'desc_drinks'=> !empty($request->input('desc_drinks'))?  $request->input('desc_drinks'):'',
                                'bool_transport'=> $request->input('bool_transport') !== null ?  1 : 0,
                                'desc_transport'=> !empty($request->input('desc_transport'))?  $request->input('desc_transport'):'',
                                'bool_accommodation'=> $request->input('bool_accommodation') !== null ?  1 : 0,
                                'desc_accommodation'=> !empty($request->input('desc_accommodation'))?  $request->input('desc_accommodation'):'',
                                'bool_other'=> $request->input('bool_other') !== null ?  1 : 0,
                                'desc_other'=> !empty($request->input('desc_other'))?  $request->input('desc_other'):'',
                                'bool_nooffers'=> $request->input('bool_nooffers') !== null ?  1 : 0,
                                ) )
                            ->asJson( true )
                            ->post();
                //dd($res);

                if($res == "Service not found" && $res !="Update Note emergency"){
                    return redirect("create-service/note")->with(['message-alert' =>''.$res.'']);
                }elseif($res=="Update Note emergency" || $res == "Add Note emergency"){
                    return redirect('/create-service/co-host');
                }
            } else {
                return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
            }

        }

    public function CoHost(Request $request)
    {
        return view("CreateService.co-host");
    } 

    public function Preview1(Request $request)
    {
        return view("CreateService.PreviewService.preview1");
    }

    public function Preview2(Request $request)
    {
        return view("CreateService.PreviewService.preview2");
    }

    public function Preview3(Request $request)
    {
        $data['service_id'] = session()->get('service_id');
        $data['languaje'] = 'ES';
      
        $overview3 = Curl::to(env('MIGOHOOD_API_URL').'/service/services/preview-overviews')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();

        return view("CreateService.PreviewService.preview3",['overview3'=>$overview3]);
    }

    public function Preview4(Request $request)
    {
        $data['service_id'] = session()->get('service_id');
          $data['languaje'] = 'ES';

          $overview4 = Curl::to(env('MIGOHOOD_API_URL').'/service/services/preview-map-neighborhood')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();

            $latitude = Curl::to(env('MIGOHOOD_API_URL').'/service/services/preview-map-neighborhood-latitude')
                            ->withData( array(
                                'service_id' => $data['service_id'],
                                'languaje' => $data['languaje'],
                                ) )
                            ->asJson( true )
                            ->get();

            $longitude = Curl::to(env('MIGOHOOD_API_URL').'/service/services/preview-map-neighborhood-longitude')
                            ->withData( array(
                                'service_id' => $data['service_id'],
                                'languaje' => $data['languaje'],
                                ) )
                            ->asJson( true )
                            ->get();

        return view("CreateService.PreviewService.preview4",['latitude' => $latitude, 'longitude' =>$longitude,'overview4'=>$overview4]);
    }

    public function GetStates(Request $request)
    {
        $states = Curl::to(env('MIGOHOOD_API_URL').'/state/get-state')
                        ->withData( array(
                            'country_id' => $request->input('id'),
                            ) )
                        ->asJson( true )
                        ->get();

        return $states;
    }

    public function GetCities(Request $request)
    {
        $cities = Curl::to(env('MIGOHOOD_API_URL').'/city/get-city')
                        ->withData( array(
                            'state_id' => $request->input('id'),
                            ) )
                        ->asJson( true )
                        ->get();

        return $cities;
    }
    public function SaveServiceDay(Request $request)
    {
        $data = $request->all();
        //dd($data);
        settype($data['lock'], 'boolean');
        $rsp = Curl::to(env('MIGOHOOD_API_URL').'/service/day')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'date' =>  $data['date'],
                            'lock' =>  $data['lock']

                            ) )
                        ->asJson( true )
                        ->post();

        return $rsp;
    }

    public function UpdateServiceDay(Request $request)
    {

        $data = $request->all();
        //settype($data['lock'], 'boolean');
        $data['lock']=json_decode($request['lock']);
        $rsp = Curl::to(env('MIGOHOOD_API_URL').'/service/update-day')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'date' =>  $data['date'],
                            'lock' =>  $data['lock']
                            ) )
                        ->asJson( true )
                        ->put();

        return $rsp;
    }

    public function GetServiceDay(Request $request)
    {
        //dd('hola');
        $data = $request->all();
        //dd($data);
        $rsp = Curl::to(env('MIGOHOOD_API_URL').'/service/get-day')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            ) )
                        ->asJson( true )
                        ->get();

        return $rsp;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

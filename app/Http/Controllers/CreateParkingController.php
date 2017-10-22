<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Curl;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Hash;
use validator;

class CreateParkingController extends Controller
{
    public function __construct()
    {
        $this->middleware('customAuth');
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
        public function First()
    {
        $id = ''; $result = '';
        if (session()->has('service_id') AND session('category_code') ==3 ) {
            $id = session()->get('service_id');
            //
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-1/get-create')
                            ->withData( array(
                                'service_id'  => $id,
                                'languaje' => 'ES'
                                ) )
                            ->asJson( true )
                            ->get();
           
        } else {
            $service = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step/create')
                        ->withData( array(
                            'category_code' => '3',
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
            Session::put('category_code',3);
        }


        $types = Curl::to(env('MIGOHOOD_API_URL').'/category/parking/get-type')
                    ->withData( array(
                        'category_id' => '3',
                        'languaje'  => "ES",
                        ) )
                    ->asJson( true )
                    ->get();


        return view("CreateParking.placeType", ['types' => $types, 'id' => $id, 'result' => $result]);
    }

    public function SaveFirst(Request $request){

        // Enviar los datos a la API para crear un nuevo espacio
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-1/create')
                    ->withHeaders( array(
                        'api-token:'.session()->get('user.remember_token')
                    ))
                    ->withData( array(
                        'user_id' => session()->get('user.id'),
                        'type_code'  => $request->input('type'),
                        'num_space'  => $request->input('num_space'),
                        'live'  => $request->input('live'),
                        'service_id' => $request->input('service_id')
                        ) )
                    ->asJson( true )
                    ->post();

        //dd($response);

        $caracters = array('"','[',']',',');
        $response = str_replace($caracters,'',$response);
        if (is_array($response)) {
            $res = '';
            foreach ($response as $r) {
                $res .= $r . '\\n';
            }
        } else {
            $res = $response;
        }

        if ($res == 'Add Type ' OR $res == 'Update Type ')
            return redirect('/create-parking/bedrooms');
        else
            return redirect('/create-parking/place-type')->with(['message-alert' => '' . $res . $request->input('service_id').  '']);

    }


public function Second1()
    {
        $id = ''; $result = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-2/get-bedrooms')
                            ->withData( array(
                                'service_id'  => $id
                                ) )
                            ->asJson( true )
                            ->get();
            //dd($result);
            if (!is_array($result) AND $result == 'Not Found') {
                $result = '';
            }
            return view("CreateParking.bedrooms", ['id' => $id, 'result' => $result]);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }

    public function AddBedrooms(Request $request)
    {
        //dd($request->all());
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-2/bedrooms')
                    ->withData( array(
                        'service_id' => $request->input('service_id'),
                        'num_guest'  => $request->input('guests_number'),
                        'num_bedroom'  => $request->input('bedrooms_number'),
                        ) )
                    ->asJson( true )
                    ->post();
        //dd($response);

        $caracters = array('"','[',']',',');
        $response = str_replace($caracters,'',$response);
        if (is_array($response)) {
            $res = '';
            foreach ($response as $r) {
                $res .= $r . '\\n';
            }
        } else {
            $res = $response;
        }

        if ($res == 'Add Space Bedroom') {
            return redirect('/create-parking/bedrooms/edit-bedrooms');
        } else
            return redirect('/create-parking/bedrooms')->with(['message-alert' => '' . $res . '']);
        //}

    }


    public function Second2()
    {
        /** Se guardan las sesiones creadas anteriormente en variables
        * para garantizar su persistencia
        */
        $id = '';
        //dd(session()->has('service_id'));
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //
        }
        $msg = '';
        if (session()->has('msg')) {
            $msg = session()->get('msg');
            session()->forget('msg');
        }

        $result = Curl::to(env('MIGOHOOD_API_URL').'/service/get-beds')
                        ->withData( array(
                            'service_id' => $id,
                            'languaje' => 'ES',
                            ) )
                        ->asJson( true )
                        ->get();

        //dd($result);
        // Si es un array y existe el valor bedroom_id se dirige a la proxima vista
        if (is_array($result) && array_key_exists('bedroom_id', $result[0])) {
            $bedrooms = array();
            $aux=0;
            foreach ($result as $key) {
                $response = Curl::to(env('MIGOHOOD_API_URL').'/service/get-bed-bedroom')
                        ->withData( array(
                            'bedroom_id' => $key['bedroom_id'],
                            'languaje' => 'ES',
                            ) )
                        ->asJson( true )
                        ->get();

                if (empty($response)) {
                   $bedrooms[$aux]['bedroom_id'] = $key['bedroom_id'];
                   $bedrooms[$aux]['bed_quantity'] = 0;
                   $aux++;

                } else {
                    //dd($response);
                    $bed_quantity = 0;
                    for ($i=0; $i < count($response); $i++) {
                        //$bedrooms[$aux]['bedroom_id'] = $response[$i]['bedroom_id'];
                        $bed_quantity += $response[$i]['bed_quantity'];
                    }
                    $bedrooms[$aux]['bedroom_id'] = $response[0]['bedroom_id'];
                    $bedrooms[$aux]['bed_quantity'] = $bed_quantity;
                    $aux++;
                }

            }

            //dd($bedrooms);


            if ($msg == ''){
                return view("CreateParking.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
            } else {
                session()->put('message-alert', '' . $msg . '');
                return view("CreateParking.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
            }


        // Si no, se retorna un mensaje al usuario
        } else {
            $caracters = array('"','[',']',',');
            $response = str_replace($caracters,'',$response);
            if (is_array($response)) {
                $res = '';
                foreach ($response as $r) {
                    $res .= $r . '\\n';
                }
            } else {
                $res = $response;
            }

            return redirect('/')->with(['message-alert' => '' . $res . '']);
        }

    }

    public function Second3(Request $request)
    {
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/get-bed-bedroom-data')
                        ->withData( array(
                            'user_id' => session()->get('user.id'),
                            'bedroom_id' => $request->input('bedroom_id'),
                            'languaje' => 'ES',
                            ) )
                        ->asJson( true )
                        ->get();

        if ($response == 'The user does not have a room or user not found') {
            $caracters = array('"','[',']',',');
            $response = str_replace($caracters,'',$response);
            if (is_array($response)) {
                $res = '';
                foreach ($response as $r) {
                    $res .= $r . '\\n';
                }
            } else {
                $res = $response;
            }

            return redirect('/')->with(['message-alert' => '' . $res . '']);
        } else {

            $beds = array();
            if (is_array($response)) {
                //$beds = array();
                //dd($response);
                $qty = 0;
                foreach ($response as $value) {
                    if ($value['bed_id'] == 1 OR $value['bed_id'] == 6) {
                        $beds['double_bed'] = $value['quantity'];
                        $qty += $value['quantity'];
                    } elseif ($value['bed_id'] == 2 OR $value['bed_id'] == 7) {
                        $beds['queen_bed'] = $value['quantity'];
                        $qty += $value['quantity'];
                    } elseif ($value['bed_id'] == 3 OR $value['bed_id'] == 8) {
                        $beds['individual_bed'] = $value['quantity'];
                        $qty += $value['quantity'];
                    } elseif ($value['bed_id'] == 4 OR $value['bed_id'] == 9) {
                        $beds['sofa_bed'] = $value['quantity'];
                        $qty += $value['quantity'];
                    } elseif ($value['bed_id'] == 5 OR $value['bed_id'] == 10) {
                        $beds['other_bed'] = $value['quantity'];
                        $qty += $value['quantity'];
                    }
                }
                $beds['quantity'] = $qty;

            }

            //dd($beds);

            // Se retorna la vista con las variables
            return view("CreateParking.bedrooms-addbed",['id' => $request->input('service_id'), 'bedroom_id' => $request->input('bedroom_id'), 'refer' => $request->input('refer'), 'beds' => $beds]);
        }

    }

    public function SaveBeds(Request $request)
    {

        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($request->all());
            // Enviar los datos a la API para crear nuevas habitaciones
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-2/beds/details')
                        ->withData( array(
                            'service_id' => $id,
                            'bedroom_id' => $request->input('bedroom_id'),
                            'queen_bed' => ($request->has('queen') AND !empty($request->input('queen'))) ? $request->input('queen') : '',
                            'double_bed' => ($request->has('doble') AND !empty($request->input('doble'))) ? $request->input('doble') : '',
                            'individual_bed'  => ($request->has('individual') AND !empty($request->input('individual'))) ? $request->input('individual') : '',
                            'sofa_bed' => ($request->has('sofa') AND !empty($request->input('sofa'))) ? $request->input('sofa') : '',
                            'other_bed'  => ($request->has('otras') AND !empty($request->input('otras'))) ? $request->input('otras') : '',
                            ) )
                        ->asJson( true )
                        ->post();
            //dd($response);

            if ($response == 'Add Bedroom-Beds' OR $response == 'Update  Bedroom-Beds') {
                return redirect('/create-parking/bedrooms/edit-bedrooms');
            } else {
                return redirect('/create-parking/bedrooms/edit-bedrooms')->with(['msg' => ''.$response.'']);
            }
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }

        public function Third()
    {
         $id = ''; $result='';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($id);
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-3/get-bathroom')
                        ->withData( array(
                            'service_id'  => $id
                            ) )
                        ->asJson( true )
                        ->get();

        }
        $msg = '';
        if (session()->has('message-alert')) {
            $msg = session()->get('message-alert');
            session()->forget('message-alert');
        }

        if (!is_array($result) AND $result == 'Not Found') {
            $result = '';
        }
        if ($msg == '') {
            return view("CreateParking.baths", ['id' => $id,'result' => $result]);
        } else {
            session()->put('message-alert', ''.$msg.'');
            return view("CreateParking.baths", ['id' => $id,'result' => $result]);
        }
    }

    public function SaveThird(Request $request){

        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-3/bathroom')
                        ->withHeaders(array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $request->input('service_id'),
                            'num_bathroom' => $request->input('num_bathroom'),
                            ) )
                        ->asJson( true )
                        ->put();
        if ($response == 'Add Step 3') {
            return redirect('/create-parking/location')->with(['id' => $request->input('service_id')]);
        } else {
            $caracters = array('"','[',']',',');
            $response = str_replace($caracters,'',$response);
            if (is_array($response)) {
                $res = '';
                foreach ($response as $r) {
                    $res .= $r . '\\n';
                }
            } else {
                $res = $response;
            }
            return redirect('/create-parking/baths')->with(['message-alert' => '' . $res . '']);
        }

    }

        public function Fourth()
    {
        $id='';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($id);
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-4/get-location')
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

            return view("CreateParking.locations", ['id' => $id, 'countries' => $countries, 'result' => $result, 'address' => $address, 'apartment' => $apartment, 'description' => $description, 'around' => $around, 'states' => $states, 'cities' => $cities, 'longitude' => $longitude, 'latitude' => $latitude]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }
    }

    public function SaveFourth(Request $request){
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-4/location')
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

        $caracters = array('"','[',']',',');
        $response = str_replace($caracters,'',$response);
        if (is_array($response)) {
            $res = '';
            foreach ($response as $r) {
                $res .= $r . '\\n';
            }
        } else {
            $res = $response;
        }


        if ($res == 'Add Location' OR $res == 'Update Location') {
            return redirect('/create-parking/amenities');
        } else {
            return redirect('/create-parking/location')->with(['message-alert' =>''.$res.'']);
        }

    }

    public function Fifth(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $amenities = Curl::to(env('MIGOHOOD_API_URL').'/amenities/get-parking-amenities')
                        ->withData( array(
                            'languaje' => 'ES',
                            'service_id'=>$id,
                            ))
                        ->asJson( true )
                        ->get();

            $saved_amenites = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-5/get-aminites')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();

            $security = ''; $padlock = ''; $vigilant = ''; $permission = ''; $other = ''; $valet=''; 
           
            $instruction='';

            if (isset($saved_amenites) AND !empty($saved_amenites) AND !is_null($saved_amenites) AND $saved_amenites != 'Not Found') {
                foreach ($saved_amenites as $value) {
                    if ($value['amenite_id'] == 42 OR $value['amenite_id'] == 41) {
                        $security = $value['Check'];
                    } elseif ($value['amenite_id'] == 44 OR $value['amenite_id'] == 43) {
                        $padlock = $value['Check'];
                    } elseif ($value['amenite_id'] == 46 OR $value['amenite_id'] == 45) {
                        $vigilant = $value['Check'];
                    } elseif ($value['amenite_id'] == 48 OR $value['amenite_id'] == 47) {
                        $permission = $value['Check'];
                    } elseif ($value['amenite_id'] == 50 OR $value['amenite_id'] == 49) {
                        $valet = $value['Check'];
                    } elseif ($value['amenite_id'] == 52 OR $value['amenite_id'] == 51) {
                        $other = $value['Check'];
                    } 
                }
                 $instruction= $saved_amenites[0]['description'];
            
            }
                return view("CreateParking.amenities")->with(['id' => $id, 'security' => $security, 'padlock' => $padlock, 'vigilant' => $vigilant, 'permission' => $permission, 'other' => $other, 'valet'=>$valet,'instruction'=> $instruction ]);
        }else{
            return view("CreateParking.amenities")->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }
    }

    public function SaveFifth(Request $request){
         if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }


            // Enviar los datos a la API para crear nuevas habitaciones
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-5/amenities')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'security' => $request->input('security') !== null ?  1 : 0,
                            'padlock' => $request->input('padlock') !== null ?  1 : 0,
                            'vigilant' =>$request->input('vigilant') !== null ?  1 : 0,
                            'permission' => $request->input('permission') !== null ?  1 : 0,
                            'valet' => $request->input('valet') !== null ?  1 : 0,
                            'other' => $request->input('other') !== null ?  1 : 0,
                            'instruction'=>$request->input("instruction"),
                       ) )
                        ->asJson( true )
                        ->post();

            //dd($response);
            if ($response == 'Update Step-5' OR $response == 'Add Step-5') {
                return redirect('/create-parking/hosting');
            } else {
                return redirect('/create-parking/amenities')->with(['message-alert' =>''.$response.'']);
            }


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }

        public function Sixth()
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

            $saved_hosting = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-6/get-hosting')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $selected_currency = ''; $selected_duration = ''; $selected_payment = ''; $price = ''; $selected_entry = ''; $selected_until = ''; $selected_departure = '';
            if (isset($saved_hosting) AND !empty($saved_hosting) AND !is_null($saved_hosting) AND $saved_hosting != 'Not Found') {
                $selected_currency = $saved_hosting[0]['Currency-Name'];
                $selected_duration = $saved_hosting[0]['Type-Duration'];
                $selected_payment = $saved_hosting[0]['Type-Payment'];
                $price = $saved_hosting[0]['Price'];
                $selected_entry = $saved_hosting[0]['Time-Entry'];
                $selected_until = $saved_hosting[0]['Until'];
                $selected_departure = $saved_hosting[0]['Departure-Time'];
            }
            //dd($saved_hosting);
            //dd($payments);
            //dd($selected_until);
            return view("CreateParking.hosting", ['id' => $id, 'currencies' => $currencies, 'durations' => $durations, 'payments' => $payments, 'selected_currency' => $selected_currency, 'selected_duration' => $selected_duration, 'selected_payment' => $selected_payment, 'price' => $price, 'selected_entry' => $selected_entry, 'selected_until' => $selected_until, 'selected_departure' => $selected_departure] );


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveSixth(Request $request){
        

    }

        public function Seventh()
    {
        $id = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $saved_basics = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-7/get-basics')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $title = ''; $description = ''; $place = ''; $access = ''; $share1 = ''; $share2 = ''; $interaction = ''; $other = '';
            if (isset($saved_basics) AND !empty($saved_basics) AND !is_null($saved_basics) AND $saved_basics != 'Not Found') {
                foreach ($saved_basics as $value) {
                    if ($value['description_id'] == 1) {
                        $title = $value['content'];
                    } elseif ($value['description_id'] == 8) {
                        $description = $value['content'];
                    } elseif ($value['description_id'] == 9) {
                        $place = $value['content'];
                    } elseif ($value['description_id'] == 10) {
                        $access = $value['content'];
                    } elseif ($value['description_id'] == 11) {
                        $share1 = $value['check'];
                    } elseif ($value['description_id'] == 12) {
                        $share2 = $value['check'];
                    } elseif ($value['description_id'] == 13) {
                        $interaction = $value['content'];
                    } elseif ($value['description_id'] == 14) {
                        $other = $value['content'];
                    }
                }
            }
            //print_r($saved_basics);
            //return;
            return view("CreateParking.basics", ['id' => $id, 'title' => $title, 'description' => $description, 'place' => $place, 'access' => $access, 'share1' => $share1, 'share2' => $share2, 'interaction' => $interaction, 'other' => $other]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveSeventh(Request $request){
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            // Enviar los datos a la API para crear nuevas habitaciones
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-7/basics')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'des_title' => $request->input('title'),
                            'description' => $request->input('description'),
                            'desc_crib' => $request->input('crib'),
                            'desc_acc' => $request->input('acc'),
                            ) )
                        ->asJson( true )
                        ->post();

            //dd($response);
        $caracters = array('"','[',']',',');
        $response = str_replace($caracters,'',$response);
        if (is_array($response)) {
            $res = '';
            foreach ($response as $r) {
                $res .= $r . '\\n';
            }
        } else {
            $res = $response;
        }


            if ($res == 'Update Step-7' OR $res == 'Add Step-7') {
                return redirect('/create-parking/listing');
            } else {
                return redirect('/create-parking/basics')->with(['message-alert' =>''.$res.'']);
            }

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

        public function Eigth()
    {if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $saved_listing = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-8/get-rules')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $AptoDe2a12 = ''; $AptoDe0a2 = ''; $SeadmitenMascotas = ''; $PermitidoFumar = ''; $Eventos = ''; $Desc_Otro_Evento = ''; $guest_phone = ''; $guest_email = '';  $guest_profile = ''; $guest_payment = ''; $guest_provided = ''; $guest_recomendation = ''; $Desc_Instructions = ''; $Desc_Name_Network = ''; $Password_Wifi = '';
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
                    } elseif ($value['rules_id'] == 5) {
                        $Eventos = $value['Check'];
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
                    } elseif ($value['rules_id'] == 13) {
                        $Desc_Instructions = $value['Description'];
                    } elseif ($value['rules_id'] == 14) {
                        $Desc_Name_Network = $value['Description'];
                    } elseif ($value['rules_id'] == 15) {
                        $Password_Wifi = $value['Description'];
                    }
                }
            }
            //dd($saved_listing);
            //return;

            return view("CreateParking.listing", ['id' => $id, 'AptoDe2a12' => $AptoDe2a12, 'AptoDe0a2' => $AptoDe0a2, 'SeadmitenMascotas' => $SeadmitenMascotas, 'PermitidoFumar' => $PermitidoFumar, 'Eventos' => $Eventos, 'Desc_Otro_Evento' => $Desc_Otro_Evento, 'guest_phone' => $guest_phone, 'guest_email' => $guest_email,  'guest_profile' => $guest_profile, 'guest_payment' => $guest_payment, 'guest_provided' => $guest_provided, 'guest_recomendation' => $guest_recomendation, 'Desc_Instructions' => $Desc_Instructions, 'Desc_Name_Network' => $Desc_Name_Network, 'Password_Wifi' => $Password_Wifi ]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
        
    }

    public function SaveEigth(Request $request){
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
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
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-8/rules')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'Desc_Otro_Evento' => $request->input('Desc_Otro_Evento'),
                            'guest_phone' => $guest_phone,
                            'guest_email' => $guest_email,
                            'guest_profile' => $guest_profile,
                            'guest_payment' => $guest_payment,
                            'guest_provided' => $guest_provided,
                            'guest_recomendation' => $guest_recomendation,
                            'Desc_Instructions' => $request->input('Desc_Instructions')
                            ) )
                        ->asJson( true )
                        ->post();

            //dd($response);
            if ($response == 'Update Step-8' OR $response == 'Add Step-8') {
                return redirect('/create-parking/photos');
            } else {
                return redirect('/create-parking/basics')->with(['message-alert' =>''.$response.'']);
            }


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

        public function Ninth()
    {
        return view("CreateParking.photos");
    }

    public function SaveNinth(Request $request){
        
    }

        public function Tenth()
    {
        return view("CreateParking.services");
    }            

    public function SaveTenth(Request $request){
        
    }

    public function Eleven()
    {
         if (session()->has('service_id')) {
            $id = session()->get('service_id');

            

            $saved_notes = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-11/get-emergency')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $anything = '';
            if (isset($saved_notes) AND !empty($saved_notes) AND !is_null($saved_notes) AND $saved_notes != 'Not Found') {
                foreach ($saved_notes as $value) {
                    if ($value['emergency_id'] == 11) {
                        $anything = $value['content'];
                    } 
                }
            }
            //dd($saved_notes);
            return view("CreateParking.notes", ['id' => $id, 'anything' => $anything]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }            

    public function SaveEleven(Request $request){
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            $res = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/step-11')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'desc_anything'=> !empty($request->input('desc_anything')) ? $request->input('desc_anything'):'',
                            ) )
                        ->asJson( true )
                        ->post();
            //dd($res);


            if($res == "Service not found" && $res !="Update Note emergency"){
                return redirect("create-parking/note")->with(['message-alert' =>''.$res.'']);
            }elseif($res=="Update Note emergency" || $res == "Add Note emergency"){
                return redirect('/create-parking/co-host');
            }
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function Twelve()
    {
        
        return view("CreateParking.co-host");
    }

    public function SaveTwelve(Request $request){
        
    }

    public function Preview1()
    {
        $data['service_id'] = session()->get('service_id');
        $data['languaje'] = 'ES';

        $type = Curl::to(env('MIGOHOOD_API_URL').'/service/services/getType')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ))
                        ->asJson( true )
                        ->get();
        $note_emergency = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-note-emergency')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $amenities = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-amenities')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $rules = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-rules')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            ) )
                        ->asJson( true )
                        ->get();
        $overview = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-overviews')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $beds = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-beds')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $description = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/getDescription')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ))
                        ->asJson( true )
                        ->get();

        $bedrooms = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-bedrooms')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();

        $price = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-price')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
          // dd( ['bedrooms'=>$bedrooms, 'note_emergency' => $note_emergency, 'amenities' => $amenities, 'rules' => $rules, 'overview' => $overview, 'beds' => $beds, 'description' => $description,'price'=>$price,'type'=>$type]);

        return view("CreateParking.PreviewParking.preview1", ['bedrooms'=>$bedrooms, 'note_emergency' => $note_emergency, 'amenities' => $amenities, 'rules' => $rules, 'overview' => $overview, 'beds' => $beds, 'description' => $description,'price'=>$price,'type'=>$type]);
    }

        public function Preview2()
    {
        return view("CreateParking.PreviewParking.preview2");
    }

        public function Preview3()
    {
        return view("CreateParking.PreviewParking.preview3");
    }

        public function Preview4()
    {
        $data['service_id'] = session()->get('service_id');
          $data['languaje'] = 'ES';

          $overview4 = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-map-neighborhood')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();

            $latitude = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-map-neighborhood-latitude')
                            ->withData( array(
                                'service_id' => $data['service_id'],
                                'languaje' => $data['languaje'],
                                ) )
                            ->asJson( true )
                            ->get();

            $longitude = Curl::to(env('MIGOHOOD_API_URL').'/service/parking/preview-map-neighborhood-longitude')
                            ->withData( array(
                                'service_id' => $data['service_id'],
                                'languaje' => $data['languaje'],
                                ) )
                            ->asJson( true )
                            ->get();
                      //      dd(compact('overview4','latitude','longitude'));
        return view("CreateParking.PreviewParking.preview4",['latitude' => $latitude, 'longitude' =>$longitude,'overview4'=>$overview4]);
        
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

    public function storeTemporary(Request $request){
        $jsonRespose = array(
            'success'=>true,
            "data"=>"",
            "route"=>"",
        );

        if($request->input("step")){

            $request->session()->put('type',$request->input("type"));
            $request->session()->put('type',$request->input("zone"));
            $request->session()->put('type',$request->input("quantity"));
            $request->session()->put('type',$request->input("step1"));
            $jsonRespose["route"] = "/create-parking/bedrooms";

        }else{
            $jsonRespose["success"] = false;
            $jsonRespose["data"]= "por favor complete todo los campos ";

        }
        return response()->json($jsonRespose);
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

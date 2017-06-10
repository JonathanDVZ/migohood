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

class CreateSpaceController extends Controller
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

    public function First(Request $request)
    {

        $id = ''; $result = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-1/get-create')
                            ->withData( array(
                                'service_id'  => $id,
                                'languaje' => 'ES'
                                ) )
                            ->asJson( true )
                            ->get();
            //dd($result);
        } else {
            $service = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step/create')
                        ->withData( array(
                            'category_code' => '1',
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
        }


        $types = Curl::to(env('MIGOHOOD_API_URL').'/category/space/get-type')
                    ->withData( array(
                        'category_id' => '1',
                        'languaje'  => "ES",
                        ) )
                    ->asJson( true )
                    ->get();

        $accommodation = Curl::to(env('MIGOHOOD_API_URL').'/accommodation/get-accommodation')
                    ->withData( array(
                        'languaje'  => "ES",
                        ) )
                    ->asJson( true )
                    ->get();
                    //dd($accommodation);

        return view("CreateSpace.placeType", ['types' => $types, 'accommodation' => $accommodation, 'id' => $id, 'result' => $result]);
    }

    /*public function FirstPost(Request $request)
    {

        //if ($request->input('service_id') !== null) {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-1/create')
                        ->withData( array(
                            'service_id'  => $id,
                            'languaje' => 'ES'
                            ) )
                        ->asJson( true )
                        ->get();
            //dd($result);
            $types = Curl::to(env('MIGOHOOD_API_URL').'/category/space/get-type')
                    ->withData( array(
                        'category_id' => '1',
                        'languaje'  => "ES",
                        ) )
                    ->asJson( true )
                    ->get();

            $accommodation = Curl::to(env('MIGOHOOD_API_URL').'/accommodation/get-accommodation')
                        ->withData( array(
                            'languaje'  => "ES",
                            ) )
                        ->asJson( true )
                        ->get();

            return view("CreateSpace.placeType", ['types' => $types, 'accommodation' => $accommodation, 'id' => $id, 'result' => $result]);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }*/

    public function AddPlaceType(Request $request)
    {


        // Enviar los datos a la API para crear un nuevo espacio
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-1/create')
                    ->withHeaders( array(
                        'api-token:'.session()->get('user.remember_token')
                    ))
                    ->withData( array(
                        'user_id' => session()->get('user.id'),
                        'type_code'  => $request->input('type'),
                        'accommodation_code'  => $request->input('accomodation'),
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

        if ($res == 'Add Accommodaton and Type ' OR $res == 'Update Accommodation and Type ')
            return redirect('/create-space/bedrooms')/*->with(['id' => $request->input('service_id')])*/;
        else
            return redirect('/create-space/place-type')->with(['message-alert' => '' . $res . $request->input('service_id').  ''/*,'id' => $request->input('service_id')*/]);

    }

    public function Second1()
    {
        $id = ''; $result = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/get-bedrooms')
                            ->withData( array(
                                'service_id'  => $id
                                ) )
                            ->asJson( true )
                            ->get();
            //dd($result);
            if (!is_array($result) AND $result == 'Not Found') {
                $result = '';
            }
            return view("CreateSpace.bedrooms", ['id' => $id, 'result' => $result]);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }

    /*public function Second1Post(Request $request)
    {

        if ($request->input('service_id') !== null) {
            $id = $request->input('service_id');

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/bedrooms')
                        ->withData( array(
                            'service_id'  => $id
                            ) )
                        ->asJson( true )
                        ->get();
            if (!is_array($result) AND $result == 'Not Found') {
                $result = '';
            }
            return view("CreateSpace.bedrooms", ['id' => $id, 'result' => $result]);
        } else {
            $res = 'Ha habido un problema por favor recargue la pagina';
            return redirect('/becomeahost')->with(['message-alert' => '' . $res . '']);
        }

    }*/


    public function AddBedrooms(Request $request)
    {
        //dd($request->all());
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/bedrooms')
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
            return redirect('/create-space/bedrooms/edit-bedrooms');
        } else
            return redirect('/create-space/bedrooms')->with(['message-alert' => '' . $res . '']);
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
                return view("CreateSpace.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
            } else {
                session()->put('message-alert', '' . $msg . '');
                return view("CreateSpace.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
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
            return view("CreateSpace.bedrooms-addbed",['id' => $request->input('service_id'), 'bedroom_id' => $request->input('bedroom_id'), 'refer' => $request->input('refer'), 'beds' => $beds]);
        }

    }

    public function SaveBeds(Request $request)
    {

        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($request->all());
            // Enviar los datos a la API para crear nuevas habitaciones
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/beds/details')
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
                return redirect('/create-space/bedrooms/edit-bedrooms');
            } else {
                return redirect('/create-space/bedrooms/edit-bedrooms')->with(['msg' => ''.$response.'']);
            }
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }

    /*public function ShowBathroom(Request $request)
    {

        //session()->put('id', $request->input('service_id'));
        return redirect('/create-space/baths')->with(['id' => $request->input('service_id')]);

    }*/

    public function Third()
    {
        $id = ''; $result='';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($id);
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-3/get-bathroom')
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
            return view("CreateSpace.baths", ['id' => $id,'result' => $result]);
        } else {
            session()->put('message-alert', ''.$msg.'');
            return view("CreateSpace.baths", ['id' => $id,'result' => $result]);
        }

    }

    /*public function ThirdPost(Request $request)
    {

        if ($request->input('service_id') !== null) {
            $id = $request->input('service_id');

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-3/bathroom')
                        ->withData( array(
                            'service_id'  => $id
                            ) )
                        ->asJson( true )
                        ->get();
            if (!is_array($result) AND $result == 'Not Found') {
                $result = '';
            }

            return view("CreateSpace.baths", ['id' => $id,'result' => $result]);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }*/

    public function AddBaths(Request $request)
    {
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-3/bathroom')
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
            return redirect('/create-space/location')->with(['id' => $request->input('service_id')]);
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
            return redirect('/create-space/baths')->with(['message-alert' => '' . $res . '']);
        }

    }

    public function Fourth()
    {
        //$id = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($id);
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-4/get-location')
                        ->withData( array(
                            'service_id'  => $id
                            ) )
                        ->asJson( true )
                        ->get();

            //dd($result);
            $address = ''; $apartment = ''; $description = ''; $around = ''; $states = ''; $cities = ''; $longitude = ''; $latitude = '';
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

            return view("CreateSpace.locations", ['id' => $id, 'countries' => $countries, 'result' => $result, 'address' => $address, 'apartment' => $apartment, 'description' => $description, 'around' => $around, 'states' => $states, 'cities' => $cities, 'longitude' => $longitude, 'latitude' => $latitude]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }

    /*public function FourthPost(Request $request)
    {

        if ($request->input('service_id') !== null) {
            $id = $request->input('service_id');

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-4/location')
                        ->withData( array(
                            'service_id'  => $id
                            ) )
                        ->asJson( true )
                        ->get();
            //dd($result);
            $address = ''; $apartment = ''; $description = ''; $around = ''; $states = ''; $cities = '';
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
                    }
                }

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
            }


            //dd($id);
            //dd($result);
            //return;

            $countries = Curl::to(env('MIGOHOOD_API_URL').'/country/get-country')
                        ->asJson( true )
                        ->get();

            return view("CreateSpace.locations", ['id' => $id, 'countries' => $countries, 'result' => $result, 'states' => $states, 'cities' => $cities, 'address' => $address, 'apartment' => $apartment, 'description' => $description, 'around' => $around]);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }*/

    public function SaveLocation(Request $request)
    {
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-4/location')
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
                        'apt ' => $request->input('apartment'),
                        'des_neighborhood' => $request->input('info'),
                        'des_around' => $request->input('around'),
                        'des_longitude' => $request->input('longitude'),
                        'des_latitude' => $request->input('latitude')
                        ) )
                    ->asJson( true )
                    ->put();


        if ($response == 'Add Location' OR $response == 'Update Location') {
            return redirect('/create-space/amenities');
        } else {
            return redirect('/create-space/location')->with(['message-alert' =>''.$response.'']);
        }

    }

    public function Fifth()
    {
        $id = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $amenities = Curl::to(env('MIGOHOOD_API_URL').'/amenities/get-space-amenities')
                        ->withData( array(
                            'languaje' => 'ES'
                            ))
                        ->asJson( true )
                        ->get();
            if (!is_array($amenities) AND $amenities == 'Not Found') {
                if (session()->has('message-alert')) {
                    session()->put('message-alert',$amenities);
                    //session()->forget('message-alert');
                }
            } else {
                // Buscamos si existen amenities guardadas para el servicio actual

                $save_amenities = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-5/get-amenities')
                        ->withData( array(
                            'service_id' => $id,
                            'languaje' => 'ES'
                            ))
                        ->asJson( true )
                        ->get();
                $saved_detalles = array(); $saved_ofrece = array(); $saved_lugares = array();
                if (is_array($save_amenities)) {
                    foreach ($save_amenities as $value) {
                        if ($value['type_amenities_id'] == 1) {
                            $saved_detalles[] = $value;
                        } elseif ($value['type_amenities_id'] == 2) {
                            $saved_ofrece[] = $value;
                        } elseif ($value['type_amenities_id'] == 3) {
                            $saved_lugares[] = $value;
                        }
                    }
                }

                $detalles = array(); $ofrece = array(); $lugares = array();
                foreach ($amenities as $value) {
                    if ($value['type_amenities_id'] == 1) {
                        $detalles[] = $value;
                    } elseif ($value['type_amenities_id'] == 2) {
                        $ofrece[] = $value;
                    } elseif ($value['type_amenities_id'] == 3) {
                        $lugares[] = $value;
                    }
                }
                //dd($detalles);
                if (!empty($detalles)) {
                    $aux = array(); $agregar = false;
                    foreach ($detalles as $value) {
                        foreach ($saved_detalles as $key) {
                            if ($key['code'] == $value['code']) {
                                $agregar = true;
                                break;
                            }
                        }
                        if ($agregar) {
                            $value['is_selected'] = true;
                            $aux[] = $value;
                            $agregar = false;
                        } else {
                            $value['is_selected'] = false;
                            $aux[] = $value;
                        }
                    }
                    $detalles = $aux;
                    //dd($detalles);
                }

                if (!empty($ofrece)) {
                    $aux = array(); $agregar = false;
                    foreach ($ofrece as $value) {
                        foreach ($saved_ofrece as $key) {
                            if ($key['code'] == $value['code']) {
                                $agregar = true;
                                break;
                            }
                        }
                        if ($agregar) {
                            $value['is_selected'] = true;
                            $aux[] = $value;
                            $agregar = false;
                        } else {
                            $value['is_selected'] = false;
                            $aux[] = $value;
                        }
                    }
                    $ofrece = $aux;
                    //dd($detalles);
                }

                if (!empty($lugares)) {
                    $aux = array(); $agregar = false;
                    foreach ($lugares as $value) {
                        foreach ($saved_lugares as $key) {
                            if ($key['code'] == $value['code']) {
                                $agregar = true;
                                break;
                            }
                        }
                        if ($agregar) {
                            $value['is_selected'] = true;
                            $aux[] = $value;
                            $agregar = false;
                        } else {
                            $value['is_selected'] = false;
                            $aux[] = $value;
                        }
                    }
                    $lugares = $aux;
                    //dd($lugares);
                }



                // Para detalles
                $conteo = count($detalles);
                $mitad = $conteo / 2;

                if ($mitad % 2 == 0) {
                    $mitad1 = $mitad;
                    $mitad2 = $mitad;
                } else {
                    $mitad1 = round($mitad);
                    $mitad2 = $mitad - 0.5;

                }

                $detalles1 = array_slice($detalles, 0, $mitad1);
                $detalles2 = array_slice($detalles,$mitad1, $mitad2);

                // Para detalles
                $conteo = count($ofrece);
                $mitad = $conteo / 2;

                if ($mitad % 2 == 0) {
                    $mitad1 = $mitad;
                    $mitad2 = $mitad;
                } else {
                    $mitad1 = round($mitad);
                    $mitad2 = $mitad - 0.5;

                }

                $ofrece1 = array_slice($ofrece, 0, $mitad1);
                $ofrece2 = array_slice($ofrece,$mitad1, $mitad2);
                //print_r($ofrece1);
                //print_r($ofrece2);
                //return;

                // Para lugares
                $conteo = count($lugares);
                $mitad = $conteo / 2;

                if ($mitad % 2 == 0) {
                    $mitad1 = $mitad;
                    $mitad2 = $mitad;
                } else {
                    $mitad1 = round($mitad);
                    $mitad2 = $mitad - 0.5;

                }

                $lugares1 = array_slice($lugares, 0, $mitad1);
                $lugares2 = array_slice($lugares,$mitad1, $mitad2);


                //dd($save_amenities);
            }
            //dd($amenities);

            return view("CreateSpace.amenities", ['id' => $id, 'detalles1' => $detalles1, 'detalles2' => $detalles2, 'ofrece1' => $ofrece1, 'ofrece2' => $ofrece2, 'lugares1' => $lugares1, 'lugares2' => $lugares2, 'saved_detalles' => $saved_detalles, 'saved_ofrece' => $saved_ofrece, 'saved_lugares' => $saved_lugares]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }

    /*public function FifthPost(Request $request)
    {

        if ($request->input('service_id') !== null) {
            $id = $request->input('service_id');

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-5/amenities')
                        ->withData( array(
                            'service_id'  => $id,
                            'languaje' => 'ES'
                            ) )
                        ->asJson( true )
                        ->get();
            //dd($result);

            $amenities = Curl::to(env('MIGOHOOD_API_URL').'/amenities/get-space-amenities')
                        ->withData( array(
                            'languaje' => 'ES'
                            ))
                        ->asJson( true )
                        ->get();
            if (!is_array($amenities) AND $amenities == 'Not Found') {
                # code...
            } else {
                $detalles = array(); $ofrece = array(); $lugares = array();
                foreach ($amenities as $value) {
                    if ($value['type_amenities_id'] == 1) {
                        $detalles[] = $value;
                    } elseif ($value['type_amenities_id'] == 2) {
                        $ofrece[] = $value;
                    } elseif ($value['type_amenities_id'] == 3) {
                        $lugares[] = $value;
                    }
                }
                // Para detalles
                $conteo = count($detalles);
                $mitad = $conteo / 2;

                if ($mitad % 2 == 0) {
                    $mitad1 = $mitad;
                    $mitad2 = $mitad;
                } else {
                    $mitad1 = round($mitad);
                    $mitad2 = $mitad - 0.5;

                }

                $detalles1 = array_slice($detalles, 0, $mitad1);
                $detalles2 = array_slice($detalles,$mitad1-1, $mitad2);

                // Para detalles
                $conteo = count($ofrece);
                $mitad = $conteo / 2;

                if ($mitad % 2 == 0) {
                    $mitad1 = $mitad;
                    $mitad2 = $mitad;
                } else {
                    $mitad1 = round($mitad);
                    $mitad2 = $mitad - 0.5;

                }

                $ofrece1 = array_slice($ofrece, 0, $mitad1);
                $ofrece2 = array_slice($ofrece,$mitad1-1, $mitad2);
                //print_r($ofrece1);
                //print_r($ofrece2);
                //return;

                // Para lugares
                $conteo = count($lugares);
                $mitad = $conteo / 2;

                if ($mitad % 2 == 0) {
                    $mitad1 = $mitad;
                    $mitad2 = $mitad;
                } else {
                    $mitad1 = round($mitad);
                    $mitad2 = $mitad - 0.5;

                }

                $lugares1 = array_slice($lugares, 0, $mitad1);
                $lugares2 = array_slice($lugares,$mitad1-1, $mitad2);

            }

            return view("CreateSpace.amenities", ['id' => $id, 'detalles1' => $detalles1, 'detalles2' => $detalles2, 'ofrece1' => $ofrece1, 'ofrece2' => $ofrece2, 'lugares1' => $lugares1, 'lugares2' => $lugares2]);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }


        //dd($amenities);


    }*/

    public function SaveAmenities(Request $request)
    {

        if (is_array($request->input('amenities'))) {
            foreach ($request->input('amenities') as $amenitie) {
                // Enviar los datos a la API para guardar
                $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-5/amenities')
                                ->withHeaders( array(
                                    'api-token:'.session()->get('user.remember_token')
                                ))
                                ->withData( array(
                                    'service_id' => $request->input('service_id'),
                                    'amenitie_code' => $amenitie
                                    ) )
                                ->asJson( true )
                                ->post();
                //print_r($response);
                if ($response == 'Update Step 5' OR $response == 'Add Step 5') {
                } else
                    return redirect('/create-space/amenities')->with(['message-alert' =>''.$response.'']);

            }
            return redirect('/create-space/hosting');
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
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

            $saved_hosting = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-6/get-hosting')
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
            return view("CreateSpace.hosting", ['id' => $id, 'currencies' => $currencies, 'durations' => $durations, 'payments' => $payments, 'selected_currency' => $selected_currency, 'selected_duration' => $selected_duration, 'selected_payment' => $selected_payment, 'price' => $price, 'selected_entry' => $selected_entry, 'selected_until' => $selected_until, 'selected_departure' => $selected_departure] );


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }


    public function SaveHosting(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            // Enviar los datos a la API para guardar
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-6/hosting')
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
                                'until' => $request->input('until'),
                                'departure_time' => $request->input('departure_time'),
                                ) )
                            ->asJson( true )
                            ->post();
            //dd($response);
            if ($response == 'Update Step 6' OR $response == 'Add Step-6') {
                return redirect('/create-space/basics');
            } else
                return redirect('/create-space/hosting')->with(['message-alert' =>''.$response.'']);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }


    public function Seventh()
    {
        $id = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            $saved_basics = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-7/get-description')
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
            return view("CreateSpace.basics", ['id' => $id, 'title' => $title, 'description' => $description, 'place' => $place, 'access' => $access, 'share1' => $share1, 'share2' => $share2, 'interaction' => $interaction, 'other' => $other]);

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
            if ($request->input('socialize') !== null) {
                $socialize = true;
            } else {
                $socialize = false;
            }

            if ($request->input('available') !== null) {
                $available = true;
            } else {
                $available = false;
            }

            // Enviar los datos a la API para crear nuevas habitaciones
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-7/description')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'des_title' => $request->input('title'),
                            'description' => $request->input('description'),
                            'desc_crib' => $request->input('crib'),
                            'desc_acc' => $request->input('acc'),
                            'bool_socialize' => $socialize,
                            'bool_available' => $available,
                            'desc_guest' => $request->input('des_guest'),
                            'desc_note' => $request->input('des_note')
                            ) )
                        ->asJson( true )
                        ->post();

            //dd($response);
            if ($response == 'Update Step-7' OR $response == 'Add Step-7') {
                return redirect('/create-space/listing');
            } else {
                return redirect('/create-space/basics')->with(['message-alert' =>''.$response.'']);
            }

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }


    public function Eigth()
    {
        if (session()->has('service_id')) {
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

            return view("CreateSpace.listing", ['id' => $id, 'AptoDe2a12' => $AptoDe2a12, 'AptoDe0a2' => $AptoDe0a2, 'SeadmitenMascotas' => $SeadmitenMascotas, 'PermitidoFumar' => $PermitidoFumar, 'Eventos' => $Eventos, 'Desc_Otro_Evento' => $Desc_Otro_Evento, 'guest_phone' => $guest_phone, 'guest_email' => $guest_email,  'guest_profile' => $guest_profile, 'guest_payment' => $guest_payment, 'guest_provided' => $guest_provided, 'guest_recomendation' => $guest_recomendation, 'Desc_Instructions' => $Desc_Instructions, 'Desc_Name_Network' => $Desc_Name_Network, 'Password_Wifi' => $Password_Wifi ]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveListing(Request $request)
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
            if ($request->input('Eventos') !== null) {
                $Eventos = ($request->input('Eventos') == 'on') ? true:false;
            } else {
                $Eventos = false;
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
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-8/rules')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'AptoDe2a12' => $AptoDe2a12,
                            'AptoDe0a2' => $AptoDe0a2,
                            'SeadmitenMascotas' => $SeadmitenMascotas,
                            'PermitidoFumar' => $PermitidoFumar,
                            'Eventos' => $Eventos,
                            'Desc_Otro_Evento' => $request->input('Desc_Otro_Evento'),
                            'guest_phone' => $guest_phone,
                            'guest_email' => $guest_email,
                            'guest_profile  ' => $guest_profile,
                            'guest_payment' => $guest_payment,
                            'guest_provided' => $guest_provided,
                            'guest_recomendation' => $guest_recomendation,
                            'Desc_Instructions' => $request->input('Desc_Instructions'),
                            'Desc_Name_Network' => $request->input('Desc_Name_Network'),
                            'Password_Wifi' => $request->input('Password_Wifi')
                            ) )
                        ->asJson( true )
                        ->post();

            //dd($response);
            if ($response == 'Update Step-8' OR $response == 'Add Step-8') {
                return redirect('/create-space/photos');
            } else {
                return redirect('/create-space/basics')->with(['message-alert' =>''.$response.'']);
            }


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }


    public function Ninth()
    {

        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            $res= Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-9/get-image')
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

            return view("CreateSpace.photos", ['id' => $id, 'photo1' => $photo1, 'description1' => $description1, 'photo2' => $photo2, 'description2' => $description2]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }
    public function NinthSave(Request $request)
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
                return redirect('/create-space/photos')->with(['message-alert' =>''.$validator->errors()->all().'']);
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
                $img1->move('files/images/',$name1);
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-9/image')
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

                unlink('files/images/'.$name1);
                //dd($res);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-space/photos')->with(['message-alert' =>''.$res.'']);
                }
            }

            if (!empty($name2)) {
                $img2->move('files/images/',$name2);
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-9/image')
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
                unlink('files/images/'.$name2);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-space/photos')->with(['message-alert' =>''.$res.'']);
                }
            }

            return redirect('/create-space/services');

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function Tenth()
    {

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
            $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-10/get-service')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'languaje' => 'ES'
                        ) )
                        ->asJson( true )
                        ->get();
            //dd($res);

            $photo1 = ''; $description1 = '';$photo2 = ''; $description2 = ''; $selected_duration1 = '';  $selected_duration2 = ''; $selected_currency1 = ''; $selected_currency2 = ''; $price1 = ''; $price2 = '';
            if (isset($res) AND !empty($res) AND !is_null($res) AND $res != 'Not Found') {
                if (isset($res[0]['ruta'])) {
                    $photo1 = $res[0]['ruta'];
                    $description1 = $res[0]['description'];
                    $selected_duration1 = $res[0]['type'];
                    $selected_currency1 = $res[0]['currency_iso'];
                    $price1 = $res[0]['price'];
                }

                if (isset($res[1]['ruta'])) {
                    $photo2 = $res[1]['ruta'];
                    $description2 = $res[1]['description'];
                    $selected_duration2 = $res[1]['type'];
                    $selected_currency2 = $res[1]['currency_iso'];
                    $price2 = $res[1]['price'];
                }

            }


            return view("CreateSpace.services", ['id' => $id, 'currencies' => $currencies, 'durations' => $durations, 'photo1' => $photo1, 'description1' => $description1,'photo2' => $photo2, 'description2' => $description2, 'selected_duration1' => $selected_duration1,  'selected_duration2' => $selected_duration2, 'selected_currency1' => $selected_currency1, 'selected_currency2' => $selected_currency2, 'price1' => $price1, 'price2' => $price2]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveServices(Request $request)
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
                return redirect('/create-space/photos')->with(['message-alert' =>''.$validator->errors()->all().'']);
            }
            $img1 = ''; $desc1 = ''; $name1 = ''; $price1 = '';
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
                if ($request->has('price1')) {
                    $price1 = $request->input('price1');
                } else {
                    return redirect('/create-space/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
                }
            } elseif ($request->hasFile('file1')) {
                //echo "string3";
                $img1 = $request->file('file1');
                $name1 = 'imagen'.str_random(20).'_service_'.$id.'.'.$img1->getClientOriginalExtension();
                if ($request->has('description1')) {
                    //echo "string4";
                    $desc1 = $request->input('description1');
                }

                if ($request->has('price1')) {
                    $price1 = $request->input('price1');
                } else {
                    return redirect('/create-space/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
                }
            }

            $img2 = ''; $desc2 = ''; $name2 = ''; $price2 = '';
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
                if ($request->has('price2')) {
                    $price2 = $request->input('price2');
                } else {
                    return redirect('/create-space/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
                }
            } elseif ($request->hasFile('file2')) {
                $img2 = $request->file('file2');
                $name2 = 'imagen'.str_random(20).'_service_'.$id.'.'.$img2->getClientOriginalExtension();
                if ($request->has('description2')) {
                    $desc2 = $request->input('description2');
                }
                if ($request->has('price2')) {
                    $price2 = $request->input('price2');
                } else {
                    return redirect('/create-space/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
                }
            }

            if (!empty($name1)) {
                $img1->move('files/service_images/',$name1);
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-10/service')
                            ->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name1),
                                "description" => $desc1,
                                'duration_code' => $request->input('duration1'),
                                'price' => $price1,
                                'currency_id'=> $request->input('currency1')
                            ))
                            ->containsFile()
                            ->post();

                unlink('files/service_images/'.$name1);
                //dd($res);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-space/services')->with(['message-alert' =>''.$res.'']);
                }
            }

            if (!empty($name2)) {
                $img2->move('files/service_images/',$name2);
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-10/service')
                            ->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name2),
                                "description" => $desc2,
                                'duration_code' => $request->input('duration2'),
                                'price' => $price2,
                                'currency_id'=> $request->input('currency2')
                            ))
                            ->containsFile()
                            ->post();
                unlink('files/service_images/'.$name2);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-space/services')->with(['message-alert' =>''.$res.'']);
                }
            }

            return redirect('/create-space/notes');

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }

    public function Eleven()
    {

        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            $emergency = Curl::to(env('MIGOHOOD_API_URL') . '/space/get-number-emergency')
                                ->withHeaders(array(
                                    'api-token:' . session()->get('user.remember_token')
                                ))
                                ->withData(array(
                                    "service_id" => $id,
                                    //"languaje" => "ES"
                                ))

                                ->asJson(true)
                                ->get();
            //dd($emergency);

            if(!is_array($emergency) && $emergency == "Not Found"){
                $emergency = false;
            }

            $saved_notes = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-11/number-emergency')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
            $anything = ''; $smoke = ''; $carbon = ''; $first = ''; $safety = ''; $fire = ''; $fired = ''; $alarm = ''; $gas = ''; $exit = '';
            if (isset($saved_notes) AND !empty($saved_notes) AND !is_null($saved_notes) AND $saved_notes != 'Not Found') {
                foreach ($saved_notes as $value) {
                    if ($value['emergency_id'] == 11) {
                        $anything = $value['content'];
                    } elseif ($value['emergency_id'] == 12) {
                        $smoke = $value['check'];
                    } elseif ($value['emergency_id'] == 13) {
                        $carbon = $value['check'];
                    } elseif ($value['emergency_id'] == 14) {
                        $first = $value['check'];
                    } elseif ($value['emergency_id'] == 15) {
                        $safety = $value['check'];
                    } elseif ($value['emergency_id'] == 16) {
                        $fire = $value['check'];
                    } elseif ($value['emergency_id'] == 17) {
                        $fired = $value['content'];
                    } elseif ($value['emergency_id'] == 18) {
                        $alarm = $value['content'];
                    } elseif ($value['emergency_id'] == 19) {
                        $gas = $value['content'];
                    } elseif ($value['emergency_id'] == 20) {
                        $exit = $value['content'];
                    }
                }
            }
            //dd($saved_notes);
            return view("CreateSpace.notes", ['id' => $id,'emergency' => $emergency, 'anything' => $anything, 'smoke' => $smoke, 'carbon' => $carbon, 'first' => $first, 'safety' => $safety, 'fire' => $fire, 'fired' => $fired, 'alarm' => $alarm, 'gas' => $gas, 'exit' => $exit]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }
    public function ElevenAdd(Request $request){
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

            $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-11')
                        ->withHeaders( array(
                            'api-token:'.session()->get('user.remember_token')
                        ))
                        ->withData( array(
                            'service_id' => $id,
                            'desc_anything'=> !empty($request->input('desc_anything')) ? $request->input('desc_anything'):'',
                            'bool_smoke'=> $request->input('bool_smoke') !== null ?  1 : 0,
                            'bool_carbon'=> $request->input('bool_carbon') !== null ?  1 : 0,
                            'bool_first'=> $request->input('bool_first') !== null ?  1 : 0,
                            'bool_safety'=> $request->input('bool_safety') !== null ? 1 : 0,
                            'bool_fire'=> $request->input('bool_fire') !== null ?  1 : 0,
                            'desc_fire'=> !empty($request->input('desc_fire'))?  $request->input('desc_fire'):'',
                            'desc_alarm'=> !empty($request->input('desc_alarm'))?  $request->input('desc_alarm'):'',
                            'desc_gas'=> !empty($request->input('desc_gas'))?  $request->input('desc_gas'):'',
                            'desc_exit'=> !empty($request->input('desc_exit'))?  $request->input('desc_exit'):'',
                            ) )
                        ->asJson( true )
                        ->post();
            //dd($res);

            if($res == "Service not found" && $res !="Update Note emergency"){
                return redirect("create-space/note")->with(['message-alert' =>''.$res.'']);
            }elseif($res=="Update Note emergency" || $res == "Add Note emergency"){
                return redirect('/create-space/co-host');
            }
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }
    public function ElevenEmergency(){
        $json = array(
            "status"=>false,
            "error"=>"",
            "msj"=>""
        );
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }
            $res = Curl::to(env('MIGOHOOD_API_URL') . '/service/space/step-11/number-emergency')
                ->withHeaders(array(
                    'api-token:' . session()->get('user.remember_token')
                ))
                ->withData(array(
                    "service_id" => $id,
                    "languaje" => "ES"
                ))
                ->asJson(true)
                ->get();
            if(!is_array($res) && $res == "Not Found"){
                    $json["error"]=$res;
                    $json["status"]=false;
                return response()->json($json);
            }else{
                $json["msj"]=$res;
                $json["status"]=true;
                return response()->json($json);
            }
        }else{
            $json["status"]=false;
            $json["error"]="Algo a pasado Intente de nuevo";
            return response()->json($json);

        }

    }
    public function ElevenEmergecyAdd(Request $request){
        $json = array(
            "status"=>false,
            "error"=>"",
            "msj"=>""
        );
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }
            $res = Curl::to(env('MIGOHOOD_API_URL') . '/service/space/step-11/emergency-add')
                ->withHeaders(array(
                    'api-token:' . session()->get('user.remember_token')
                ))
                ->withData(array(
                        'service_id'=>$id,
                        'number'=>$request->input("phoneNumber"),
                        'name'=>$request->input("name")
                ))
                ->asJson(true)
                ->post();
            if(!is_array($res) && $res == "Service not found"){
                    $json["error"]=$res;
                    $json["status"]=false;
                return response()->json($json);
            }else{
                $json["msj"]=$res;
                $json["status"]=true;
                return response()->json($json);
            }
        }else{
            $json["status"]=false;
            $json["error"]="Algo a pasado Intente de nuevo";
            return response()->json($json);

        }

    }

    public function Twelve()
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }
            return view("CreateSpace.co-host", ['id' => $id]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function Preview1()
    {
        return view("CreateSpace.PreviewSpace.preview1");
    }

        public function Preview2()
    {
        return view("CreateSpace.PreviewSpace.preview2");
    }

        public function Preview3()
    {
        return view("CreateSpace.PreviewSpace.preview3");
    }

        public function Preview4()
    {
        return view("CreateSpace.PreviewSpace.preview4");
    }

    public function ChooseType()
    {
        return view('SpaceType.choose-type');
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

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

class CreateWorkspaceController extends Controller
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
        if (session()->has('service_id') AND session('category_code') ==2 ) {
            $id = session()->get('service_id');
            //
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-1/get-create')
                            ->withData( array(
                                'service_id'  => $id,
                                'languaje' => 'ES'
                                ) )
                            ->asJson( true )
                            ->get();
           
        } else {
            $service = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step/create')
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
            Session::put('category_code',2);
        }


        $types = Curl::to(env('MIGOHOOD_API_URL').'/category/workspace/get-type')
                    ->withData( array(
                        'category_id' => '3',
                        'languaje'  => "ES",
                        ) )
                    ->asJson( true )
                    ->get();

                     //dd($result);
        return view("CreateWorkspace.placeType", ['types' => $types, 'id' => $id, 'result' => $result]);
        
    }

    public function SaveFirst(Request $request){

        
        // Enviar los datos a la API para crear un nuevo espacio
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-1/create')
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
            return redirect('/create-workspace/location');
        else
            return redirect('/create-workspace/place-type')->with(['message-alert' => '' . $res . $request->input('service_id').  '']);

    }

     public function Second1()
    {
        $id = ''; $result = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-2/get-bedrooms')
                            ->withData( array(
                                'service_id'  => $id
                                ) )
                            ->asJson( true )
                            ->get();
            //dd($result);
            if (!is_array($result) AND $result == 'Not Found') {
                $result = '';
            }
            return view("CreateWorkspace.bedrooms", ['id' => $id, 'result' => $result]);
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }

    public function AddBedrooms(Request $request)
    {
        //dd($request->all());
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-2/bedrooms')
                    ->withData( array(
                        'service_id' => $request->input('service_id'),
                        'num_guest'  => $request->input('guests_number'),
                        'num_bedroom'  => $request->input('bedrooms_number'),
                        ) )
                    ->asJson( true )
                    ->post();
       // dd($response);

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
            return redirect('/create-workspace/bedrooms/edit-bedrooms');
        } else
            return redirect('/create-workspace/bedrooms')->with(['message-alert' => '' . $res . '']);
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
                return view("CreateWorkspace.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
            } else {
                session()->put('message-alert', '' . $msg . '');
                return view("CreateWorkspace.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
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
            return view("CreateWorkspace.bedrooms-addbed",['id' => $request->input('service_id'), 'bedroom_id' => $request->input('bedroom_id'), 'refer' => $request->input('refer'), 'beds' => $beds]);
        }

    }

    public function SaveBeds(Request $request)
    {

        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($request->all());
            // Enviar los datos a la API para crear nuevas habitaciones
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-2/beds/details')
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
                return redirect('/create-workspace/bedrooms/edit-bedrooms');
            } else {
                return redirect('/create-workspace/bedrooms/edit-bedrooms')->with(['msg' => ''.$response.'']);
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
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-3/get-bathroom')
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
            return view("CreateWorkspace.baths", ['id' => $id,'result' => $result]);
        } else {
            session()->put('message-alert', ''.$msg.'');
            return view("CreateWorkspace.baths", ['id' => $id,'result' => $result]);
        }
    }

    public function SaveThird(Request $request){

        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-3/bathroom')
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
            return redirect('/create-workspace/location')->with(['id' => $request->input('service_id')]);
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
            return redirect('/create-workspace/baths')->with(['message-alert' => '' . $res . '']);
        }

    }
    

        public function Fourth()
    {
        $id='';
         if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //dd($id);
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-4/get-location')
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

            return view("CreateWorkspace.locations", ['id' => $id, 'countries' => $countries, 'result' => $result, 'address' => $address, 'apartment' => $apartment, 'description' => $description, 'around' => $around, 'states' => $states, 'cities' => $cities, 'longitude' => $longitude, 'latitude' => $latitude]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }

    }

    public function SaveFourth(Request $request){
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-4/location')
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
            return redirect('/create-workspace/amenities');
        } else {
            return redirect('/create-workspace/location')->with(['message-alert' =>''.$res.'']);
        }

    }
    

    public function Fifth()
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $amenities = Curl::to(env('MIGOHOOD_API_URL').'/amenities/get-workspace-amenities')
                        ->withData( array(
                            'languaje' => 'ES',
                            'service_id'=>$id,
                            ))
                        ->asJson( true )
                        ->get();

            $saved_amenites = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-5/get-aminites')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();
                          
                          // $amenities= array_merge($amenities,$saved_amenites);
                         //  dd($saved_amenites);
                          // dd(array_chunk($amenities, round(count($amenities)/2)));
                return view("CreateWorkspace.amenities")->with(['id' => $id, 'amenities'=>$amenities,'saved_amenites'=>$saved_amenites]);
        }else{
            return view("CreateWorkspace.amenities")->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }
    }

    public function SaveFifth(Request $request){
        //dd($request);
        if (session()->has('service_id')) {
            $id = session()->get('service_id');

        if (is_array($request->input('amenities'))) {
            //dd($request);
            $bool_amt = '';
            foreach ($request->input('amenities') as $amenitie) {
             if ($amenitie !== null) {
                            $bool_amt[] = ($amenitie == 'on') ? true:false;
                        } else {
                            $bool_amt[] = false;
                        }
                   // dd($bool_amt);
                // Enviar los datos a la API para guardar
                $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-5/amenities')
                                ->withHeaders( array(
                                    'api-token:'.session()->get('user.remember_token')
                                ))
                                ->withData( array(
                                    'service_id' => $request->input('service_id'),
                                    'amenitie_code' => $amenitie,
                                    'check' => $bool_amt
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

                if ($res == 'Update Step 5' OR $res == 'Add Step 5' OR $res =='') {
                } else{
                    return redirect('/create-workspace/amenities')->with(['message-alert' =>''.$res.'']);

            }
        }
            return redirect('/create-workspace/hosting');
        }else {
            return redirect('/create-workspace/amenities')->with(['message-alert' =>'Debe Seleccionar al menos 1 de los opciones']);
        }
    }
}
    

        public function Sixth()
    {
         $id = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
           

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

            $saved_hosting = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-6/get-hosting')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();

                          //  dd($saved_hosting);
            $selected_currency = ''; $selected_duration = ''; $selected_payment = ''; $price = ''; $selected_entry = ''; $selected_until = ''; $selected_departure = ''; $price2=''; $price3=''; $price4='';
            if (isset($saved_hosting) AND !empty($saved_hosting) AND !is_null($saved_hosting) AND $saved_hosting != 'Not Found') {
                $selected_currency = $saved_hosting[0]['Currency-Name'];
                $selected_payment = $saved_hosting[0]['Type-Payment'];
                $price = $saved_hosting[0]['Price'];
                $selected_entry = $saved_hosting[0]['Time-Entry'];
                $selected_until = $saved_hosting[0]['Until'];
                $selected_departure = $saved_hosting[0]['Departure-Time'];
                foreach ($saved_hosting as $value) {
                    if($value['code'] == 3){
                        $price2=$value['Price'];
                    }elseif($value['code'] == 7){
                        $price=$value['Price'];
                    }elseif($value['code'] == 4){
                        $price3=$value['Price'];
                    }elseif($value['code'] == 2){
                        $price4=$value['Price'];
                    }
                }
            }


            $specialdate =  Curl::to(env('MIGOHOOD_API_URL').'/service/get-specialdate')
                            ->withData( array(
                                'service_id' => $id,
                                'languaje' => 'ES'
                                ))
                            ->asJson( true )
                            ->get();

            $price1=''; $startDate=''; $endDate=''; $note='';
            if (isset($specialdate) AND !empty($specialdate) AND !is_null($specialdate) AND $specialdate != 'Not Found') {
                $price1=$specialdate['price'];
                $startDate=$specialdate['startDate'];
                $endDate=$specialdate['endDate'];
                $note=$specialdate['note'];
            }

            return view("CreateWorkspace.hosting", ['id' => $id, 'currencies' => $currencies, 'durations' => $durations, 'payments' => $payments, 'selected_currency' => $selected_currency, 'selected_duration' => $selected_duration, 'selected_payment' => $selected_payment, 'price' => $price, 'selected_entry' => $selected_entry, 'selected_until' => $selected_until, 'selected_departure' => $selected_departure,'startDate' =>$startDate, 'endDate' =>$endDate,'price1'=>$price1, 'note'=>$note,'price2'=>$price2,'price3'=>$price3,'price4'=>$price4] );


        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveSixth(Request $request){
    if (session()->has('service_id')) {
                $id = session()->get('service_id');
                 $msg = '';
                if (session()->has('message-alert')) {
                    $msg = session()->get('message-alert');
                    session()->forget('message-alert');
                }
                // Enviar los datos a la API para guardar
                $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-6/hosting')
                                ->withHeaders( array(
                                    'api-token:'.session()->get('user.remember_token')
                                ))
                                ->withData( array(
                                    'service_id' => $id,
                                    'currency_id' => 188,
                                    'price' => $request->input('price'),
                                    'price2' => $request->input('price2'),
                                    'price3' => $request->input('price3'),
                                    'price4' => $request->input('price4'),
                                    'duration_code' => 5,
                                    'politic_payment_code' => $request->input('politic_payment'),
                                    'time_entry' => $request->input('time_entry'),
                                    'until' => $request->input('until'),
                                    'departure_time' => $request->input('departure_time'),
                                    'startDate' => $request->input('startDate'),
                                    'endDate' => $request->input('endDate')
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

                if ($res == 'Update Step 6' OR $res == 'Add Step-6' OR $res="") {
                    return redirect('/create-workspace/basics');
                } else
                    return redirect('/create-workspace/hosting')->with(['message-alert' =>''.$res.'']);
            } else {
                return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
            }

    }
    

        public function Seventh()
    {
        $id = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $saved_basics = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-7/get-basics')
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
            return view("CreateWorkspace.basics", ['id' => $id, 'title' => $title, 'description' => $description, 'place' => $place, 'access' => $access, 'share1' => $share1, 'share2' => $share2, 'interaction' => $interaction, 'other' => $other]);

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
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-7/description')
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
                return redirect('/create-workspace/listing');
            } else {
                return redirect('/create-workspace/basics')->with(['message-alert' =>''.$res.'']);
            }

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }

    }
    

        public function Eigth()
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');

            $saved_listing = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-8/get-rules')
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

            return view("CreateWorkspace.listing", ['id' => $id, 'AptoDe2a12' => $AptoDe2a12, 'AptoDe0a2' => $AptoDe0a2, 'SeadmitenMascotas' => $SeadmitenMascotas, 'PermitidoFumar' => $PermitidoFumar, 'Eventos' => $Eventos, 'Desc_Otro_Evento' => $Desc_Otro_Evento, 'guest_phone' => $guest_phone, 'guest_email' => $guest_email,  'guest_profile' => $guest_profile, 'guest_payment' => $guest_payment, 'guest_provided' => $guest_provided, 'guest_recomendation' => $guest_recomendation, 'Desc_Instructions' => $Desc_Instructions, 'Desc_Name_Network' => $Desc_Name_Network, 'Password_Wifi' => $Password_Wifi ]);

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
            $response = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-8/rules')
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
                            'guest_profile' => $guest_profile,
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
                return redirect('/create-workspace/photos');
            } else {
                return redirect('/create-workspace/listing')->with(['message-alert' =>''.$response.'']);
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
                    $photo1 =asset( $res[0]['ruta']);
                    $description1 = $res[0]['description'];
                }

                if (isset($res[1]['ruta'])) {
                    $photo2 = asset( $res[1]['ruta']);
                    $description2 = $res[1]['description'];
                }

            }

            return view("CreateWorkspace.photos", ['id' => $id, 'photo1' => $photo1, 'description1' => $description1, 'photo2' => $photo2, 'description2' => $description2]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }

    public function SaveNinth(Request $request){

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
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/update-imagen')
                            //->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name1),
                               // "ruta" =>base64_encode($img1),
                                "ruta" =>'files/images/'.$name1,
                                "description" => $desc1,
                                "id" =>$request->input('imageid1'),
                            ))
                           // ->withFile( 'ruta', '/files/images/'.$name1, 'image/jpeg', $name1 )
                            //->withFile( 'image' , 'new \CURLFile('files/images/'.$name1' )
                            ->asJson( true )
                            ->put();
                $img1->move('files/images/',$name1);
                          //  dd($res);
                //unlink('files/images/'.$name1);
                //dd($res);
                if ($res == 'Duration not found' OR $res == 'Service not found' OR $res == 'false') {
                    return redirect('/create-workspace/photos')->with(['message-alert' =>''.$res.'']);
                }
            }
            
            if (!empty($name2)) {
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/update-imagen')
                            //->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name2),
                                 "ruta" =>'files/images/'.$name2,
                                "description" => $desc2,
                                "id" =>$request->input('imageid2'),
                            ))
                           // ->containsFile()
                            ->asJson( true )
                            ->put();
                $img2->move('files/images/',$name2);
               // dd($res);
               // unlink('files/images/'.$name2);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-workspace/photos')->with(['message-alert' =>''.$res.'']);
                }
            }

            return redirect('/create-workspace/services');

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
                    $photo1 = asset($res[0]['ruta']);
                    $description1 = $res[0]['description'];
                    $selected_duration1 = $res[0]['type'];
                    $selected_currency1 = $res[0]['currency_iso'];
                    $price1 = $res[0]['price'];
                }

                if (isset($res[1]['ruta'])) {
                    $photo2 =asset( $res[1]['ruta']);
                    $description2 = $res[1]['description'];
                    $selected_duration2 = $res[1]['type'];
                    $selected_currency2 = $res[1]['currency_iso'];
                    $price2 = $res[1]['price'];
                }

            }


            return view("CreateWorkspace.services", ['id' => $id, 'currencies' => $currencies, 'durations' => $durations, 'photo1' => $photo1, 'description1' => $description1,'photo2' => $photo2, 'description2' => $description2, 'selected_duration1' => $selected_duration1,  'selected_duration2' => $selected_duration2, 'selected_currency1' => $selected_currency1, 'selected_currency2' => $selected_currency2, 'price1' => $price1, 'price2' => $price2]);

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
    }    

    public function SaveTenth(Request $request){

        
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
                return redirect('/create-workspace/photos')->with(['message-alert' =>''.$validator->errors()->all().'']);
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
                    return redirect('/create-workspace/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
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
                    return redirect('/create-workspace/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
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
                    return redirect('/create-workspace/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
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
                    return redirect('/create-workspace/photos')->with(['message-alert' =>'Debes incluir el Precio de tu Servicio']);
                }
            }
           // dd($img1);
            if (!empty($name1)) {
                $img1->move('files/service_images/',$name1);
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-10/service')
                         //   ->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name1),
                                "description" => $desc1,
                                'duration_code' => $request->input('duration1'),
                                'price' => $price1,
                                'currency_id'=> $request->input('currency1'),
                                 "ruta" =>'files/service_images/'.$name1,
                            ))
                         //   ->containsFile()
                            ->asJson( true )
                            ->post();
                           // dd($res);

                //unlink('files/service_images/'.$name1);
                //dd($res);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-workspace/services')->with(['message-alert' =>''.$res.'']);
                }
            }

            if (!empty($name2)) {
                $res = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-10/service')
                           // ->withContentType('multipart/form-data')
                            ->withHeaders( array(
                                'api-token:'.session()->get('user.remember_token')
                            ))
                            ->withData( array(
                                "service_id"=>$id,
                                "image" => new \CURLFile('files/images/'.$name2),
                                "description" => $desc2,
                                'duration_code' => $request->input('duration2'),
                                'price' => $price2,
                                'currency_id'=> $request->input('currency2'),
                                 "ruta" =>'files/service_images/'.$name2,
                            ))
                          //  ->containsFile()
                            ->asJson( true )
                            ->post();
                $img2->move('files/service_images/',$name2);
              //  unlink('files/service_images/'.$name2);
                if ($res == 'Duration not found' OR $res == 'Service not found') {
                    return redirect('/create-workspace/services')->with(['message-alert' =>''.$res.'']);
                }
            }

            return redirect('/create-workspace/notes');

        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }


    }
            

    public function Eleven()
    {
       // dd(session::all());
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

            $saved_notes = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/step-11/number-emergency')
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
            return view("CreateWorkspace.notes", ['id' => $id,'emergency' => $emergency, 'anything' => $anything, 'smoke' => $smoke, 'carbon' => $carbon, 'first' => $first, 'safety' => $safety, 'fire' => $fire, 'fired' => $fired, 'alarm' => $alarm, 'gas' => $gas, 'exit' => $exit]);

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
                return redirect("create-workspace/note")->with(['message-alert' =>''.$res.'']);
            }elseif($res=="Update Note emergency" || $res == "Add Note emergency"){
                return redirect('/create-workspace/co-host');
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
            $res = Curl::to(env('MIGOHOOD_API_URL') . '/service/workspace/step-11/number-emergency')
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
            $res = Curl::to(env('MIGOHOOD_API_URL') . '/service/workspace/step-11/emergency-add')
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
        return view("CreateWorkspace.co-host");
    }

    public function SaveTwelve(Request $request){

    }
    

    public function Preview1(Request $request)
    {
        if(session()->has('service_id')){
          $data['service_id'] = session()->get('service_id');
          
        }else{
            session::forget('service_id');
          $data['service_id'] = $request->input('service_id');
          session::put('service_id', $request->input('service_id'));
        }
          $data['languaje'] = 'ES';
        //dd($data);

        $exit_emergency = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-exit-emergency')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $note_emergency = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-note-emergency')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $emergencies = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-emergency')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            ) )
                        ->asJson( true )
                        ->get();
        $amenities = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-amenities')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $rules = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-rules')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            ) )
                        ->asJson( true )
                        ->get();
        $overview = Curl::to(env('MIGOHOOD_API_URL').'/service/workspace/preview-overviews')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $beds = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-beds')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();
        $description = Curl::to(env('MIGOHOOD_API_URL').'/service/space/getDescription')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ))
                        ->asJson( true )
                        ->get();

        $tknow = Curl::to(env('MIGOHOOD_API_URL').'/service/space/getTooKnow')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ))
                        ->asJson( true )
                        ->get();

        $bedrooms = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-bedrooms')
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

                        $id = session::get('user.id');
       //    dd($description);
        //if($overview != "Not Found"){
       return view("CreateWorkspace.PreviewWorkspace.preview1", ['bedrooms'=>$bedrooms, 'emergencies' => $emergencies, 'exit_emergency' => $exit_emergency, 'note_emergency' => $note_emergency, 'amenities' => $amenities, 'rules' => $rules, 'overview' => $overview, 'beds' => $beds, 'description' => $description, 'tknow' => $tknow, 'price'=>$price,'id'=>$id]);
       /* }else{
             return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor rellenen los campos del formularios que faltan.']);
        }*/
        
    }

        public function Preview2(Request $request)
    {
        if(session()->has('service_id')){
          $data['service_id'] = session()->get('service_id');
          
        }else{
          session::forget('service_id');
          $data['service_id'] = $request->input('service_id');
          session::put('service_id', $request->input('service_id'));
        }
        $data['languaje'] = 'ES';
        $img='';
        $img = Curl::to(env('MIGOHOOD_API_URL').'/service/get-imagen')
                        ->withData(array(
                            'service_id'=>$data['service_id'],
                            ))
                        ->asJson(true)
                        ->get();
                       
        return view("CreateWorkspace.PreviewWorkspace.preview2",compact('img'));
    }

        public function Preview3()
    {
         $data['service_id'] = session()->get('service_id');
        $data['languaje'] = 'ES';
      
        $overview3 = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-overviews')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();

        return view("CreateWorkspace.PreviewWorkspace.preview3",['overview3'=>$overview3]);
    }

        public function Preview4()
    {
        $data['service_id'] = session()->get('service_id');
          $data['languaje'] = 'ES';

          $overview4 = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-map-neighborhood')
                        ->withData( array(
                            'service_id' => $data['service_id'],
                            'languaje' => $data['languaje'],
                            ) )
                        ->asJson( true )
                        ->get();

            $latitude = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-map-neighborhood-latitude')
                            ->withData( array(
                                'service_id' => $data['service_id'],
                                'languaje' => $data['languaje'],
                                ) )
                            ->asJson( true )
                            ->get();

            $longitude = Curl::to(env('MIGOHOOD_API_URL').'/service/space/preview-map-neighborhood-longitude')
                            ->withData( array(
                                'service_id' => $data['service_id'],
                                'languaje' => $data['languaje'],
                                ) )
                            ->asJson( true )
                            ->get();

        return view("CreateWorkspace.PreviewWorkspace.preview4",['latitude' => $latitude, 'longitude' =>$longitude,'overview4'=>$overview4]);
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

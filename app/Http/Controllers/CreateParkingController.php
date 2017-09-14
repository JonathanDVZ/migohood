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
            return redirect('/create-parking/bedrooms')/*->with(['id' => $request->input('service_id')])*/;
        else
            return redirect('/create-parking/place-type')->with(['message-alert' => '' . $res . $request->input('service_id').  ''/*,'id' => $request->input('service_id')*/]);

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
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-4/location')
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
            return redirect('/create-parking/amenities');
        } else {
            return redirect('/create-parking/location')->with(['message-alert' =>''.$response.'']);
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
            
            }
                return view("CreateParking.amenities")->with(['id' => $id, 'security' => $security, 'padlock' => $padlock, 'vigilant' => $vigilant, 'permission' => $permission, 'other' => $other, 'valet'=>$valet, ]);
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
        return view("CreateParking.hosting");
    }

    public function SaveSixth(Request $request){
        
    }

        public function Seventh()
    {
        return view("CreateParking.basics");
    }

    public function SaveSeventh(Request $request){
        
    }

        public function Eigth()
    {
        return view("CreateParking.listing");
    }

    public function SaveEigth(Request $request){
        
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
        return view("CreateParking.notes");
    }            

    public function SaveEleven(Request $request){
        
    }

            public function Twelve()
    {
        return view("CreateParking.co-host");
    }

    public function SaveTwelve(Request $request){
        
    }

    public function Preview1()
    {
        return view("CreateParking.PreviewParking.preview1");
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

        return view("CreateParking.PreviewParking.preview4",['latitude' => $latitude, 'longitude' =>$longitude,'overview4'=>$overview4]);
        
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

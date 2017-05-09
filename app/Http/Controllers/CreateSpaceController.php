<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Curl;
use Session;
use Hash;

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
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-1/create')
                            ->withData( array(
                                'service_id'  => $id,
                                'languaje' => 'ES'
                                ) )
                            ->asJson( true )
                            ->get();
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

            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/bedrooms')
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
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/beds/details')
                    ->withData( array( 
                        'service_id' => $request->input('service_id'),
                        'bedroom_id' => $request->input('bedroom_id'),
                        'queen_bed' => $request->input('queen_bed'),
                        'double_bed' => $request->input('double_bed'),
                        'individual_bed'  => $request->input('individual_bed'),
                        'sofa_bed' => $request->input('sofa_bed'),
                        'other_bed'  => $request->input('other_bed'),
                        ) )
                    ->asJson( true )
                    ->post();

        if ($response == 'Add Bedroom-Beds' OR $response == 'Update  Bedroom-Beds') {
            return redirect('/create-space/bedrooms/edit-bedrooms');
        } else {
            return redirect('/create-space/bedrooms/edit-bedrooms')->with(['msg' => ''.$response.'']);
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
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-3/bathroom')
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

            return view("CreateSpace.locations", ['id' => $id, 'countries' => $countries, 'result' => $result, 'address' => $address, 'apartment' => $apartment, 'description' => $description, 'around' => $around, 'states' => $states, 'cities' => $cities]);
             
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
                        'des_around' => $request->input('around')
                        ) )
                    ->asJson( true )
                    ->put();


        if ($response == 'Add Location') {
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

                $save_amenities = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-5/amenities')
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
            return view("CreateSpace.hosting", ['id' => $id] );
             
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
            return view("CreateSpace.basics", ['id' => $id]);
             
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
        }
        
    }


    public function Eigth()
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }
            return view("CreateSpace.listing", ['id' => $id]);
             
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
            return view("CreateSpace.photos", ['id' => $id]);
             
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
            return view("CreateSpace.services", ['id' => $id]);
             
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
            return view("CreateSpace.notes", ['id' => $id]);
             
        } else {
            return redirect('/becomeahost')->with(['message-alert' => 'Ha habido un problema por favor recargue la pagina']);
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

    public function ChooseType()
    {
        return view('SpaceType.choose-type');
    }

    public function ChooseSpace()
    {
        return view('SpaceType.choose-space');
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

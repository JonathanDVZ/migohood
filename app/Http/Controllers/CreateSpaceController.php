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

    public function First()
    {
        
        $types = Curl::to(env('MIGOHOOD_API_URL').'/category/space/get-type')
                    ->asJson( true )
                    ->get();
        $accommodation = Curl::to(env('MIGOHOOD_API_URL').'/accommodation/get-accommodation')
                    ->asJson( true )
                    ->get();
        //session()->put('message-alert', 'test');  
        return view("CreateSpace.placeType", ['types' => $types, 'accommodation' => $accommodation]);
    }

    public function AddPlaceType(Request $request)
    {
        // Enviar los datos a la API para crear un nuevo espacio
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-1/create')
                    ->withHeaders( array( 
                        'api-token:'.session()->get('user.remember_token') 
                    ))
                    ->withData( array( 
                        'user_id' => session()->get('user.id'),
                        'type_id'  => $request->input('type'),
                        'accommodation_id'  => $request->input('accomodation'),
                        'live'  => $request->input('live')
                        ) )
                    ->asJson( true )
                    ->post();
        //dd($response);

        // Si es un array y existe el valor id se dirige a la proxima vista
        if (is_array($response) && array_key_exists('id', $response)) {
            session()->put('id', $response['id']);                
            return redirect('/create-space/bedrooms');
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

            return redirect('/create-space/place-type')->with(['message-alert' => '' . $res . '']);
        }
        
    }
     
    public function Second1()
    {
        $id = '';
        if (session()->has('id')) {
            $id = session()->get('id');
            session()->forget('id');
        }
        
        return view("CreateSpace.bedrooms", ['id' => $id]);
    }

    public function AddBedrooms(Request $request)
    {
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/bedrooms')
                    ->withData( array( 
                        'service_id' => $request->input('service'),
                        'num_guest'  => $request->input('guests_number'),
                        'num_bedroom'  => $request->input('bedrooms_number'),
                        ) )
                    ->asJson( true )
                    ->post();

        // Si es un array y existe el valor id se dirige a la proxima vista
        /*if (is_array($response) && array_key_exists('id', $response)) {
            //dd($response['bedrooms']);
            // se guardan en sesion las variables id y numero de hab para ser usadas en la proxima vista
            
            //session()->put('bedrooms', $response['bedrooms']);                
            return redirect('/create-space/bedrooms/edit-bedrooms');
        // Si no, se retorna un mensaje al usuario
        } else {*/
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
            session()->put('id', $request->input('service'));
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
        if (session()->has('id')) {
            $id = session()->get('id');
            session()->forget('id');
        }

        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/get-bed-bedroom')
                            ->withData( array( 
                                'service_id' => $id,
                                ) )
                            ->asJson( true )
                            ->post();
        //dd($response);
        // Si es un array y existe el valor bedroom_id se dirige a la proxima vista
        if (is_array($response) && array_key_exists('bedroom_id', $response[0])) {
                            
            // Se retorna la vista con las variables
            return view("CreateSpace.bedrooms-all", ['id' => $id, 'bedrooms' => $response]);
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
        //lo idonep es que hsys una ruta a la que le pase el id del cuarto y el id de usuario, valide eso y me devuelva los datos necesarios, aparte podria ser bueno agregar un campo mas a los cuartos para indicar el numero
        return view("CreateSpace.bedrooms-addbed",['service_id' => $request->input('service_id'), 'bedroom_id' => $request->input('bedroom_id'), 'refer' => $request->input('refer')]);
    }

        public function Third()
    {
        return view("CreateSpace.baths");
    }

        public function Fourth()
    {
        return view("CreateSpace.locations");
    }

    public function Fifth()
    {
        return view("CreateSpace.amenities");
    }

        public function Sixth()
    {
        return view("CreateSpace.hosting");
    }

        public function Seventh()
    {
        return view("CreateSpace.basics");
    }

        public function Eigth()
    {
        return view("CreateSpace.listing");
    }

        public function Ninth()
    {
        return view("CreateSpace.photos");
    }

        public function Tenth()
    {
        return view("CreateSpace.services");
    }            

            public function Eleven()
    {
        return view("CreateSpace.notes");
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

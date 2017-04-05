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
        return view("CreateSpace.placeType");
    }

    public function AddPlaceType(Request $request)
    {
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-1/create')
                    ->withHeaders( array( 
                        'api_token: '.session()->get('user.remember_token') 
                    ))
                    ->withData( array( 
                        'user_id' => session()->get('user.id'),
                        'type_id'  => $request->input('type'),
                        'accommodation_id'  => $request->input('accomodation'),
                        'live'  => $request->input('live')
                        ) )
                    ->asJson( true )
                    ->post();
        
        if (is_array($response) && array_key_exists('id', $response))                
            return redirect('/create-space/bedrooms');
        else {
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
        
        return view("CreateSpace.bedrooms");
    }
     
        public function Second2()
    {
        return view("CreateSpace.bedrooms-all");
    }
     
        public function Second3()
    {
        return view("CreateSpace.bedrooms-addbed");
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

<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Curl;

class CreateParkingController extends Controller
{
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
        return view("CreateParking.placeType");
    }

        public function Second(Request $request)
    {
        return view("CreateParking.bedrooms")->with("id", !empty(session('quantity'))?session("quantity"):0);
    }

        public function Third()
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
        }
        return view("CreateParking.baths",['id'=>$id]);
    }

        public function Fourth()
    {
        return view("CreateParking.locations");
    }

    public function Fifth(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
            if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }
            if (!empty($request->input("files")) && $request->input("files") != null) {
                $imgs = $request->input("files");
            }
            $res = Curl::to(env('MIGOHOOD_API_URL') . '/amenities/get-space-amenities')
                ->withHeaders(array(
                    'api-token:' . session()->get('user.remember_token')
                ))
                ->withData(array(
                    'languaje' => 'ES'
                ))
                ->asJson(true)
                ->get();
            var_dump($res);
            if(!is_array($res) && $res =="amenities not found"){

            }else{
                return view("CreateParking.amenities")->with(["result"=>$res,'id' => $id,]);
            }
        }else{
            return view("CreateParking.amenities")->with(['message-alert' => 'Ha ocurrido un problema por favor recargue la pagina']);
        }
    }

        public function Sixth()
    {
        return view("CreateParking.hosting");
    }

        public function Seventh()
    {
        return view("CreateParking.basics");
    }

        public function Eigth()
    {
        return view("CreateParking.listing");
    }

        public function Ninth()
    {
        return view("CreateParking.photos");
    }

        public function Tenth()
    {
        return view("CreateParking.services");
    }            

            public function Eleven()
    {
        return view("CreateParking.notes");
    }            

            public function Twelve()
    {
        return view("CreateParking.co-host");
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
        return view("CreateParking.PreviewParking.preview4");
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

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



    public function Category()
    {
        $id = ''; $result = '';
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            //
            $result = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-1/get-create')
                            ->withData( array(
                                'service_id'  => $id,
                                'languaje' => 'ES'
                                ) )
                            ->asJson( true )
                            ->get();
           
        } else {
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
               //dd($service);
                return redirect('/becomeahost')->with(['message-alert' => '' . $res . '']);
            }

            $id = $service['id'];

            session()->put('service_id', $id);
        }

                  //  dd($service);

        return view("CreateService.category", [ 'id' => $id, 'result' => $result]);
    }


    public function SaveCategory(Request $request)
    {
        if (session()->has('service_id')) {
            $id = session()->get('service_id');
            $msg = '';
        if (session()->has('message-alert')) {
                $msg = session()->get('message-alert');
                session()->forget('message-alert');
            }

        if ($request->input('recreational') !== null) {
                $recreational = ($request->input('recreational') == 'on') ? true:false;
            } else {
                $recreational = false;
            }
        // Enviar los datos a la API para crear un nuevo espacio
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/services/step-1/create')
                    ->withHeaders( array(
                        'api-token:'.session()->get('user.remember_token')
                    ))
                    ->withData( array(
                        'user_id' => session()->get('user.id'),
                        'recreational'=>$recreational,
                        'service_id' => $request->input('service_id'),
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
        //dd($res);
        if ($res == 'Add Step-1' OR $res == 'Update Step-1'){
            
            return redirect('/create-service/hosting')/*->with(['id' => $request->input('service_id')])*/;
        }else{
            dd($res);
            return redirect('/create-service/category')->with(['message-alert' => '' . $res . $request->input('service_id').  ''/*,'id' => $request->input('service_id')*/]);
            }
        }   
    }

    public function Hosting()
    {
        return view("CreateService.hosting");
    } 
    public function Basics()
    {
        return view("CreateService.basics");
    } 
    public function Photos()
    {
        return view("CreateService.photos");
    } 
    public function Location()
    {
        return view("CreateService.locations");
    } 
    public function Notes()
    {
        return view("CreateService.notes");
    } 
    public function CoHost()
    {
        return view("CreateService.co-host");
    } 

    public function Preview1()
    {
        return view("CreateService.PreviewService.preview1");
    }

    public function Preview2()
    {
        return view("CreateService.PreviewService.preview2");
    }

    public function Preview3()
    {
        return view("CreateService.PreviewService.preview3");
    }

    public function Preview4()
    {
        return view("CreateService.PreviewService.preview4");
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

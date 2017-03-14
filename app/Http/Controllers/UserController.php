<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Curl;
use Illuminate\Support\Facades\Auth;
use Response;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register-user-front');
    }

         public function becomeahost()
    {
        return view ("becomeahost");
    }

    public function secondstepspace()
    {
        return view ("secondstepspace");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    //funcion para crear usuario
    public function CreateUser(Request $request)
    {
       
        try
        {
            $user = Curl::to(env('MIGOHOOD_API_URL').'/user/create')
                    ->withData( array( 
                        'name' => $request->input("name"),                         
                        'lastname' => $request->input("lastname"),
                        'email' => $request->input("email"),
                        'password' => $request->input("password"),
                        ) )
                    ->asJson( true )
                    ->post();
            
            if (is_array($user) && array_key_exists('id', $user)){
                Auth::loginUsingId($user['id'],true);
                return redirect('/')->with(['message-alert' => ' <img src="'.url('/assets/img/logo.png').'" style="width:30%;"><br><span style="color:#023859;"> YOU ARE NOW REGISTRED <span>']);
            }
            else{
                $user = json_encode($user);
                $caracters = array('"','[',']',',');
                $user = str_replace($caracters,'',$user );
                return redirect('/')->with(['message-alert' => '<span style="color:#C48634;">'.$user.'</span>']);
            }

        }catch(Exception $e){
            return redirect('/')->with(['message-alert' => '<img src="'.url('/assets/img/logo.png').'" style="width:30%;"><br><span style="color:#023859;">'.$e->getMessage().'<span>']);
        }
    }
   
    //funcion para login de usuario
    public function postLogin(Request $request){
    $user = Curl::to(env('MIGOHOOD_API_URL').'/user/login')
                    ->withData( array(                                       
                        'email' => $request->input("email"),
                        'password' => $request->input("password"),
                        ) )
                    ->asJson( true )
                    ->post();
    if(is_array($user) && array_key_exists('id', $user)){
        Auth::loginUsingId($user['id'],$request->has("remember"));

        return redirect('/');
    }
    return redirect('/')->with(['message-alert' => '<span style="color:#023859;">The account that you want to enter is not registred or your passwor is incorrect <span>']);
    
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

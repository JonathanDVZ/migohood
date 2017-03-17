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
        $password=$request->input("password");
        $confirmpassword=$request->input("confirmpassword");
        $checkbox2=$request->input("checkbox2");
        if($password == $confirmpassword ){
            if (isset( $checkbox2)) {          
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
                        return redirect('/')->with(['message-alert' => 'USTED ESTA AHORA REGISTRADO']);
                    }
                    else{
                        $user = json_encode($user);
                        $caracters = array('"','[',']',',');
                        $user = str_replace($caracters,'',$user );
                        return redirect('/registeruser')->with(['message-alert' => ''.$user.'']);
                    }

                }catch(Exception $e){
                return redirect('/registeruser')->with(['message-alert' => ''.$e->getMessage().'']);
                }
            }   
            else{
                return redirect('/registeruser')->with(['message-alert' => 'DEBE ACEPTAR TERMINOS Y CONDICIONES']);
            }
        }
        else{
            return redirect('/registeruser')->with(['message-alert' => 'la calve y su confirmación deben ser iguales']);    
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

        return redirect('/')->with(['message-alert' => 'Bienvenido has accedido']);
    }
    return redirect('/accessuser')->with(['message-alert' => 'la cuenta con la que estas intentando entrar no esta registrada o tu clave es incorrecta']);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

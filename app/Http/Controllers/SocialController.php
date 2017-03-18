<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;
use Curl;
use Response;

class SocialController extends Controller {
 

       public function getSocialAuth($provider=null)
       {
           if(!config("services.$provider")) abort('404');

           return Socialite::driver($provider)->redirect();
       }


       public function getSocialAuthCallback($provider=null)
       {
          if($usersocialite = Socialite::driver($provider)->stateless()->user()){
            if ($the_user = User::select()->where('email', '=', $usersocialite->email)->first()){
            //comenzando validacion	
             	$user = Curl::to(env('MIGOHOOD_API_URL').'/user/login-oauth')
                    	->withData( array(                                       
                        	'email' => $usersocialite->email,                        	
                        	) )
                    	->asJson( true )
                    	->post();
    			if(is_array($user) && array_key_exists('id', $user)){
       		 	Auth::loginUsingId($user['id'],$request->has("remember"));

        		return redirect('/')->with(['message-alert' => 'Bienvenido has accedido']);
    			}
    			return redirect('/accessuser')->with(['message-alert' => 'la cuenta con la que estas intentando entrar no esta registrada o tu clave es incorrecta']);
			//terminando validacion
            }	
        	else{     
              try
                {
                $user = Curl::to(env('MIGOHOOD_API_URL').'/user/set-user-oauth')
                            ->withData( array( 
                                'name' => $usersocialite->name,                       
                                'email' => $usersocialite->email,
                                'thumbnail' => $usersocialite->avatar,
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
          
          }else{
             return redirect('/')->with(['message-alert' => 'NO SE HA PODIDO REALIZAR LA OPERACION']);
          }
       }
}
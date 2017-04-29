<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Curl;
use Response;

class SocialController extends Controller {
 
        public function __construct()
        {
            // Solo se aceptan usuarios invitados
            $this->middleware('guest');
        }
        
        public function getSocialAuth(Request $request, $action=null, $provider=null)
        {
           //Se guardan los parametros en variables de sesion para acceder a ellos luego
           session()->put('action', $action);
           session()->put('provider', $provider);

           if(!config("services.$provider")) abort('404');

           return Socialite::driver($provider)->redirect();
        }


        public function getSocialAuthCallback(Request $request)
        {
            // Se guardan los parametros en variables y se borran de la sesion creada
            $action = session()->get('action');
            session()->forget('action');
            $provider = session()->get('provider');
            session()->forget('provider');

            if($usersocialite = Socialite::driver($provider)->stateless()->user()){
                // Si la accion es login se hace el proceso de inicio de sesion
                if (strcmp($action,'login')==0){
           
                    //comenzando validacion	
                 	$user = Curl::to(env('MIGOHOOD_API_URL').'/user/login-oauth')
                            	->withData( array(                                       
                                	'email' => $usersocialite->email,                        	
                                	) )
                            	->asJson( true )
                            	->post();
        			//dd($user);
        			// Si el array user tiene un id, existe el usuario        			
        			if (is_array($user) && array_key_exists('id', $user)){
               		 	// Le doy una sesion que dura un anio
                        $lifetime = time() + 60 * 60 * 24 * 365;
                        \Config::set('session.lifetime', $lifetime);
                        // Regenero el id de la sesion e inicializo una nueva
                        session()->regenerate();
                        session()->put('user', $user);
                        // Redirecciono a home
                		return redirect('/')->with(['message-alert' => 'Bienvenido has accedido']);
        			} else //Los datos son incorrectos
                        /*$user = json_encode($user);
                        $caracters = array('"','[',']',',');
                        $user = str_replace($caracters,'',$user );*/
                        return redirect('/accessuser')->with(['message-alert' => 'la cuenta con la que estas intentando entrar no esta registrada o tu clave es incorrecta']);
                } elseif (strcmp($action,'signup')==0) { // Se hace el proceso de registro
                    try
                    {
                        $user = Curl::to(env('MIGOHOOD_API_URL').'/user/set-user-oauth')
                                    ->withData( array( 
                                        'name' => $usersocialite->name,                       
                                        'email' => $usersocialite->email,
                                        'avatar' => $usersocialite->avatar,
                                        'avatar_original' => $usersocialite->avatar,
                                        ) )
                                    ->asJson( true )
                                    ->post();
                        // Si el array user tiene un id, existe el usuario  
                        if (is_array($user) && array_key_exists('id', $user)){
                            // Le doy una sesion que dura un anio
                            $lifetime = time() + 60 * 60 * 24 * 365;
                            \Config::set('session.lifetime', $lifetime);
                            // Regenero el id de la sesion e inicializo una nueva
                            session()->regenerate();
                            session()->put('user', $user);
                            // Redirecciono a home
                            return redirect('/')->with(['message-alert' => 'USTED ESTA AHORA REGISTRADO']);
                        } else {
                            $user = json_encode($user);
                            $caracters = array('"','[',']',',');
                            $user = str_replace($caracters,'',$user );
                            return redirect('/registeruser')->with(['message-alert' => ''.$user.'']);
                        }

                    } catch(Exception $e) {
                        return redirect('/registeruser')->with(['message-alert' => ''.$e->getMessage().'']);
                    }
                } else // No se tiene una accion definida
                    return redirect('/')->with(['message-alert' => 'ERROR']);
            	
        	} else // Ha ocurrido un error inesperado
                return redirect('/')->with(['message-alert' => 'NO SE HA PODIDO REALIZAR LA OPERACION']);
        }
}
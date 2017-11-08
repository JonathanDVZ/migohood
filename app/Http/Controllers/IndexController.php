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

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	set_time_limit(300);

    	session::forget('service_id');

        $space=''; $service=''; $parking=''; $workspace=''; $img='';
    	$space =Curl::to(env('MIGOHOOD_API_URL').'/getspaces')
    					->withData( array(
                                'languaje' => 'ES'
                             	 ) )
                        ->asJson( true )
                        ->get();

        // dd($space);
        if($space !='Not Found' AND isset($space)){
            $space = array_slice($space,0,4,true);
        }
        
        $service =Curl::to(env('MIGOHOOD_API_URL').'/getservices')
                        ->withData( array(
                                'languaje' => 'ES'
                                 ) )
                        ->asJson( true )
                        ->get();
        if($service !='Not Found' AND isset($service)){
            $service = array_slice($service,0,4,true);
        }
        
        $parking =Curl::to(env('MIGOHOOD_API_URL').'/getparkings')
                        ->withData( array(
                                'languaje' => 'ES'
                                 ) )
                        ->asJson( true )
                        ->get();
        if($parking !='Not Found' AND isset($parking)){              
         $parking = array_slice($parking,0,4,true);
        }
        
        $workspace =Curl::to(env('MIGOHOOD_API_URL').'/getworkspaces')
                        ->withData( array(
                                'languaje' => 'ES'
                                 ) )
                        ->asJson( true )
                        ->get();
         if($workspace !='Not Found' AND isset($workspace)){
         $workspace = array_slice($workspace,0,4,true);
        }
                        
         $img =Curl::to(env('MIGOHOOD_API_URL').'/getimages')
                        ->withData( array(
                                'languaje' => 'ES'
                                 ) )
                        ->asJson( true )
                        ->get();
                      //  dd(array_values($img));
                     //   dd($img);
                    //    dd($space);

        return view ("site.home",compact('service','space','parking','workspace','img'));
    }

}

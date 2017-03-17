<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '610307952496520',
        'client_secret' => '4a8719b8bbf1fa2277671dbf9647eb54',
        'redirect' => 'http://localhost/migohood/public/social/callback/facebook',
    ],
 
    'google' => [
        'client_id' => '900552274918-08dtuj7ohevc90mkh0l770kob7gho1te.apps.googleusercontent.com',
        'client_secret' => 'mirGFSbEoUn1-egp-wrcGqrj',
        'redirect' => 'http://localhost/migohood/public/social/callback/google',
    ],

];

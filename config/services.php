<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => Taller\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '254239395106791',
        'client_secret' => '05e0689809e34eab82559ca95d1e97ae',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
   /* 'google' => [
        'client_id' => '907655216004474',
        'client_secret' => '3eba6514ae8e475ea2934ea33d273db6',
        'redirect' => 'http://localhost:90/callback/facebook',
    ],
    'linkenin' => [
        'client_id' => '907655216004474',
        'client_secret' => '3eba6514ae8e475ea2934ea33d273db6',
        'redirect' => 'http://localhost:90/callback/facebook',
    ],*/

];

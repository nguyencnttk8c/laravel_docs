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

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1550541271911560',
        'client_secret' => 'd8624f0048c9bcfdb224d23e9268deeb',
        'redirect' => 'http://123doc.local/callbackfacebook',
    ],

    'google' => [
        'client_id' => '346165023593-eqv9nmsmkli79rhjs8bmt1pep11lbski.apps.googleusercontent.com',
        'client_secret' => 'BzGffzmKzyB87rDCa0KhmCJs',
        'redirect' => 'http://123doc.local/callbackgoogle',
    ],
];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '191489810723-7sfgvvi7ob5atmglg0hjkm2rc5cv824t.apps.googleusercontent.com',
        'client_secret' => 'kqpEGJ5yoTECyW7rkqMSslKM',
        'redirect' => 'https://squad.ibtikar.net.sa/auth/google/callback',
    ],

    'twitter' => [
         'client_id' => 'R5CFPnLlq8747HbaFgum0dQeO',
         'client_secret' => 'kgWdNzcb1vqTqaY0NdyyDLDGiFMRia2U6Zl9PARbTtukGG308K',
         'redirect' => 'https://squad.ibtikar.net.sa/callback/twitter',
     ],

];

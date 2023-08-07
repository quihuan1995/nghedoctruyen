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
    'facebook' => [
        'client_id' => '1276799279869401',
        'client_secret' => '08ef34179e33338ad451fcab82a4f329',
        'redirect' => 'https://truyenhan.top/facebook/callback',
    ],

    'google' => [
        'client_id' => '134345017131-9ao7ln21ijs7567osvdndnfmqbgpjr0h.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://truyenhan.top/google/callback',
    ],
];
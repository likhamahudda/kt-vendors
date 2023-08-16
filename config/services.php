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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'linkedin' => [
        'client_id' => '86cdup2mto10r1',
        'client_secret' => '2j4tdff8tZVpGAbu',
        'redirect' => 'https://sociallogin.developersforhire.site/auth/linkedin/callback',
    ],
    'google' => [
        'client_id' => '71333009896-lu1rfvs06e91vm1jm7crvdt5k7t64cu5.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://sociallogin.developersforhire.site/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '2916363798659189',
        'client_secret' => 'a2854aa36cf35c261b88131fbc78721b',
        'redirect' => 'https://sociallogin.developersforhire.site/auth/facebook/callback',
    ],
    'github' => [
        'client_id' =>'bb3ce1a67e05a8e40c14',
        'client_secret' => '1edd0baaa18f37511251c4f1acdd7d53a823a6a2',
        'redirect' => 'https://sociallogin.developersforhire.site/auth/github/callback',
    ],

];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password reset
    | options for your application. You may change these defaults as required.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Here you may define every authentication guard for your application. Of course,
    | a great default configuration has been already defined for you here using session storage
    | and the Eloquent user provider.
    |
    | All authentication drivers have a user provider which defines how users are actually
    | retrieved out of your database or other storage mechanisms used by this application to
    | persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [

        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'employee' => [
            'driver' => 'session',
            'provider' => 'employees',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how users are retrieved
    | out of your database or other storage mechanisms used by this application to persist your
    | user's data.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'employees' => [
            'driver' => 'eloquent',
            'model' => App\Models\Employee::class,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset Settings
    |--------------------------------------------------------------------------
    |
    | Here you may define the settings for password resets including the table that should
    | be used to store the reset tokens and the amount of time the tokens should be valid.
    |
    */

    'passwords' => [

        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'employees' => [
            'provider' => 'employees',
            'table' => 'password_resets',
            'expire' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | This option controls the amount of time (in seconds) that the password confirmation
    | will be valid before the user is prompted to confirm their password again.
    |
    */

    'password_timeout' => 10800,

];

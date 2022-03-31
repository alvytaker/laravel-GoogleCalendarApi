<?php

return [

    'default_auth_profile' => env('GOOGLE_CALENDAR_AUTH_PROFILE', 'service_account'),

    'auth_profiles' => [

        /*
         * Authenticate using a service account.
         */
         //Estas credenciales se Utilizan solo cuando creamos una clave api para acceder de forma directa a los servicios de google calendar
        'service_account' => [
            /*
             * Path to the json file containing the credentials.
             */
            'credentials_json' => storage_path('app/google-calendar/service-account-credentials.json'),
        ],

        /*
         * Authenticate with actual google user account.
         */
        //Este archivo almacena las credenciales y autorizacion para una pantalla de consentimiento 0Auth
        'oauth' => [
            /*
             * Path to the json file containing the oauth2 credentials.
             */
        //Almacenamos los Tokens que generara la api para poder consumir sus recursos
            'credentials_json' => storage_path('app/google-calendar/oauth-credentials.json'),

            /*
             * Path to the json file containing the oauth2 token.
             */
            'token_json' => storage_path('app/google-calendar/oauth-token.json'),
        ],
    ],

    /*
     *  The id of the Google Calendar that will be used by default.
     */
    'calendar_id' => env('GOOGLE_CALENDAR_ID'),

     /*
     *  The email address of the user account to impersonate.
     */
    'user_to_impersonate' => env('GOOGLE_CALENDAR_IMPERSONATE'),
];

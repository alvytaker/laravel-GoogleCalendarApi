<?php

namespace App\Http\Helpers;
use Google_Client;
use Google_Service_Calendar;

class Account {


    public static function Clientauth(){

        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google-calendar/oauth-credentials.json'));
        $client->setScopes(Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);

        return $client;
    }

}
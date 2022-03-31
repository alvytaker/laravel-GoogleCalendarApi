<?php

namespace App\Http\Controllers;
use Google_Service_Calendar;
use App\Http\Helpers\Account;


class AccountController extends Controller
{

    protected $client;

    public function __construct()
    {
         $this->client = Account::Clientauth();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
           
            return redirect()->route('Listevent');
        
        }else{

            return redirect()->route('oauthCallback');
        }
       }


    public function Oauth()
    {
        session_start();

        $rurl = action([AccountController::class,'Oauth']);
      /* Metodo para redireccionar una url
       $this->client->setRedirectUri($rurl); */

      //Metodo setState aumenta la seguridad al redireccionar una url
        $this->client->setState($rurl);

        if (!isset($_GET['code'])) {

            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);

            return redirect($filtered_url);

        }else{

            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();

            return redirect()->route('cal.index');
        }
    }
   
}

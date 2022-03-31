<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use App\Http\Helpers\Account;
use App\Http\Helpers\EventCalendar;
use Illuminate\Support\Carbon;

class EventController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected $client;

    public function __construct()
    {
         $this->client = Account::Clientauth();
    }


    public function Listevent(){

        session_start();

        $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';
            $events = $service->events->listEvents($calendarId);
           
            return view('ListCalendar',compact('events'));
            
    }


    public function Store(Request $request)
    {
        session_start();
        $title = $request->title;
        $description = $request->description;
        $startDateTime = $request->start_date;
        $endDateTime = $request->end_date;

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {

            $this->client->setAccessToken($_SESSION['access_token']);

            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';

            $event = new Google_Service_Calendar_Event([
                'summary' => $title,
                'description' => $description,
                'start' => ['dateTime' => Carbon::create($startDateTime, 'America/Santiago')->toRfc3339String()],
                'end' => ['dateTime' =>  Carbon::create($endDateTime, 'America/Santiago')->toRfc3339String()],
                'reminders' => ['useDefault' => true],
            ]);


            $results= $service->events->insert($calendarId, $event);
           
          //  return $results->id;
            if (!$results) {
              return redirect()->route('cal.index')->with('mensaje','Algo salio mal');
            }

              EventCalendar::Eventcreated($results->id,$title, $description, $startDateTime, $endDateTime);

              return redirect()->route('cal.index')->with('mensaje','Evento creado');
              
        }else{

            return redirect()->route('oauthCallback'); 
        }
    }



    public function Show($idevent){

     $idevento = $idevent;

     session_start();

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {

            $this->client->setAccessToken($_SESSION['access_token']);

            $service = new Google_Service_Calendar($this->client);

            $event = $service->events->get('primary', $idevento);

            if(!$event){
               return redirect()->route('cal.index')->with('mensaje','Algo salio mal');
            }
    
         return view('ViewEdit', compact('event'));

        }else{
            return redirect()->route('oauthCallback');
        }
        
    }


    public function Update(Request $request, $eventId ){

        session_start();

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']){

            $this->client->setAccessToken($_SESSION['access_token']);

            $service = new Google_Service_Calendar($this->client);

            $startDateTime = Carbon::create($request->start_date, 'America/Santiago')->toRfc3339String();

            $eventDuration = 30; //minutes

            if ($request->has('end_date')) {
                $endDateTime = Carbon::create($request->end_date, 'America/Santiago')->toRfc3339String();

            } else {
                $endDateTime = Carbon::create($request->start_date, 'America/Santiago')->addMinutes($eventDuration)->toRfc3339String();
            }

            // retrieve the event from the API.
            $event = $service->events->get('primary', $eventId);

            $event->setSummary($request->title);

            $event->setDescription($request->description);

            //start time
            $start = new Google_Service_Calendar_EventDateTime();
            $start->setDateTime($startDateTime);
            $event->setStart($start);
            $start->setTimeZone('America/Santiago');

            //end time
            $end = new Google_Service_Calendar_EventDateTime();
            $end->setDateTime($endDateTime);
            $event->setEnd($end); 
            $start->setTimeZone('America/Santiago');

            $updatedEvent = $service->events->update('primary', $event->getId(), $event);

            EventCalendar::Eventedit($eventId,$request->title, $request->description, $startDateTime, $endDateTime, $event->getCreated());


            if(!$updatedEvent){
                return redirect()->route('cal.index')->with('mensaje','Algo salio mal');
            }

            return redirect()->route('cal.index')->with('mensaje','Evento actualizado');

        }else{
            return redirect()->route('oauthCallback');
        }
        

    }



    public function Delete($eventId){

        session_start();

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']){

            $this->client->setAccessToken($_SESSION['access_token']);

            $service = new Google_Service_Calendar($this->client);

            $results = $service->events->delete('primary', $eventId);

            EventCalendar::Eventdelete($eventId);

            if(!$results){
               return redirect()->route('cal.index')->with('mensaje','Error al eliminar');
              }

            return redirect()->route('cal.index')->with('mensaje','Evento eliminado');

        }else{
            return redirect()->route('oauthCallback');
        }

    }


    public function Cargarevento(){
     session_start();

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';

        
            $events = $service->events->listEvents($calendarId);
                  

            $respo = EventCalendar::Eventadd($events);

            return json_encode($respo);
        
        }else{

          return redirect()->route('oauthCallback');
        }
    }


}

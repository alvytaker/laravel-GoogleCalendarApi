<?php

namespace App\Http\Helpers;
use App\Models\Event;
use Illuminate\Support\Carbon;

class EventCalendar {


    public static function Eventadd($events){

    foreach($events->getItems() as $e){

    if($e->summary !== null && $e->start->dateTime !== null && $e->end->dateTime !== null){

      $resul =  Event::where('code',$e->id)->first();

      if($resul == null){
       $event = new Event();
       $event->code = $e->id;
       $event->summary = $e->summary;
       $event->description = $e->description;
       $event->start = Carbon::parse($e->start->dateTime)->format('Y-m-d H:i:s');
       $event->end = Carbon::parse($e->end->dateTime)->format('Y-m-d H:i:s');
       $event->created =Carbon::parse($e->created)->format('Y-m-d H:i:s'); 
       $event->user_id = auth()->user()->id;
       $event->save();     

               }

            }

         }
 
       $eventos = Event::all();

       return $eventos;
     }

    

    public static function Eventcreated($id,$title, $description, $startDateTime, $endDateTime){

      date_default_timezone_set("America/Santiago");
      $fechacreacion = date("Y-m-d H:i:s ");

       $event = new Event();
       $event->code = $id;
       $event->summary = $title;
       $event->description = $description;
       $event->start = Carbon::parse($startDateTime)->format('Y-m-d H:i:s');
       $event->end = Carbon::parse($endDateTime)->format('Y-m-d H:i:s');
       $event->created =Carbon::parse($fechacreacion)->format('Y-m-d H:i:s');
       $event->user_id = auth()->user()->id; 
       $event->save(); 

    }

    public static function Eventedit($id, $title, $description, $startDateTime, $endDateTime, $create){

      date_default_timezone_set("America/Santiago");
      $fechacreacion = date("Y-m-d H:i:s ");

       $event = Event::where('code', $id)->first();

       if($event==null){

        $event = new Event();
        $event->code = $id;
        $event->summary = $title;
        $event->description = $description;
        $event->start = Carbon::parse($startDateTime)->format('Y-m-d H:i:s');
        $event->end = Carbon::parse($endDateTime)->format('Y-m-d H:i:s');
        $event->created =Carbon::parse($fechacreacion)->format('Y-m-d H:i:s'); 
        $event->save(); 

       }else{

       $event->code = $id;
       $event->summary = $title;
       $event->description = $description;
       $event->start = Carbon::parse($startDateTime)->format('Y-m-d H:i:s');
       $event->end = Carbon::parse($endDateTime)->format('Y-m-d H:i:s');
       $event->created =Carbon::parse($create)->format('Y-m-d H:i:s'); 
       $event->save(); 

       }
    }

    public static function Eventdelete($id){

      $event = Event::where('code', $id)->first();

      if($event !== null){
        $event->delete();
        }
      }

}
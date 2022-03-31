<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Carbon;
use App\Models\Event;

class EventTest extends TestCase
{

    /** @test */
    public function event_created(){
        session_start();
        $this->withoutExceptionHandling();
        $response = $this->post('/Eventos/savecalendar',[
            'title' => 'event1',
            'description'=> 'description event 1',
            'start_date' => Carbon::create('2022-04-26 14:00:00', 'America/Santiago')->toRfc3339String(),
            'end_date' => Carbon::create('2022-04-26 15:00:00', 'America/Santiago')->toRfc3339String()
        ]);

        

        $response->assertOk();
        
        $this->assertCount(1, Event::all());

        $event = Event::first();
        $this->assertEquals($event->summary, 'event1');
        $this->assertEquals($event->description, 'description event 1');
       
    } 

}

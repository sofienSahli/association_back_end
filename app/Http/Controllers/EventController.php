<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventUser;

class EventController extends Controller
{


    public function subscribe($user_id, $event_id)
    {
        $event = new EventUser;
        $event->inscrit = $user_id;
        $event->event = $event_id;
        $event->save();
        return $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allow_event($id)
    {
        Event::where('id', '=', $id)->update(['is_allowed' => true]);
    }

    public function index()
    {
        return Event::where("is_allowed", true)->with('proposer')->with('medias')->with('participants')->get();
    }

    public function unallocated()
    {
        $events = Event::where('is_allowed', '=', 'false')->with('medias')->with('proposer')->get();
        return $events;
    }

    public function get_by_proposer($id)
    {
        return Event::where("prposed_by", '=', $id)->with("proposer")->with("medias")->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $data = json_decode($request->getContent(), true);
        $event->title = $data['title'];
        $event->description = $data['description'];
        $event->prposed_by = $data['prposed_by'];
        $event->starting_date = $data['starting_date'];
        $event->place = $data['place'];
        $event->longitude = $data['longitude'];
        $event->latitude = $data['latitude'];
        $event->theme = $data['theme'];
        $event->duration = "undefined";
        $event->save();
        return $event;

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

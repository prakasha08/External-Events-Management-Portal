<?php

namespace App\Http\Controllers;

use App\Models\EventRequest;
use App\Models\EventsList;
use Illuminate\Http\Request;

class Admin extends Controller
{   
    public function events_index()
    {
        $events = EventsList::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.eventsList', compact('events'));
    }
    public function events_show(EventsList $event)
    {
        return view('student.eventsList_show',compact('event'));
    }

    public function eventsReq_index()
    {
        // Eager load the 'student' relationship
        $eventsReq = EventRequest::with('student')->orderBy('created_at', 'desc')->paginate(4);

        return view('admin.events_req', compact('eventsReq'));
    }
    // Evaluate the event request
    public function evaluate($id)
    {
        $eventReq = EventRequest::with('student')->findOrFail($id);
        return view('admin.events_req_evaluate', compact('eventReq'));
    }

    public function storeEvaluation(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'ira' => 'required',
            'description' => 'required_if:status,rejected'
        ]);

        $eventReq = EventRequest::findOrFail($id);
        $eventReq->status = $request->status;
        $eventReq->ira = $request->ira;
        $eventReq->save();

        // Store the data in the events table
        EventsList::create([
            'event_name' => $eventReq->event_name,
            'institute' => $eventReq->institute,
            'location' => $eventReq->location,
            'mode' => $eventReq->mode,
            'end_date' => $eventReq->end_date,
            'start_date' => $eventReq->start_date,
            'status' => $eventReq->status,
            'ira' => $eventReq->ira,
        ]);

        return redirect()->route('admin_events_req.index')->with('message', 'Event request evaluated successfully!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

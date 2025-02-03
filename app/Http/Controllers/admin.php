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

    public function events_edit(EventsList $event)
    {
        return view('admin.events_update',compact('event'));
    }

    public function events_destroy(EventsList $event)
    {
        $event->delete();
        return redirect()
        ->route('admin_events_List.index',$event->id)
        ->withMessage('Event deleted successfully!!');
    }
    public function events_update(Request $request, EventsList $event)
        {
            $request->validate([
                'event_name' => 'required|unique:events,event_name,' . $event->id,
                'institute' => 'required',
                'location' => 'required',
                'mode' => 'required',
                'end_date' => 'required|date',
                'start_date' => 'required|date',
                'status' => 'required',
                'ira' => 'required'
            ], [
                'event_name.required' => 'Event Name is required.',
                'event_name.unique' => 'Event Name must be unique.',
                'institute.required' => 'Institute is required.',
                'location.required' => 'Location is required.',
                'mode.required' => 'Mode is required.',
                'end_date.required' => 'End Date is required.',
                'end_date.date' => 'End Date must be a valid date.',
                'start_date.required' => 'Start Date is required.',
                'start_date.date' => 'Start Date must be a valid date.',
                'status.required' => 'Status is required.',
                'ira.required' => 'IRA is required.'
            ]);
        
            $event->update($request->all());
        
            return redirect()->route('admin_events_List.index')->with('message', 'Event updated successfully!');
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

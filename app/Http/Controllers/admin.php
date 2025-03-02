<?php

namespace App\Http\Controllers;

use App\Models\EventRequest;
use App\Models\EventsList;
use App\Models\faculty;
use App\Models\iraList;
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
        $eventsReq = EventRequest::with(['student', 'faculty'])->orderBy('created_at', 'desc')->paginate(4);

        return view('admin.events_req', compact('eventsReq'));
    }

    public function events_create()
    {
        return view('admin.events_create');
    }

    public function events_store(Request $request)
    {
        $request->validate([
            'eventname' => 'required',   // Corrected
            'institute' => 'required',   // Corrected
            'location' => 'required',    // Corrected
            'mode' => 'required',        // Corrected
            'enddate' => 'required',     // Corrected
            'startdate' => 'required',   // Corrected
            'status' => 'required',      // Corrected
            'ira' => 'required'          // Corrected
        ],['eventname.required' => 'Event Name Must Be requiered']);
    
        $data = $request->except('_token');
    
        // For Mass assignment
        EventsList::create($data);
    
        return redirect()
            ->route('admin_events_List.index')
            ->withMessage('Event Created successfully!!');
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


    public function ira_index()
    {
        // Eager load the 'student' relationship
        $ira = iraList::with(['student', 'faculty', 'event'])->paginate(4);
        return view('admin.ira_List', compact('ira'));
    }

    public function ira_show(iraList $event)
{
    $faculties = faculty::all();
    return view('admin.ira_assign', compact('event', 'faculties'));
}

public function ira_assign(Request $request, $id)
{
    $request->validate([
        'faculty_id' => 'required'
    ]);

    // Fetch the faculty name using the faculty_id
    $facultyName = faculty::where('id', $request->faculty_id)->value('name');

    // Update the iraList record with the faculty name
    $eventReq = iraList::findOrFail($id);
    // $eventReq->faculty->name = $facultyName;
    $eventReq->faculty_id = $request->faculty_id;
    $eventReq->save();

    return redirect()->route('admin_ira.index')->with('message', 'Faculty Assigned successfully!');
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

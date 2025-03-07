<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventList;
use App\Models\EventRequest;
use App\Models\EventsList;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\DB;
use App\Models\faculty;
use App\Models\student;

class Events_request extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function events_index()
    {
        $events = EventsList::orderBy('created_at', 'desc')->paginate(4);
        return view('student.eventsList', compact('events'));
    }
    public function events_show(EventsList $event)
    {
        return view('student.eventsList_show',compact('event'));
    }
    public function index()
    {
        $eventsReq = EventRequest::orderBy('created_at', 'desc')->paginate(4);
        return view('student.event_req', compact('eventsReq'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = student::all();
        return view('student.event_req_create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
                'student_id' => 'required',
                'event_name' => 'required|unique:events_req,event_name',
                'institute' => 'required',
                'location' => 'required',
                'mode' => 'required',
                'end_date' => 'required',
                'start_date' => 'required'
            ], [
                'event_name.required' => 'Event Name is required.',
                'event_name.unique' => 'This event has already been requested.'
            ]);
        
            // Fetch the student_id using the reg_no        
            // Add the student_id to the data
            $data = $request->except('_token');
        
            // Create the new event request
            EventRequest::create($data);
        
            return redirect()
                ->route('events_req.index')
                ->with('message', 'Event requested successfully!');
        }
    

        
        public function getStudentDetails($id)
        {
            $student = student::find($id);
            return response()->json([
                'student_id' => $student->student_id,
                'department' => $student->department,
            ]);
        }
        

    /**
     * Display the specified resource.
     */
    public function show($event_name)
    {
        // Find the event request by event_name or use appropriate identifier
        $req_details = EventRequest::where('event_name', $event_name)->firstOrFail();
        
        return view('student.event_req_show', compact('req_details'));
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

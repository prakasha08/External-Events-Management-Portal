<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventRequest;
use App\Models\EventsList;
use App\Models\faculty as AppModelsFaculty;
use App\Models\iraList;
use App\Models\ModelsFaculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class faculty extends Controller
{
    public function events_index()
    {
        $events = EventsList::orderBy('created_at', 'desc')->paginate(4);
        return view('faculty.eventsList', compact('events'));
    }

    public function events_show(EventsList $event)
    {
        return view('faculty.eventsList_show', compact('event'));
    }

    public function index()
    {
        $eventsReq = EventRequest::orderBy('created_at', 'desc')->paginate(4);
        return view('faculty.event_req', compact('eventsReq'));
    }

    public function create()
    {
        
        $faculties = AppModelsFaculty::all();
        return view('faculty.event_req_create', compact('faculties'));
    }

    public function getFacultyDetails($id)
    {
        $faculty = AppModelsFaculty::find($id);
        return response()->json([
            'faculty_id' => $faculty->faculty_id,
            'department' => $faculty->department,
        ]);
    }

    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'faculty_id' => 'required',
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
            ->route('faculty_events_req.index')
            ->with('message', 'Event requested successfully!');
    }
        

    public function show($event_name)
    {
        $req_details = EventRequest::where('event_name', $event_name)->firstOrFail();
        
        return view('faculty.event_req_show', compact('req_details'));
    }

    public function ira_index()
    {
        $eventsReq = iraList::paginate(4);
        return view('faculty.ira', compact('eventsReq'));
    }

    public function ira_evaluate()
    {
        $faculties = AppModelsFaculty::all();
        return view('faculty.ira_evaluation', compact('faculties'));
    }
}
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
        return view('faculty.event_req_create');
    }

    public function store(Request $request)
    {
                // Validate Input
                $request->validate([
                    'faculty_id' => 'required',
                    'faculty' => 'required',
                    'event_name' => 'required',
                    'institute' => 'required',
                    'location' => 'nullable',
                    'mode' => 'required',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after_or_equal:start_date',
                ]);
        
                // Store data in database
                EventRequest::create([
                    'faculty_id' => $request->faculty_id,
                    'faculty' => $request->faculty,
                    'event_name' => $request->event_name,
                    'institute' => $request->institute,
                    'location' => $request->location,
                    'mode' => $request->mode,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                ]);
        
                return redirect()->route('faculty_events_req.index')->with('success', 'Event Request Submitted Successfully!');
        }
        

    public function show($event_name)
    {
        // Find the event request by event_name or use appropriate identifier
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
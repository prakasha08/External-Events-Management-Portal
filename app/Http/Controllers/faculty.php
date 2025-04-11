<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventRequest;
use App\Models\EventsList;
use App\Models\faculty as AppModelsFaculty;
use App\Models\iraList;
use App\Models\ModelsFaculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        $user = Auth::user();
        $faculty = AppModelsFaculty::where('mail_id', $user->email)->first();
        return view('faculty.event_req_create', compact('faculty'));
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
        // $eventsReq = iraList::whereNotNull('status')->paginate(4);
        $faculty = AppModelsFaculty::where('mail_id', Auth::user()->email)->first();
        $eventsReq = iraList::where('faculty_id', $faculty->id)->whereNotNull('status')->paginate(4);
        return view('faculty.ira', compact('eventsReq'));
    }

    public function ira_evaluate()
    {
        $user = Auth::user();
        // Find the faculty with the same email as the logged-in user's email
        $faculty = AppModelsFaculty::where('mail_id', $user->email)->first();
        $iralist = iraList::where('faculty_id', $faculty->id)->whereNull('status')->get();
        $eventlist = iraList::where('faculty_id', $faculty->id)->distinct('event_id')->get();
        // Fetch only the student_id and student_name
        // dd($studentsArray);

        // $studentsArray = $students->pluck('student_id')->toArray();
    
        // Check if faculty exists
        if (!$faculty) {
            // If no faculty is found with the email, you can return an error message or redirect
            return redirect()->back()->with('error', 'No faculty found for this user.');
        }
        // dd($studentsArray);
        return view('faculty.ira_evaluation', compact('faculty','iralist','eventlist'));
    }
    public function ira_evaluate_store(Request $request)
    {
        // dd($request);
        $request->validate([
            'status' => 'required',
            'student_id' => 'required',
            'event_id' => 'required'
        ]);
        $eventReq = iraList::where('student_id', $request->student_id)
                  ->where('event_id', $request->event_id)
                  ->firstOrFail(); 
        $eventReq->status = $request->status;
        $eventReq->save();
    
        return redirect()->route('faculty_ira.index')->with('message', 'Evaluation Done for $request->student_id');
    }
    public function ira_result()
    {
        $eventsReq = iraList::whereNotNull('status')->paginate(4);
        return view('faculty.ira_results', compact('eventsReq'));
    }
}
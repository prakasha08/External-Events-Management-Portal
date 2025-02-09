<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventsList;
use App\Models\iraList;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ira extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ira_index()
    {
        $ira = iraList::orderBy('id', 'desc')->paginate(4);
        return view('student.ira_register', compact('ira'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ira_create()
    {   
        $events = EventsList::where('status', 'Approved')->where('ira', 'Yes')->get();
        return view('student.ira_register_create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ira_store(Request $request)
{
    $request->validate([
        'student_name' => 'required',
        'event_name' => 'required'
    ]);

    // Fetch the student_id using the reg_no
    $studentId = DB::table('students')->where('reg_no', $request->reg_no)->value('id');

    // Fetch the event name using the event_id
    $eventName = EventsList::where('id', $request->event_name)->value('event_name');

    // Add the student_id and event_name to the data
    $data = [
        'student_id' => $studentId,
        'student_name' => $request->student_name,
        'event_name' => $eventName
    ];

    // Create the new event request
    iraList::create($data);

    return redirect()
        ->route('ira.index')
        ->with('message', 'Registration Successful!');
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
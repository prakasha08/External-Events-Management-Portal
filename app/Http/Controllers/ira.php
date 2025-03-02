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
        $ira = iraList::with(['student', 'faculty', 'event'])->paginate(4);
        return view('student.ira_register', compact('ira'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ira_create()
    {   
        $events = EventsList::where('status', 'Approved')->where('ira', 'Yes')->get();
        $students = student::all();
        return view('student.ira_register_create', compact('events','students'));
    }

    public function ira_show(iraList $event)
    {
        return view('student.ira_register_show',compact('event'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function ira_store(Request $request)
    {
        // dd($request->all()); // Debugging step to check incoming data

        $request->validate([
            'student_id' => 'required',
            'event_name ' => 'required'
        ]);

        $data = [
            'student_id' => $request->student_id,
            'event_id' => $request->event_name
        ];

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
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\iraList;    
use Illuminate\Http\Request;

class ira extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ira_index()
    {
        // $events = iraList::orderBy('created_at', 'desc')->paginate(4);
        // return view('student.eventsList', compact('events'));
        return view('student.ira_register');
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

@extends('layout.app')
@section('content')
<div class="main-content flex-grow p-4">
            <!-- Header -->
            <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
                <img src="{{ asset('logo.png') }}" alt="BIT Logo"
                    class="h-16 ml-10 lg:ml-0 md:ml-0 s">
                <h1 class="text-xl ml-4">Prakash A</h1>
                <i class="fa-solid fa-user-graduate text-2xl ml-2"></i>
                <button id="toggleButton" class="text-3xl lg:hidden absolute right-4">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <!-- Form Section -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">{{$event->event_name}}</h2>
                    @csrf
                    <!-- First Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">   
                        <label for="event_name" class="block text-sm font-medium text-gray-700">Event Name:</label>
                            <input type="text" id="event_name" name="event_name" value="{{$event->event_name}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="institute" class="block text-sm font-medium text-gray-700">Institute:</label>
                            <input type="text" id="institute" name="institute" value="{{$event->institute}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <!-- Third Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location:</label>
                            <input type="text" id="location" name="location" value="{{$event->location}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                         <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="mode" class="block text-sm font-medium text-gray-700">Mode:</label>
                            <input type="text" id="mode" name="mode" value="{{$event->mode}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <!-- Fifth Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Ending Date:</label>
                            <input type="date" id="end_date" name="end_date" value="{{$event->end_date}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Starting Date:</label>
                            <input type="date" id="start_date" name="start_date" value="{{$event->start_date}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <!-- Sixth Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                            <input type="text" id="status" name="status" value="{{$event->status}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="ira" class="block text-sm font-medium text-gray-700">IRA:</label>
                            <input type="text" id="ira" name="ira" value="{{$event->ira}}" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>
            </div>
        </div>
        @endsection
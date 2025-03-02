@extends('layout.admin.ira_css')
@section('content')
<div class="main-content flex-grow p-4">
    <!-- Header -->
    <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
        <img src="{{ asset('logo.png') }}" alt="BIT Logo" class="h-16 ml-10 lg:ml-0 md:ml-0 s">
        <h1 class="text-xl ml-4">Prakash A</h1>
        <i class="fa-solid fa-user-graduate text-2xl ml-2"></i>
        <button id="toggleButton" class="text-3xl lg:hidden absolute right-4">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
    <!-- Form Section -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">{{ $event->event_name }}</h2>
        <form action="{{ route('admin_ira.assign', $event->id) }}" method="POST">
             @csrf
            <!-- First Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">   
                    <label for="student_name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" id="student_name" name="student_name" value="{{ $event->student_name }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">   
                    <label for="event_name" class="block text-sm font-medium text-gray-700">Event Name:</label>
                    <input type="text" id="event_name" name="event_name" value="{{ $event->event_name }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>

            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                    <input type="text" id="status" name="status" value="{{ $event->status ?? 'Pending' }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="faculty_id" class="block text-sm font-medium text-gray-700">Faculty:</label>
                    <select id="faculty_id" name="faculty_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">Select</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{$faculty->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-700 text-white px-12 py-2 rounded hover:bg-gray-500 transition-colors">
                    Assign Faculty
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
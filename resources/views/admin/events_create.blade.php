@extends('layout.admin.list')
@section('content')
 <div class="main-content flex-grow p-4">
    <!-- Header -->
    <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
        <img src="C:\Herd\sample_project\resources\views\logo.png" alt="BIT Logo"
            class="h-16 ml-10 lg:ml-0 md:ml-0 s">
        <h1 class="text-xl ml-4">Prakash A</h1>
        <i class="fa-solid fa-user-graduate text-2xl ml-2"></i>
        <button id="toggleButton" class="text-3xl lg:hidden absolute right-4">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- Form Section -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">Add New Event</h2>
        <form class="forms" action="{{ route('events.store') }}" method="POST">
            @csrf  
            <!-- First Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('eventname'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('eventname') }}</strong>
                        </span>
                    @endif
                    <label for="eventname" class="block text-sm font-medium text-gray-700">*Enter Event Name:</label>
                    <input type="text" id="eventname" name="eventname" 
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('eventname') }}">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('institute'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('institute') }}</strong>
                        </span>
                    @endif
                    <label for="institute" class="block text-sm font-medium text-gray-700">*Enter Institute:</label>
                    <input type="text" id="institute" name="institute" 
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('institute') }}">
                </div>
            </div>

            <!-- Third Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('location'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                    @endif
                    <label for="location" class="block text-sm font-medium text-gray-700">Event Location:</label>
                    <input type="text" id="location" name="location"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('location') }}">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('mode'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('mode') }}</strong>
                        </span>
                    @endif
                    <label for="mode" class="block text-sm font-medium text-gray-700">Event Mode:</label>
                    <select id="mode" name="mode"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"   >
                        <option value="">Select Mode</option>
                        <option value="Online" {{ old('mode') == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Offline" {{ old('mode') == 'Offline' ? 'selected' : '' }}>Offline</option>
                    </select>
                </div>
            </div>

            <!-- Fifth Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('enddate'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('enddate') }}</strong>
                        </span>
                    @endif
                    <label for="enddate" class="block text-sm font-medium text-gray-700">*Ending Date:</label>
                    <input type="date" id="enddate" name="enddate" 
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('enddate') }}">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('startdate'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('startdate') }}</strong>
                        </span>
                    @endif
                    <label for="startdate" class="block text-sm font-medium text-gray-700">*Starting Date:</label>
                    <input type="date" id="startdate" name="startdate" 
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('startdate') }}">
                </div>
            </div>

            <!-- Sixth Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('status'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                    <label for="status" class="block text-sm font-medium text-gray-700">*Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"   >
                        <option value="">Select</option>
                        <option value="Approved" {{ old('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('ira'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('ira') }}</strong>
                        </span>
                    @endif
                    <label for="ira" class="block text-sm font-medium text-gray-700">*IRA</label>
                    <input type="radio" id="yes" value="yes" name="ira" class="mt-5 ml-2"   
                        {{ old('ira') == 'yes' ? 'checked' : '' }}>
                    <label for="yes">Yes</label>

                    <input type="radio" id="no" value="no" name="ira" class="ml-2"   
                        {{ old('ira') == 'no' ? 'checked' : '' }}>
                    <label for="no">No</label>
                </div>
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-700 text-white px-12 py-2 rounded hover:bg-gray-500 transition-colors">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

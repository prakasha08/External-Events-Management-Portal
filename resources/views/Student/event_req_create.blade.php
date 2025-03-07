
@extends('layout.faculty.req')
@section('content')
<div class="main-content flex-grow p-4">
    <!-- Header -->
    <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
        <img src="{{ asset('logo.png') }}" alt="BIT Logo" class="h-16 ml-10 lg:ml-0 md:ml-0 s">
        <h1 class="text-xl ml-4">{{ session('name') }}</h1>
        <i class="fa-solid fa-user-graduate text-2xl ml-2"></i>
        <button id="toggleButton" class="text-3xl lg:hidden absolute right-4">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- Form Section -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">Request Event</h2>
        <form class="forms" action="{{ route('faculty_events_req.store') }}" method="POST">
            @csrf  
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('student_select'))
                    <span class="text-red-500 text-sm mt-1 block">
                        <strong>{{ $errors->first('student_select') }}</strong>
                    </span>
                    @endif
                    <label for="student_select" class="block text-sm font-medium text-gray-700">*Select Student:</label>
                    <select id="student_select" name="student_select" class="mt-1 block w-full border border-gray-300 rounded-md p-2" onchange="fetchStudentDetails(this.value)">
                    <option value="">Select</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('department'))
                    <span class="text-red-500 text-sm mt-1 block">
                        <strong>{{ $errors->first('department') }}</strong>
                    </span>
                    @endif
                    <label for="department" class="block text-sm font-medium text-gray-700">*Enter Department:</label>
                    <input type="text" id="department" name="department" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ old('department') }}">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('student_id'))
                    <span class="text-red-500 text-sm mt-1 block">
                        <strong>{{ $errors->first('student_id') }}</strong>
                    </span>
                    @endif
                    <label for="student_id" class="block text-sm font-medium text-gray-700">Student ID</label>
                    <input type="text" id="student_id" name="student_id" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ old('student_id') }}">
                </div>
            </div>
            <!-- Other form fields -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('event_name'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('event_name') }}</strong>
                        </span>
                    @endif
                    <label for="event_name" class="block text-sm font-medium text-gray-700">*Enter Event Name:</label>
                    <input type="text" id="event_name" name="event_name" 
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('event_name') }}">
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
                    @if($errors->first('end_date'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                    <label for="end_date" class="block text-sm font-medium text-gray-700">*Ending Date:</label>
                    <input type="date" id="end_date" name="end_date" 
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('end_date') }}">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('start_date'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                    @endif
                    <label for="start_date" class="block text-sm font-medium text-gray-700">*Starting Date:</label>
                    <input type="date" id="start_date" name="start_date" 
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"    
                        value="{{ old('start_date') }}">
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
        
<script>
function fetchStudentDetails(studentId) {
    if (studentId) {
        fetch(`/students/${studentId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('student_id').value = data.student_id;
                document.getElementById('department').value = data.department;
            });
    }
}

</script>
@endsection
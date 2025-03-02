@extends('layout.student.req')
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
        <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">Register for IRA</h2>
        <form class="forms" action="{{ route('ira.store') }}" method="POST">
            @csrf  
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('student_id'))
                    <span class="text-red-500 text-sm mt-1 block">
                        <strong>{{ $errors->first('student_id') }}</strong>
                    </span>
                    @endif
                    <label for="student_id" class="block text-sm font-medium text-gray-700">*Select Student:</label>
                    <select id="student_id" name="student_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2" onchange="fetchStudentDetails(this.value)">
                        <option value="">Select</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    @if($errors->first('event_id'))
                    <span class="text-red-500 text-sm mt-1 block">
                        <strong>{{ $errors->first('event_id') }}</strong>
                    </span>
                    @endif
                    <label for="event_id" class="block text-sm font-medium text-gray-700">*Select Event:</label>
                    <select id="event_id" name="event_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">Select</option>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-700 text-white px-12 py-2 rounded hover:bg-gray-500 transition-colors">
                    Register
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
                document.getElementById('student_id').value = data.id;
            });
    }
}
</script>
@endsection
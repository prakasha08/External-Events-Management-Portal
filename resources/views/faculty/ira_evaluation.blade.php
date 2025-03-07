@extends('layout.faculty.ira')
@section('content')
<div class="main-content flex-grow p-4">
    <!-- Header -->
    <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
        <img src="{{  asset('logo.png')  }}" alt="BIT Logo" class="h-16 ml-10 lg:ml-0 md:ml-0 s">
        <h1 class="text-xl ml-4">{{ session('name') }}</h1>
        <i class="fa-solid fa-user-graduate text-2xl ml-2"></i>
        <button id="toggleButton" class="text-3xl lg:hidden absolute right-4">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- Form Section -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">Evaluation</h2>
        <form class="forms" method="POST" action="{{ route('faculty_ira_evaluate.store') }}">
            @csrf
            <!-- First Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4" hidden>
                    <label for="faculty_id" class="block text-sm font-medium text-gray-700">Faculty</label>
                    <input type="text" id="faculty_id" name="faculty_id" value="{{ $faculty->id }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="student_id" class="block text-sm font-medium text-gray-700">Student</label>
                    <select id="student_id" name="student_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2" onchange="fetchStudentDetails(this.value)">
                        <option value="">Select</option>
                        @foreach($iralist as $studentId)
                            <option value="{{ $studentId->student->id }}">{{ $studentId->student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="event_name" class="block text-sm font-medium text-gray-700">Event Name:</label>
                    <select id="student_id" name="event_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2" onchange="fetchStudentDetails(this.value)">
                        <option value="">Select</option>
                        @foreach($eventlist as $event)
                            <option value="{{ $event->event->id }}">{{ $event->event->event_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Third Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="technical" class="block text-sm font-medium text-gray-700">Technical</label>
                    <select id="technical" name="technical" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="aim" class="block text-sm font-medium text-gray-700">AIM</label>
                    <select id="aim" name="aim" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <!-- Fifth Row with two inputs -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="principle" class="block text-sm font-medium text-gray-700">Principle</label>
                    <select id="principle" name="principle" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="methodology" class="block text-sm font-medium text-gray-700">Methodology</label>
                    <select id="methodology" name="methodology" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <!-- Sixth Row with two inputs -->
            <div class="flex justify-center -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">*Status</label>
                    <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">Select</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
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
                document.getElementById('eventname').value = data.event_name;
            });
    }
}
</script>
@endsection
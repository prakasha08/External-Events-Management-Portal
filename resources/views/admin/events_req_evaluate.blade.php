@extends('layout.admin.req')
@section('content')
<div class="main-content flex-grow p-4">
    <!-- Header -->
    <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
        <img src="{{ asset('logo.png') }}" alt="BIT Logo" class="h-16 ml-10 lg:ml-0 md:ml-0 s">
        <h1 class="text-xl ml-4">Admin Panel</h1>
        <i class="fa-solid fa-user-shield text-2xl ml-[7px]"></i>
        <button id="toggleButton" class="text-3xl hidden md:block absolute right-4">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-3 mb-3">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form Section -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">{{ $eventReq->event_name }}</h2>
        <form action="{{ route('events_req.storeEvaluation', $eventReq->id) }}" method="POST">
            @csrf
            <!-- Event Details -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="event_name" class="block text-sm font-medium text-gray-700">*Event Name:</label>
                    <input type="text" id="event_name" name="event_name" value="{{ $eventReq->event_name }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="institute" class="block text-sm font-medium text-gray-700">Institute:</label>
                    <input type="text" id="institute" name="institute" value="{{ $eventReq->institute }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location:</label>
                    <input type="text" id="location" name="location" value="{{ $eventReq->location }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="mode" class="block text-sm font-medium text-gray-700">Mode:</label>
                    <input type="text" id="mode" name="mode" value="{{ $eventReq->mode }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Starting Date:</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $eventReq->start_date }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Ending Date:</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $eventReq->end_date }}" readonly
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>

            <!-- Evaluation Section -->
            <div class="flex flex-wrap -mx-2">
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                    <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="Approved">Approve</option>
                        <option value="Rejected">Reject</option>
                    </select>
                </div>
                <div class="form-group w-full md:w-1/2 px-2 mb-4">
                    <label for="ira" class="block text-sm font-medium text-gray-700">IRA Required:</label>
                    <select id="ira" name="ira" class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group w-full px-2 mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md p-2" disabled></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('status').addEventListener('change', function () {
        var descriptionField = document.getElementById('description');
        if (this.value === 'rejected') {
            descriptionField.removeAttribute('disabled');
        } else {
            descriptionField.setAttribute('disabled', 'disabled');
        }
    });
</script>
@endsection
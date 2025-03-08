@extends('layout.ira_css')
@section('content')
<div class="main-content flex-grow p-4">
    <!-- Header with Toggle Button -->
    <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
        <img src="{{ asset('logo.png') }}" alt="BIT Logo" class="h-16 ml-10 full:ml-0">
        @if(session('name'))
            <h1 class="text-xl ml-4">{{ session('name') }}</h1>
        @else
            <h1 class="text-xl ml-4">Student</h1>
        @endif
        <i class="fa-solid fa-user-graduate text-2xl ml-[7px]"></i>
        <button id="toggleButton" class="text-3xl hidden md:block absolute right-4">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
    
    @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-3 mb-3">
            {{ session('message') }}
        </div>
    @endif

    <!-- Table Section -->
    <div class="table-div bg-white p-6 rounded shadow">
        <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">Ira Registration</h2>
        <div class="flex justify-end mb-4">
            <a href="{{ route('ira.create') }}"  class="bg-gray-700 text-white hover:bg-gray-500 px-4 py-2 rounded">
                <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Register
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-black">
                        <th class="border p-3 text-center">S.no</th>
                        <th class="border p-3 text-center">Name</th>
                        <th class="border p-3 text-center">Event Name</th>
                        <th class="border p-3 text-center">IRA Status</th>
                        <th class="border p-3 text-center">Faculty</th>
                    </tr>
                </thead>
                <tbody>
                @if($ira->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center py-10">
                        <img src="{{ asset('no_event.png') }}" alt="No Events" class="mx-auto">
                        <p class="mt-4 text-gray-500">No ira booked have been made yet.</p>
                        </td>
                    </tr>
                @else
                    @foreach($ira as $key => $eventReq)
                        <tr class="hover:bg-gray-100">
                            <td class="border p-3 text-center">{{ $key + 1 }}</td>
                            <td class="border p-3 text-center">{{ $eventReq->Student->name}}</td>
                            <td class="border p-3 text-center">{{ $eventReq->event->event_name}}</td>
                            <td class="border p-3 text-center">{{ $eventReq->status  ?? 'Pending'}}</td>
                            <td class="border p-3 text-center">{{ $eventReq->faculty->name  ?? 'Not Assigned'}}</td>
                            
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <!-- Pagination Section -->
            <div class="mt-4 overflow-hidden p-0">
                <nav aria-label="Page navigation" class="container max-w-full">
                    <ul class="pagination flex justify-center items-center space-x-2">
                        <!-- Previous Page Link -->
                        @if ($ira->onFirstPage())
                            <li class="disabled">
                                <span class="px-4 py-2 bg-gray-300 text-gray-600 cursor-not-allowed rounded-full">Previous</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $ira->previousPageUrl() }}" class="px-4 py-2 bg-gray-700 text-white hover:bg-gray-500 rounded-full">Previous</a>
                            </li>
                        @endif

                        <!-- Pagination Links -->
                        @foreach ($ira->links()->elements as $element)
                            @if (is_string($element))
                                <li>
                                    <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-full">{{ $element }}</span>
                                </li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $ira->currentPage())
                                        <li>
                                            <span class="px-4 py-2 bg-black text-white rounded-full">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $url }}" class="px-4 py-2 bg-gray-700 text-white hover:bg-gray-500 rounded-full">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($ira->hasMorePages())
                            <li>
                                <a href="{{ $ira->nextPageUrl() }}" class="px-4 py-2 bg-gray-700 text-white hover:bg-gray-500 rounded-full">Next</a>
                            </li>
                        @else
                            <li class="disabled">
                                <span class="px-4 py-2 bg-gray-300 text-gray-600 cursor-not-allowed rounded-full">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
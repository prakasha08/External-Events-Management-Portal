@extends('layout.admin.list')
        @section('content')
        
        <div class="main-content flex-grow p-4">
            <!-- Header with Toggle Button -->
            <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
                
                <img src="{{ asset('logo.png') }}" alt="BIT Logo"
                    class="h-16 ml-10 full:ml-0">
                <h1 class="text-xl ml-4">Prakash A</h1>
                <i class="fa-solid fa-user-graduate text-2xl ml-[7px]"></i>
                <button id="toggleButton" class="text-3xl hidden md:block absolute right-4">
    <i class="fa-solid fa-bars"></i>
</button>
            </div>
            <!-- Table Section -->
            <div class="table-div bg-white p-6 rounded shadow">
                <h2
                    class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">
                    List Of Approved & Rejected External Events</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-black">
                                <th class="border p-3 text-center">S.no</th>
                                <th class="border p-3 text-center">Event Name</th>
                                <th class="border p-3 text-center">Institute</th>
                                <th class="border p-3 text-center">Location</th>
                                <th class="border p-3 text-center">IQAC Verification</th>
                                <th class="border p-3 text-center">IRA Required</th>
                                <th class="border p-3 text-center">View</th>
                                <th class="border p-3 text-center">Edit</th>
                                <th class="border p-3 text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $key => $event)
                            <tr class="hover:bg-gray-100">
                                <td class="border p-3 text-center">{{$key+1}}</td>
                                <td class="border p-3 text-center">{{$event->event_name}} </td>
                                <td class="border p-3 text-center">{{$event->institute}} </td>
                                <td class="border p-3 text-center">{{$event->location}}</td>
                                <!-- Conditional class for status -->
                                <td class="border p-3 text-center">
                                    <span class="{{ $event->status == 'Approved' ? 'status-approved' : 'status-rejected' }}">
                                        {{$event->status}}
                                    </span>
                                </td>
                                <td class="border p-3 text-center">{{$event->ira}}</td>
                                <td class="border p-3 text-center">
                                    <a href="{{route('admin_events_List.show',$event->id)}}" class="cursor-pointer">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                                <td class="border p-3 text-center">
                                    <a href="" class="cursor-pointer">
                                        <i class="fa-solid fa-pen-to-square" style="color: #171717;"></i>
                                    </a>
                                </td>
                                <td class="border p-3 text-center">
                                    <form action="" method="POST">   
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Section -->
<div class="mt-4 overflow-hidden p-0">
    <nav aria-label="Page navigation" class="container max-w-full ">
        <ul class="pagination flex justify-center items-center space-x-2">
            <!-- Previous Page Link -->
            @if ($events->onFirstPage())
                <li class="disabled">
                    <span class="px-4 py-2 bg-gray-300 text-gray-600 cursor-not-allowed rounded-full">
                        Previous
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $events->previousPageUrl() }}" class="px-4 py-2 bg-gray-700 text-white hover:bg-gray-500 rounded-full">
                        Previous
                    </a>
                </li>
            @endif

            <!-- Pagination Links -->
            @foreach ($events->links()->elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-full">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $events->currentPage())
                            <li>
                                <span class="px-4 py-2 bg-black text-white rounded-full">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 bg-gray-700 text-white hover:bg-gray-500 rounded-full">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($events->hasMorePages())
                <li>
                    <a href="{{ $events->nextPageUrl() }}" class="px-4 py-2 bg-gray-700 text-white hover:bg-gray-500 rounded-full">
                        Next
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span class="px-4 py-2 bg-gray-300 text-gray-600 cursor-not-allowed rounded-full">
                        Next
                    </span>
                </li>
            @endif
        </ul>
    </nav>
</div>


                </div>
            </div>
        </div>
        @endsection
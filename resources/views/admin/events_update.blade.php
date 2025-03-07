
        
        @extends('layout.admin.list')
        @section('content')
        
        <div class="main-content flex-grow p-4">
            <!-- Header -->
            <div class="header flex items-center bg-gray-600 text-black p-4 rounded mb-6 relative">
                <img src="{{ asset('logo.png') }}"  alt="BIT Logo"
                    class="h-16 ml-10 lg:ml-0 md:ml-0 s">
                <h1 class="text-xl ml-4">{{ session('name') }}</h1>
                <i class="fa-solid fa-user-graduate text-2xl ml-2"></i>
                <button id="toggleButton" class="text-3xl lg:hidden absolute right-4">
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
                <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">Update Event</h2>
                <form class="forms" action="{{ route('admin_events_List.update', $event->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <!-- First Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                        @if($errors->first('event_name'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('event_name') }}</strong>
                        </span>
                    @endif    
                        <label for="event_name" class="block text-sm font-medium text-gray-700">Event Name:</label>
                            <input type="text" id="event_name" name="event_name" value="{{$event->event_name}}" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                        @if($errors->first('institute'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('institute') }}</strong>
                        </span>
                    @endif
                            <label for="institute" class="block text-sm font-medium text-gray-700">Institute:</label>
                            <input type="text" id="institute" name="institute" value="{{$event->institute}}" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
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
                            <input type="text" id="location" name="location" value="{{$event->location}}"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            @if($errors->first('mode'))
                                <span class="text-red-500 text-sm mt-1 block">
                                    <strong>{{ $errors->first('mode') }}</strong>
                                </span>
                            @endif
                            <label for="mode" class="block text-sm font-medium text-gray-700">Event Mode:</label>
                            <select id="mode" name="mode" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                <option value="Online" {{ $event->mode == 'Online' ? 'selected' : '' }}>Online</option>
                                <option value="Offline" {{ $event->mode == 'Offline' ? 'selected' : '' }}>Offline</option>
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
                            <input type="date" id="end_date" name="end_date" value="{{$event->end_date}}" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            @if($errors->first('start_date'))
                            <span class="text-red-500 text-sm mt-1 block">
                                <strong>{{ $errors->first('start_date') }}</strong>
                            </span>
                            @endif
                            <label for="start_date" class="block text-sm font-medium text-gray-700">*Starting Date:</label>
                            <input type="date" id="start_date" name="start_date" value="{{$event->start_date}}" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
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
                            <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                <option value="Approved" {{ $event->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Rejected" {{ $event->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                        @if($errors->first('ira'))
                        <span class="text-red-500 text-sm mt-1 block">
                            <strong>{{ $errors->first('ira') }}</strong>
                        </span>
                        @endif
                        <label for="ira" class="block text-sm font-medium text-gray-700">IRA:</label>
                        <select id="ira" name="ira" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                            <option value="Yes" {{ $event->ira == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $event->ira == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                        </div>                
                    </div>
                    
                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-gray-700 text-white px-12 py-2 rounded hover:bg-gray-500  ansition-colors">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
        @endsection
    
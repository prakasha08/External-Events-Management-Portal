<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for status labels */
        .status-approved {
            background-color: #5cb85c;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            text-align: center;
        }

        .status-rejected {
            background-color: #d9534f;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            text-align: center;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Main container -->
    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <div id="sidebar"
            class="sidebar bg-gray-700 text-white w-64 p-6 fixed lg:relative h-full lg:h-screen transform lg:translate-x-0 -translate-x-full transition-transform duration-300 z-20">
            <div class="flex items-center mb-6">
                <i class="fa-solid fa-handshake-angle text-3xl mr-2 text-black"></i>
                <h2 class="text-2xl text-cyan-400 font-bold">EVENTS</h2>
                <h3 class="text-lg text-black ml-1">PORTAL</h3>
            </div>
            <ul class="space-y-4">
                <li><a href="{{route('eventsList.index')}}"  
                class="block py-2 px-3 text-base  N-active bg-gray-600 rounded hover:bg-gray-500">Event Status</a></li>
                <li><a href="{{route('events_req.index')}}"
                class="block py-2 px-3 text-base  N-active bg-gray-600 rounded hover:bg-gray-500">Event Requests</a></li>
                <li><a href="{{route('ira.index')}}"
                            class="block py-2 px-3 text-base active">IRA</a></li>
                        <li><a href=""
                            class="block py-2 px-3 text-base active">IRA Registration</a></li>
                        <li><a href=""
                                class="block py-2 px-3 text-base N-active bg-gray-600 rounded hover:bg-gray-500">IRA Result</a></li>
            </ul>
        </div>
        @yield('content')
    </div>
    <script>
        // Toggle sidebar function
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('toggleButton');

        // Function to check window size
        const checkWindowSize = () => {
            if (window.innerWidth >= 768) { // Show sidebar on larger screens
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full'); // Hide sidebar on smaller screens
            }
        };

        // Initial check when the page loads
        checkWindowSize();

        // Check window size on resize
        window.addEventListener('resize', checkWindowSize);

        // Toggle the sidebar on button click
        if (toggleButton) {
            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });

            // Close sidebar when clicking outside
            document.addEventListener('click', (event) => {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggle = toggleButton.contains(event.target);
                
                // Check if the click is outside the sidebar and not on the toggle button
                if (!isClickInsideSidebar && !isClickOnToggle && !sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        }
    </script>

</body>
</html>
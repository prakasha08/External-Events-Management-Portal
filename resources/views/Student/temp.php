<div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl text-center bg-gray-600 text-white p-3 rounded mb-6 font-bold">Request Event</h2>
                <form class="forms" onsubmit="return submitForm(event);">
                    <!-- First Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="regno" class="block text-sm font-medium text-gray-700">*Enter your Reg No:</label>
                            <input type="text" id="regno" name="regno" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">*Enter Your Name:</label>
                            <input type="text" id="name" name="name" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <!-- Second Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="department" class="block text-sm font-medium text-gray-700">*Enter your
                                Department:</label>
                            <input type="text" id="department" name="department" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="eventname" class="block text-sm font-medium text-gray-700">*Event Name:</label>
                            <input type="text" id="eventname" name="eventname" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <!-- Third Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="institute" class="block text-sm font-medium text-gray-700">*Enter Event
                                Institute:</label>
                            <input type="text" id="institute" name="institute" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700">Event Location:</label>
                            <input type="text" id="location" name="location"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <!-- Fourth Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="mode" class="block text-sm font-medium text-gray-700">Event Mode:</label>
                            <select id="mode" name="mode"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                <option value="">Select Mode</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                            </select>
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="speciallab" class="block text-sm font-medium text-gray-700">*Special Lab:</label>
                            <input type="text" id="speciallab" name="speciallab" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        
                    </div>

                    <!-- Fifth Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="enddate" class="block text-sm font-medium text-gray-700">*Ending Date:</label>
                            <input type="date" id="enddate" name="enddate" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="startdate" class="block text-sm font-medium text-gray-700">*Starting Date:</label>
                            <input type="date" id="startdate" name="startdate" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <!-- Sixth Row with two inputs -->
                    <div class="flex flex-wrap -mx-2">
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="brochure" class="block text-sm font-medium text-gray-700">Event Brochure:</label>
                            <input type="file" id="brochure" name="brochure"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="form-group w-full md:w-1/2 px-2 mb-4">
                            <label for="link" class="block text-sm font-medium text-gray-700">(or) Link:</label>
                            <input type="text" id="link" name="link"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>
                    
                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-gray-700 text-white px-12 py-2 rounded hover:bg-gray-500 hover:px-14  hover:text-lg  ansition-colors">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
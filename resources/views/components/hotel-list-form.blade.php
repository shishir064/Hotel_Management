<button class="$$btn" onclick="my_modal_2.showModal()">List Your Hotel</button>
            <dialog id="my_modal_2" class="$$modal fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <div class="$$modal-box h-150 bg-white w-225 rounded-lg overflow-hidden shadow-lg relative flex">
                        <!-- Close Button -->
                        <form method="dialog" class="$$modal-backdrop">
                            {{-- <button>close</button> --}}
                            <button class="cursor-pointer absolute top-4 right-4 text-4xl text-gray-500">
                            &times;
                            </button>
                        </form>

                        <!-- Left Image -->
                        <div class="w-1/2">

                            <img src="{{ asset('images/hotelFormImg.png') }}" alt="Hotel"
                                class="w-full h-full object-cover">

                        </div>

                        <!-- Right Form -->
                        <div class="w-1/2 p-14 bg-[#f5f5f5]">

                            <h1 class="text-2xl font-bold text-center mb-3">
                                Register Your Hotel
                            </h1>

                            <form action="{{ route('list_hotel')}}" method="POST">
                                @csrf
                                <!-- Hotel Name -->
                                <div class="mb-4">

                                    <label class="block text-gray-600 font-semibold mb-2">
                                        Hotel Name
                                    </label>

                                    <input type="text" name="hotel_name" placeholder="Type here"
                                        class="w-full border border-gray-300 rounded-md px-2 py-2 outline-none focus:border-indigo-500">

                                </div>

                                <!-- Phone -->
                                <div class="mb-4">

                                    <label class="block text-gray-600 font-semibold mb-2">
                                        Phone
                                    </label>

                                    <input type="text" name="phone" placeholder="Type here"
                                        class="w-full border border-gray-300 rounded-md px-2 py-2 outline-none focus:border-indigo-500">

                                </div>

                                <!-- Address -->
                                <div class="mb-4">

                                    <label class="block text-gray-600 font-semibold mb-2">
                                        Address
                                    </label>

                                    <textarea name="hotel_address" rows="2" placeholder="Type here"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 outline-none focus:border-indigo-500"></textarea>

                                </div>

                                <!-- City -->
                                <div class="mb-4">

                                    <label class="block text-gray-600 font-semibold mb-2">
                                        City
                                    </label>

                                    <select name="city"
                                        class="w-75 border border-gray-300 rounded-md px-3 py-2 outline-none">
                                        <option>Select City</option>
                                        <option>Kathmandu</option>
                                        <option>Pokhara</option>
                                        <option>Chitwan</option>
                                        <option>Butwal</option>
                                    </select>

                                </div>

                                <!-- Button -->
                                <button type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-md text-lg font-medium">
                                    Register
                                </button>

                            </form>

                        </div>

                    </div>
            </dialog>
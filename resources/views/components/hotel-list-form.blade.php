<button
    class="btn px-4 py-2 rounded bg-blue-500 border-none text-white hover:bg-blue-600"
    onclick="my_modal_2.showModal()">
    Add New Hotel
</button>

<dialog id="my_modal_2"
    class="modal fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-md">

    <div
        class="modal-box bg-white w-11/12 max-h-[90vh] rounded-lg shadow-lg relative overflow-y-auto">

        <!-- Close Button -->
        <form method="dialog">
            <button
                class="cursor-pointer absolute top-4 right-4 text-4xl text-gray-500 hover:text-black">
                &times;
            </button>
        </form>

        <div class="">

            <h2 class="text-3xl font-bold text-center mb-8">
                Add New Hotel
            </h2>

            <form action="{{ route('store_hotel') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Hotel Name -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Hotel Name</label>
                    <input type="text" name="hotel_name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2"
                        placeholder="Enter hotel name">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Email</label>
                    <input type="email" name="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2"
                        placeholder="Enter hotel email">
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Phone</label>
                    <input type="text" name="phone"
                        class="w-full border border-gray-300 rounded-md px-3 py-2"
                        placeholder="Enter phone number">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Address</label>
                    <textarea name="address" rows="3"
                        class="w-full border border-gray-300 rounded-md px-3 py-2"
                        placeholder="Enter address"></textarea>
                </div>

                <!-- City -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">City</label>
                    <input type="text" name="city"
                        class="w-full border border-gray-300 rounded-md px-3 py-2"
                        placeholder="Enter city">
                </div>

                <!-- Country -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Country</label>
                    <input type="text" name="country"
                        class="w-full border border-gray-300 rounded-md px-3 py-2"
                        placeholder="Enter country">
                </div>

                <!-- Star Rating -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Star Rating</label>
                    <select name="star_rating"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">Select Rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>

                <!-- Cover Image -->
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Cover Image</label>
                    <input type="file" name="cover_image"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="block font-semibold mb-2">Description</label>
                    <textarea name="description" rows="5"
                        class="w-full border border-gray-300 rounded-md px-3 py-2"
                        placeholder="Write hotel description..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-md font-medium">
                        Add Hotel
                    </button>
                </div>

            </form>

        </div>

    </div>
</dialog>
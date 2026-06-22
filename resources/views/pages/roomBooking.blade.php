@extends('layouts.dashboard')

@section('content')
    <h1 class="text-4xl p-4">Book Room</h1>
    <div class="p-6  bg-white shadow rounded-lg ">
             <x-errorMessage />
            @if (session('success'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (isset($room))
            <h2 class="text-2xl font-bold mb-6">
                Book Room #{{ $room->room_no }}
            </h2>

            <x-successMessage></x-successMessage>


            <form action="{{ route('bookings.store', $room->id) }}" method="POST">
            <div class="mb-6 p-4 bg-gray-100 rounded">
                <p><strong>Room:</strong> {{ $room->room_no }}</p>
                <p><strong>Category:</strong> {{ $room->roomCategory?->category_name }}</p>
                <p name="room_price"><strong>Price per Night:</strong> Rs. {{ $room->room_price }}</p>
                <p name="discount"><strong>Discount:</strong> {{ $room->discount }}%</p>
            </div>
        @endif


            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @if (isset($room))
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                @else
                    <div>
                        <label for="categorySelect" class="block mb-2">Select Category</label>
                        <select id="categorySelect" class="w-full border rounded px-3 py-2">
                            <option value="">Select Category</option>
                            <option value="2">Single</option>
                            <option value="3">Double</option>
                            <option value="4">Twin</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2" for="">Select Room</label>
                        <select id="roomSelect" name="room_id" class="w-full border rounded px-3 py-2">
                            <option value="">Select Room</option>
                        </select>
                        @error('room_id')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2">Price Per Night</label>
                        <input type="text" id="roomPrice" name="room_price"
                            class="w-full border rounded px-3 py-2 " readonly>
                    </div>
                    <div>
                        <label class="block mb-2">Discount </label>
                        <input type="number" id="discount" name="discount"
                            class="w-full border rounded px-3 py-2 " readonly>
                    </div>
                @endif

                <div>
                    <label class="block mb-2">Guest Name</label>
                    <input type="text" name="guest_name" value="{{ old('guest_name') }}"
                        class="w-full border rounded px-3 py-2" required>

                    @error('guest_name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded px-3 py-2" required>

                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border rounded px-3 py-2" required>

                    @error('phone')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="w-full border rounded px-3 py-2" required>

                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2">Citizen ID</label>
                    <input type="number" name="citizen_id" value="{{ old('citizen_id') }}"
                        class="w-full border rounded px-3 py-2" required>

                    @error('citizen_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2">Adults</label>
                    <input type="number" name="adults" value="{{ old('adults', 1) }}" min="1"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block mb-2">Children</label>
                    <input type="number" name="children" value="{{ old('children', 0) }}" min="0"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block mb-2">Check In</label>
                    <input type="date" name="check_in" value="{{ old('check_in') }}"
                        class="w-full border rounded px-3 py-2" required>

                    @error('check_in')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2">Check Out</label>
                    <input type="date" name="check_out" value="{{ old('check_out') }}"
                        class="w-full border rounded px-3 py-2" required>

                    @error('check_out')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Confirm Booking
                </button>

                <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-6 py-2 rounded">
                    Cancel
                </a>
            </div>

        </form>

    </div>
    {{-- <script>
        document.getElementById('categorySelect').addEventListener('change', function() {

            let categoryId = this.value;

            fetch('/api/bookings/store') // or your rooms API endpoint
                .then(response => response.json())
                .then(rooms => {

                    let select = document.getElementById('roomSelect');

                    select.innerHTML = '<option value="">Select Room</option>';

                    let filteredRooms = rooms.filter(room =>
                        room.room_type == categoryId
                    );

                    filteredRooms.forEach(room => {
                        select.innerHTML += `
                    <option value="${room.id}">
                        Room ${room.room_no}
                    </option>
                `;
                    });
                })
                .catch(error => console.error(error));
        });
    </script> --}}
    {{-- <script>
        let allRooms = [];

        document.getElementById('categorySelect').addEventListener('change', function() {

            let categoryId = this.value;

            fetch('/api/store')
                .then(response => response.json())
                .then(rooms => {

                    allRooms = rooms;

                    let select = document.getElementById('roomSelect');

                    select.innerHTML = '<option value="">Select Room</option>';

                    let filteredRooms = rooms.filter(room =>
                        room.room_type == categoryId
                    );

                    filteredRooms.forEach(room => {
                        select.innerHTML += `
                        <option value="${room.id}">
                            Room ${room.room_no}
                        </option>
                    `;
                    });

                    document.getElementById('roomPrice').value = '';
                })
                .catch(error => console.error(error));
        });

        document.getElementById('roomSelect').addEventListener('change', function() {

            let roomId = this.value;

            let selectedRoom = allRooms.find(room => room.id == roomId);

            if (selectedRoom) {
                document.getElementById('roomPrice').value =
                    'Rs. ' + selectedRoom.room_price;
            } else {
                document.getElementById('roomPrice').value = '';
            }
        });

        document.getElementById('discount').add
    </script> --}}
    <script>
    let allRooms = [];

    document.getElementById('categorySelect').addEventListener('change', function() {

        let categoryId = this.value;

        fetch('/api/store')
            .then(response => response.json())
            .then(rooms => {

                allRooms = rooms;

                let select = document.getElementById('roomSelect');

                select.innerHTML = '<option value="">Select Room</option>';

                let filteredRooms = rooms.filter(room =>
                    room.room_type == categoryId
                );

                filteredRooms.forEach(room => {
                    select.innerHTML += `
                        <option value="${room.id}">
                            Room ${room.room_no}
                        </option>
                    `;
                });

                document.getElementById('roomPrice').value = '';
                document.getElementById('discount').value = '';
            })
            .catch(error => console.error(error));
    });

    document.getElementById('roomSelect').addEventListener('change', function() {

        let roomId = this.value;

        let selectedRoom = allRooms.find(room => room.id == roomId);

        if (selectedRoom) {
            document.getElementById('roomPrice').value = selectedRoom.room_price;
            document.getElementById('discount').value = selectedRoom.discount;
        } else {
            document.getElementById('roomPrice').value = '';
            document.getElementById('discount').value = '';
        }
    });
</script>
@endsection

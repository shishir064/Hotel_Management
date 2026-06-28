@extends('layouts.dashboard')

@section('title', 'Add Room Services')

@section('content')
    <form action="{{ route('store_room_services') }}" method="POST">
        <x-successMessage></x-successMessage>
        <div>
            <h1 class="text-4xl md:text-[40px] outfit">Add Room Services</h1>
            <p class="text-sm md:text-base text-gray-500/90 mt-2 max-w-174">Fill in the details carefully.</p>
        </div>


        <div class=" flex items-center gap-4">
            <h2 class="text-gray-800 mt-10">Add Room Services</h2>
            <input type="text" placeholder="Add Room Services" name="name" value="{{ old('name') }}"
            class="py-2 px-2 mt-10 rounded border border-gray-300 text-gray-500 max-w-42">

            <h2 class="text-gray-800 mt-10">Add Price</h2>
            <input type="number" placeholder="Add Price" name="price" value="{{ old('price') }}"
                class="py-2 px-2 mt-10 rounded border border-gray-300 text-gray-500 max-w-42">
        </div>
        <div class="mb-8">
            <button class="bg-primary text-white px-8 py-2 rounded mt-8 cursor-pointer">Add Room Services</button>
        </div>
    </form>

    <div>
        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">SN</th>
                    <th class="border px-4 py-2">Room Services</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($services as $service)
                    
                
                <tr>
                    <td class="border px-4 py-2">
                        {{$loop->iteration }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $service?->name }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $service?->price }}
                    </td>

                    <td class="border px-4 py-2 flex gap-4 justify-center items-center">
                         <form action="{{ route('delete_service', $service->id)  }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-3 py-1 rounded"
                                onclick="return confirm('Delete this Role?')">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{-- {{ $amenities->links() }} --}}
        </div>
    </div>
@endsection

@extends('layouts.dashboard')

@section('title', 'Add Room')

@section('content')
    <form action="{{ route('category') }}" method="POST">
        <div class="bg-green-100 rounded ">
            @if (session('success'))
                <h1 class="text-green-800 p-6">{{ session('success') }}</h1>
            @endif
        </div>
        <div>
            <h1 class="text-4xl md:text-[40px] outfit">Add Category</h1>
            <p class="text-sm md:text-base text-gray-500/90 mt-2 max-w-174">Fill in the details carefully.</p>
        </div>


        <div class="">
            <h2 class="text-gray-800 mt-10">Add Room Type</h2>
            <input type="text" placeholder="Room Type" name="category_name"
                class="py-2 px-2 rounded border border-gray-300 text-gray-500 max-w-42">
        </div>
        <div class="mb-8">
            <button class="bg-primary text-white px-8 py-2 rounded mt-8 cursor-pointer">Add Category</button>
        </div>
    </form>

    <div>
        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">SN</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    
                
                <tr>
                    <td class="border px-4 py-2">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $category->category_name }}
                    </td>

                    <td class="border px-4 py-2 flex gap-4 justify-center items-center">
                        <a href="" class="bg-blue-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>
                        <form action="{{ route('delete', $category->id)  }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-3 py-1 rounded"
                                onclick="return confirm('Delete this category?')">

                                Delete
                            </button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

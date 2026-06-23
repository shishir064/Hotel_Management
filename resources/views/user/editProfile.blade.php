@extends('layouts.dashboard')

@section('content')
<section class="bg-gray-100 min-h-screen py-10">

    <div class="w-full mx-auto px-6">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-8">
                <h1 class="text-3xl font-bold text-white">
                    Edit Profile
                </h1>

                <p class="text-indigo-100 mt-2">
                    Update your personal information.
                </p>
            </div>

            <x-successMessage></x-successMessage>
            <x-errorMessage></x-errorMessage>
            <div class="p-8">


                <form action="{{ route('profile.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                         
                        <!-- Name -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">

                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ $user->email }}"
                                
                                class="w-full bg-gray-100 border border-gray-300 rounded-xl px-4 py-3 ">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone', $user->phone) }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">

                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Citizen ID -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Citizen ID
                            </label>

                            <input
                                type="text"
                                name="citizen_id"
                                value="{{ old('citizen_id', $user->citizen_id) }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">

                            @error('citizen_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Address
                            </label>

                            <textarea
                                name="address"
                                rows="4"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">{{ old('address', $user->address) }}</textarea>

                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 mt-8">

                        <a href="{{ url()->previous() }}"
                            class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>
@endsection
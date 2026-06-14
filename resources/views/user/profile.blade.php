@extends('layouts.dashboard')

@section('content')
<section class="bg-gray-100 min-h-screen py-10">

    <div class="max-w-5xl mx-auto px-6">

        <!-- Profile Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- Cover -->
            <div class="h-48 bg-gradient-to-r from-indigo-600 to-purple-600 relative">

                <!-- Profile Image -->
                <div class="absolute left-8 -bottom-16">
                    <div
                        class="w-32 h-32 rounded-full border-4 border-white bg-white text-indigo-600 flex items-center justify-center text-5xl font-bold shadow-lg">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>

            </div>

            <!-- Content -->
            <div class="pt-20 pb-10 px-8">

                <!-- Top Info -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>
                        <h1 class="text-4xl font-bold text-gray-800">
                            {{ $user->name }}
                        </h1>

                        <p class="text-gray-500 mt-2">
                            {{ $user->email }}
                        </p>
                    </div>

                    <div class="flex gap-3">

                        <!-- Back Button -->
                        <a href="{{ url()->previous() }}"
                            class="px-5 py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                            Back
                        </a>

                        <!-- Edit Button -->
                        <a href=""
                        {{-- {{ route('user.profile.edit', $user->id) }} --}}
                            class="px-5 py-3 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition">
                            Edit Profile
                        </a>

                    </div>

                </div>

                <!-- Divider -->
                <div class="border-t my-8"></div>

                <!-- Profile Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Full Name -->
                    <div class="bg-gray-50 rounded-2xl p-6 border">
                        <h3 class="text-sm text-gray-500 mb-2">
                            Full Name
                        </h3>

                        <p class="text-xl font-semibold text-gray-800">
                            {{ $user->name }}
                        </p>
                    </div>

                    <!-- Email -->
                    <div class="bg-gray-50 rounded-2xl p-6 border">
                        <h3 class="text-sm text-gray-500 mb-2">
                            Email Address
                        </h3>

                        <p class="text-xl font-semibold text-gray-800">
                            {{ $user->email }}
                        </p>
                    </div>

                   

                </div>

            </div>

        </div>

    </div>

</section>
@endsection
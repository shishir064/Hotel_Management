@extends('layouts.userProfileSetting')

@section('content')
    <!-- Main -->
    <div class="w-full mx-auto  space-y-6">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Information -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-1">
                Profile Information
            </h2>

            <p class="text-gray-600 mb-6">
                Update your account's profile information and email address.
            </p>

            <form method="POST" action="{{ route('settings.profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block mb-2">Name</label>

                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                        class="w-full border rounded-lg px-3 py-2">

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Email</label>

                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                        class="w-full border rounded-lg px-3 py-2">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-black hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Save
                </button>
            </form>
        </div>

        <!-- Update Password -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-1">
                Update Password
            </h2>

            <p class="text-gray-600 mb-6">
                Ensure your account is using a long, random password to stay secure.
            </p>

            <form method="POST" action="{{ route('settings.password.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block mb-2">Current Password</label>

                    <input type="password" name="current_password" class="w-full border rounded-lg px-3 py-2">

                    @error('current_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2">New Password</label>

                    <input type="password" name="password" class="w-full border rounded-lg px-3 py-2">

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Confirm Password</label>

                    <input type="password" name="password_confirmation" class="w-full border rounded-lg px-3 py-2">
                </div>

                <button type="submit" class="bg-black hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Update Password
                </button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.userProfileSetting')

@section('content')
    <!-- Main -->
    <div class="flex-1 bg-white rounded-lg border border-gray-200 p-8" x-data="{ editing: false }">

        <x-errorMessage></x-errorMessage>
        <x-successMessage></x-successMessage>

        <!-- Header -->
        <div class="flex justify-between items-start mb-7">

            <div>
                <h1 class="text-2xl font-bold text-[#1a1a1a] mb-1">Personal details</h1>
                <p class="text-sm text-[#595959]">Update your info and find out how it's used.</p>
            </div>

            <div class="w-[52px] h-[52px] bg-[#4a4a4a] rounded-full flex items-center justify-center cursor-pointer relative shrink-0">
                <svg width="22" height="22" fill="none" stroke="#ccc" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                    <circle cx="12" cy="13" r="4" />
                </svg>
            </div>

        </div>

        <!-- Form wrapping all fields -->
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Fields -->
            <div>

                <!-- Name -->
                <div class="grid grid-cols-[180px_1fr] items-start py-5 border-b border-gray-200 gap-4">
                    <div class="text-[15px] font-semibold text-[#1a1a1a] pt-0.5">Name</div>
                    <div class="text-sm leading-6">

                        {{-- View mode --}}
                        <span x-show="!editing" class="text-[#595959]">
                            {{ Auth::user()->name ?? 'Let us know what to call you' }}
                        </span>

                        {{-- Edit mode --}}
                        <input
                            x-show="editing"
                            type="text"
                            name="name"
                            value="{{ Auth::user()->name }}"
                            placeholder="Let us know what to call you"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-[#1a1a1a] focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <!-- Email -->
                <div class="grid grid-cols-[180px_1fr] items-start py-5 border-b border-gray-200 gap-4">
                    <div class="text-[15px] font-semibold text-[#1a1a1a] pt-0.5">Email address</div>
                    <div>

                        {{-- View mode --}}
                        <div x-show="!editing" class="flex items-center gap-2 flex-wrap">
                            <span class="text-sm text-[#595959]">{{ Auth::user()->email }}</span>
                        </div>

                        {{-- Edit mode --}}
                        <input
                            x-show="editing"
                            type="email"
                            name="email"
                            value="{{ Auth::user()->email }}"
                            placeholder="Enter your email"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-[#1a1a1a] focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <p class="text-sm text-[#595959] leading-6 mt-2">
                            This is the email address you use to sign in. It's also where we send your booking confirmations.
                        </p>

                    </div>
                </div>

                <!-- Address -->
                <div class="grid grid-cols-[180px_1fr] items-start py-5 border-b border-gray-200 gap-4">
                    <div class="text-[15px] font-semibold text-[#1a1a1a] pt-0.5">Address</div>
                    <div>

                        {{-- View mode --}}
                        <span x-show="!editing" class="text-sm text-[#595959]">
                            {{ Auth::user()->address ?? 'Add your address' }}
                        </span>

                        {{-- Edit mode --}}
                        <input
                            x-show="editing"
                            type="text"
                            name="address"
                            value="{{ Auth::user()->address }}"
                            placeholder="Add your address"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-[#1a1a1a] focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <!-- Phone -->
                <div class="grid grid-cols-[180px_1fr] items-start py-5 border-b border-gray-200 gap-4">
                    <div class="text-[15px] font-semibold text-[#1a1a1a] pt-0.5">Phone number</div>
                    <div>

                        {{-- View mode --}}
                        <span x-show="!editing" class="text-sm text-[#595959]">
                            {{ Auth::user()->phone ?? 'Add your phone number' }}
                        </span>

                        {{-- Edit mode --}}
                        <input
                            x-show="editing"
                            type="text"
                            name="phone"
                            value="{{ Auth::user()->phone }}"
                            placeholder="Add your phone number"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-[#1a1a1a] focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <p class="text-sm text-[#595959] leading-6 mt-2">
                            Properties or attractions you book will use this number if they need to contact you.
                        </p>

                    </div>
                </div>

                <!-- Citizen ID -->
                <div class="grid grid-cols-[180px_1fr] items-start py-5 gap-4">
                    <div class="text-[15px] font-semibold text-[#1a1a1a] pt-0.5">Citizen ID</div>
                    <div>

                        {{-- View mode --}}
                        <span x-show="!editing" class="text-sm text-[#595959]">
                            {{ Auth::user()->citizen_id ?? 'Add your citizen ID' }}
                        </span>

                        {{-- Edit mode --}}
                        <input
                            x-show="editing"
                            type="text"
                            name="citizen_id"
                            value="{{ Auth::user()->citizen_id }}"
                            placeholder="Add your citizen ID"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-[#1a1a1a] focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('citizen_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end mt-8 gap-3">

                {{-- Cancel button — only in edit mode --}}
                <button
                    x-show="editing"
                    type="button"
                    @click="editing = false"
                    class="border border-gray-400 text-gray-600 px-6 py-2 rounded font-semibold hover:bg-gray-100 transition">
                    Cancel
                </button>

                {{-- Edit button — view mode --}}
                <button
                    x-show="!editing"
                    type="button"
                    @click="editing = true"
                    class="border border-blue-600 text-blue-600 px-6 py-2 rounded font-semibold hover:bg-blue-600 hover:text-white transition">
                    Edit
                </button>

                {{-- Save button — edit mode, submits the form --}}
                <button
                    x-show="editing"
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded font-semibold hover:bg-blue-700 transition">
                    Save changes
                </button>

            </div>

        </form>

    </div>
@endsection
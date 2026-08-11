```blade
@extends('layouts.dashboard')

@section('title', 'Settings')

@section('content')

<div class="w-full max-w-6xl mx-auto">

    {{-- ================================
        PAGE HEADER
    ================================= --}}
    <div class="mb-7">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                {{-- Breadcrumb --}}
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-500">

                    <span>Dashboard</span>

                    <i class="ri-arrow-right-s-line text-gray-400"></i>

                    <span class="font-medium text-gray-700">
                        Settings
                    </span>

                </div>


                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    Settings
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Manage your hotel's information and contact details.
                </p>

            </div>


            {{-- Status --}}
            <div>

                <span class="inline-flex items-center gap-2 rounded-full
                             border border-emerald-200
                             bg-emerald-50
                             px-3 py-1.5
                             text-xs font-semibold
                             text-emerald-700">

                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                    Active

                </span>

            </div>

        </div>

    </div>


    {{-- ================================
        SUCCESS MESSAGE
    ================================= --}}
    @if(session('success'))

        <div class="mb-6 flex items-center gap-3 rounded-xl
                    border border-emerald-200
                    bg-emerald-50
                    px-4 py-3">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center
                        rounded-lg bg-emerald-100">

                <i class="ri-checkbox-circle-line
                          text-lg text-emerald-600"></i>

            </div>


            <div>

                <p class="text-sm font-semibold text-emerald-800">
                    Settings updated
                </p>

                <p class="text-xs text-emerald-600">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif



    {{-- ================================
        SETTINGS CARD
    ================================= --}}
    <div class="overflow-hidden rounded-2xl
                border border-gray-200
                bg-white
                shadow-sm">


        {{-- ================================
            CARD HEADER
        ================================= --}}
        <div class="border-b border-gray-100 px-6 py-5">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center
                            rounded-xl bg-blue-50">

                    <i class="ri-building-4-line
                              text-xl text-blue-600"></i>

                </div>


                <div>

                    <h2 class="text-base font-bold text-gray-900">
                        Hotel Information
                    </h2>

                    <p class="mt-0.5 text-sm text-gray-500">
                        Update your hotel's basic information.
                    </p>

                </div>

            </div>

        </div>



        {{-- ================================
            FORM
        ================================= --}}
        <form action="{{ route('web.settings.update') }}"
              method="POST">

            @csrf

            @method('PUT')

            <input type="number" name="userId" hidden value="{{ $userId }}">


            <div class="space-y-7 p-6 sm:p-7">


                {{-- ================================
                    HOTEL NAME
                ================================= --}}
                <div>

                    <label for="hotel_name"
                           class="mb-2 block text-sm font-semibold text-gray-700">

                        Hotel Name

                    </label>


                    <div class="relative">

                        <i class="ri-hotel-line
                                  absolute left-4 top-1/2
                                  -translate-y-1/2
                                  text-lg text-gray-400"></i>


                        <input
                            id="hotel_name"
                            type="text"
                            name="hotel_name"
                            value="{{ old('hotel_name', $settings?->hotel_name) }}"
                            placeholder="Enter your hotel name"

                            class="w-full rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   py-3.5 pl-11 pr-4
                                   text-sm text-gray-900
                                   placeholder:text-gray-400
                                   outline-none
                                   transition

                                   focus:border-blue-500
                                   focus:bg-white
                                   focus:ring-4
                                   focus:ring-blue-500/10"
                        >

                    </div>


                    @error('hotel_name')

                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- ================================
                    CONTACT INFORMATION
                ================================= --}}
                <div>

                    <div class="mb-4">

                        <h3 class="text-sm font-bold text-gray-900">
                            Contact Information
                        </h3>

                        <p class="mt-1 text-xs text-gray-500">
                            Information guests can use to contact your hotel.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                        {{-- PHONE --}}
                        <div>

                            <label for="phone"
                                   class="mb-2 block text-sm font-semibold text-gray-700">

                                Phone Number

                            </label>


                            <div class="relative">

                                <i class="ri-phone-line
                                          absolute left-4 top-1/2
                                          -translate-y-1/2
                                          text-lg text-gray-400"></i>


                                <input
                                    id="phone"
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone', $settings?->phone) }}"
                                    placeholder="+977 98XXXXXXXX"

                                    class="w-full rounded-xl
                                           border border-gray-200
                                           bg-gray-50
                                           py-3.5 pl-11 pr-4
                                           text-sm text-gray-900
                                           placeholder:text-gray-400
                                           outline-none
                                           transition

                                           focus:border-blue-500
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-blue-500/10"
                                >

                            </div>


                            @error('phone')

                                <p class="mt-1.5 text-xs text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- EMAIL --}}
                        <div>

                            <label for="email"
                                   class="mb-2 block text-sm font-semibold text-gray-700">

                                Email Address

                            </label>


                            <div class="relative">

                                <i class="ri-mail-line
                                          absolute left-4 top-1/2
                                          -translate-y-1/2
                                          text-lg text-gray-400"></i>


                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $settings?->email) }}"
                                    placeholder="hotel@example.com"

                                    class="w-full rounded-xl
                                           border border-gray-200
                                           bg-gray-50
                                           py-3.5 pl-11 pr-4
                                           text-sm text-gray-900
                                           placeholder:text-gray-400
                                           outline-none
                                           transition

                                           focus:border-blue-500
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-blue-500/10"
                                >

                            </div>


                            @error('email')

                                <p class="mt-1.5 text-xs text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>



                {{-- DIVIDER --}}
                <div class="border-t border-gray-100"></div>



                {{-- ================================
                    ADDRESS
                ================================= --}}
                <div>

                    <label for="address"
                           class="mb-2 block text-sm font-semibold text-gray-700">

                        Hotel Address

                    </label>


                    <div class="relative">

                        <i class="ri-map-pin-line
                                  absolute left-4 top-4
                                  text-lg text-gray-400"></i>


                        <textarea
                            id="address"
                            name="address"
                            rows="4"
                            placeholder="Enter your hotel's complete address"

                            class="w-full resize-none
                                   rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   py-3.5 pl-11 pr-4
                                   text-sm text-gray-900
                                   placeholder:text-gray-400
                                   outline-none
                                   transition

                                   focus:border-blue-500
                                   focus:bg-white
                                   focus:ring-4
                                   focus:ring-blue-500/10"
                        >{{ old('address', $settings?->address) }}</textarea>

                    </div>


                    @error('address')

                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>



            {{-- ================================
                CARD FOOTER
            ================================= --}}
            <div class="flex flex-col gap-4
                        border-t border-gray-100
                        bg-gray-50/70
                        px-6 py-4

                        sm:flex-row
                        sm:items-center
                        sm:justify-between">


                {{-- Information --}}
                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 shrink-0
                                items-center justify-center
                                rounded-lg bg-amber-50">

                        <i class="ri-information-line
                                  text-lg text-amber-600"></i>

                    </div>


                    <div>

                        <p class="text-xs font-semibold text-gray-700">
                            Keep your information updated
                        </p>

                        <p class="text-xs text-gray-500">
                            Guests may see this information.
                        </p>

                    </div>

                </div>



                {{-- Save --}}
                <button
                    type="submit"

                    class="inline-flex items-center
                           justify-center gap-2
                           rounded-xl
                           bg-gray-900
                           px-6 py-3
                           text-sm font-semibold
                           text-white
                           shadow-sm
                           transition

                           hover:bg-gray-800

                           focus:outline-none
                           focus:ring-4
                           focus:ring-gray-900/10">

                    <i class="ri-save-3-line text-lg"></i>

                    Save Changes

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
```

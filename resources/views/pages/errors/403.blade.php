@extends('layouts.app')

@section('title', '403 - Error')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-red-600">403</h1>
            <h2 class="text-2xl font-semibold mt-4">Access Denied</h2>
            <p class="text-gray-600 mt-2">
                Sorry, you don't have permission to access this page.
            </p>

            <a href="{{ url()->previous() }}"
                class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Go Back
            </a>
        </div>
    </div>
@endsection

@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-5">
        User Details
    </h2>

    <div class="overflow-x-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <h3 class="text-2xl">
                Mrs/Mr
                <span class="font-bold">
                    {{ $users->first()?->name ?? 'No Users Found' }}
                </span>
            </h3>

            <form action="{{ url()->current() }}" method="GET" class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search user"
                    class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button
                    type="submit"
                    class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">
                    Search
                </button>
            </form>

        </div>

        <!-- Table -->
        <table class="w-full border border-gray-300">

            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">SN</th>
                    <th class="border p-3">Username</th>
                    <th class="border p-3">Email</th>
                    <th class="border p-3">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($users as $user)
                    <tr class="hover:bg-gray-100">

                        <td class="border p-3">
                            {{ $users->firstItem() + $loop->index }}
                        </td>

                        <td class="border p-3">
                            {{ $user->name }}
                        </td>

                        <td class="border p-3">
                            {{ $user->email }}
                        </td>

                        <td class="border p-3 text-center">
                            <a href="{{ route('user.profile', $user->id) }}"
                               class="text-indigo-600 hover:underline">
                                View
                            </a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-4 text-center text-gray-500">
                            No users found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->withQueryString()->links() }}
        </div>

    </div>

</div>
@endsection
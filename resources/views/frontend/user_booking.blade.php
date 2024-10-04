@extends('layouts.frontend')

@section('content')
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Dashboard Title -->
                <h1 class="text-xl font-bold">Dashboard</h1>

                <!-- Navbar Links -->
                <ul class="flex items-center space-x-6">
                    <li>
                        <a href="/" class="hover:underline">Home</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <!-- Dashboard Link for Authenticated Users -->
                            <li>
                                <a href="{{ url('user/dashboard') }}" class="hover:text-gray-300">Dashboard</a>
                            </li>
                            <!-- Logout Button -->
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <!-- Login and Register Links for Guests -->
                            <li>
                                <a href="{{ route('login') }}" class="hover:text-gray-300">Log in</a>
                            </li>

                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="hover:text-gray-300">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-lg p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ url('user/dashboard') }}"
                            class="block py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-md  @if (request()->routeIs('trainee.dashboard')) bg-blue-500 @endif">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.bookings') }}"
                            class="block py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-md @if (request()->routeIs('dashboard.bookings')) bg-blue-500 @endif">My
                            Bookings</a>
                    </li>
                </ul>
            </aside>

            <!-- Dashboard Content -->
            <main class="flex-1 p-6">
                <h2 class="text-2xl font-semibold mb-6">My Bookings</h2>

                <!-- Bookings Table -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Booking List</h3>

                    <table class="min-w-full bg-white border">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b">Booking ID</th>
                                <th class="py-2 px-4 border-b">Class Name</th>
                                <th class="py-2 px-4 border-b">Date</th>
                                <th class="py-2 px-4 border-b">Time</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr class="text-gray-700">
                                    <td class="py-2 px-4 border-b">{{ $booking->book_id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $booking->classTime->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $booking->classTime->date }}</td>
                                    <td class="py-2 px-4 border-b">{{ $booking->classTime->start_time }} -
                                        {{ $booking->classTime->end_time }}</td>

                                    <td class="py-2 px-4 border-b">
                                        <span
                                            class="px-2 py-1 rounded-full text-sm {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    {{-- <td class="py-2 px-4 border-b">
                                        <a href="{{ route('bookings.show', $booking->id) }}"
                                            class="text-blue-500 hover:underline">View</a>
                                        <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST"
                                            class="inline-block ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Cancel</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-blue-600 text-white p-4">
            <div class="container mx-auto text-center">
                <p>© 2024 Your Dashboard. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
@endsection

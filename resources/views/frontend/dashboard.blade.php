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
                        <a href="#" class="hover:underline">Home</a>
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
                    <li><a href="#" class="block py-2 px-4 bg-blue-500 text-white rounded-md">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-md">Analytics</a>
                    </li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-md">Projects</a>
                    </li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-md">Tasks</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-md">Messages</a>
                    </li>
                </ul>
            </aside>

            <!-- Dashboard Content -->
            <main class="flex-1 p-6">
                <h2 class="text-2xl font-semibold mb-6">Welcome, User!</h2>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-medium text-gray-700">Total Projects</h3>
                        <p class="text-4xl font-bold text-blue-600">12</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-medium text-gray-700">Tasks Completed</h3>
                        <p class="text-4xl font-bold text-blue-600">37</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-medium text-gray-700">Messages</h3>
                        <p class="text-4xl font-bold text-blue-600">5</p>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-medium text-gray-700 mb-4">Recent Activity</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Completed Task: "Design new dashboard UI"</span>
                            <span class="text-gray-500">2 hours ago</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Added new project: "Website Redesign"</span>
                            <span class="text-gray-500">Yesterday</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Sent a message to: "Team A"</span>
                            <span class="text-gray-500">3 days ago</span>
                        </li>
                    </ul>
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym & Fitness</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-roboto bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow-lg py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-500"><a href="/">Gym & Fitness</a></h1>
            <nav class="space-x-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/user/dashboard') }}" class="text-gray-700 hover:text-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-red-500">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Checkout Section -->
    <section class="py-16 bg-gray-50" id="checkout">
        <div class="container mx-auto text-center">
            <!-- Error message -->
            @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <h3 class="text-3xl font-bold mb-12 text-gray-800">Checkout</h3>

            <form action="{{ route('checkout.process', $session->id) }}" method="POST"
                class="max-w-xl mx-auto bg-white p-10 rounded-lg shadow-lg">
                @csrf

                <!-- Hidden fields for IDs -->
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="trainer_id" value="{{ $session->trainer->id }}">
                <input type="hidden" name="class_time_id" value="{{ $session->id }}">

                <!-- Name & Email (same row) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">

                        @error('name')
                            <span class="text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        @error('email')
                            <span class="text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="mb-6">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    @error('phone_number')
                        <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date & Time (Start and End Time in same row) -->
                <!-- Date -->
                <div class="mb-6">
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Class
                        Date</label>
                    <input type="date" id="date" name="date" value="{{ $session->date }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                        readonly>
                    @error('date')
                        <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Start Time -->
                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                        <input type="time" id="start_time" name="start_time" value="{{ $session->start_time }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            readonly>
                        @error('start_time')
                            <span class="text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- End Time -->
                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                        <input type="time" id="end_time" name="end_time" value="{{ $session->end_time }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            readonly>
                        @error('end_time')
                            <span class="text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-red-500 text-white font-bold py-3 px-4 rounded-full hover:bg-red-600 transition duration-300">
                        Complete Booking
                    </button>
                </div>
            </form>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Gym & Fitness. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>

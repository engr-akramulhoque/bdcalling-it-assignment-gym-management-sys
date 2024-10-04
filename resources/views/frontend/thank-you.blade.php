<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You - Gym & Fitness</title>
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

    <!-- Thank You Section -->
    <section class="py-16 bg-gray-50" id="thank-you">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-12 text-gray-800">Thank You for Your Booking!</h3>

            <div class="max-w-xl mx-auto bg-white p-10 rounded-lg shadow-lg">
                <p class="text-lg text-gray-700 mb-6">
                    Your booking for the class with <span class="font-bold">{{ $session->trainer->name }}</span> has
                    been
                    successfully confirmed.
                </p>
                <p class="text-lg text-gray-700 mb-6">
                    Here are your booking details:
                </p>

                <!-- Booking Details -->
                <div class="mb-6">
                    <p class="text-gray-800"><strong>Date:</strong> {{ $session->date }}</p>
                    <p class="text-gray-800"><strong>Start Time:</strong> {{ $session->start_time }}</p>
                    <p class="text-gray-800"><strong>End Time:</strong> {{ $session->end_time }}</p>
                    <p class="text-gray-800"><strong>Trainer:</strong>
                        {{ $session->trainer->firstname . ' ' . $session->trainer->lastname }}</p>
                </div>

                <p class="text-gray-700 mb-6">
                    We look forward to seeing you soon. If you have any questions, feel free to <a href="/contact"
                        class="text-red-500 hover:underline">contact us</a>.
                </p>

                <!-- Back to Dashboard Button -->
                <a href="{{ url('/user/dashboard') }}"
                    class="w-full inline-block bg-red-500 text-white font-bold py-3 px-6 rounded-full hover:bg-red-600 transition duration-300">
                    Go to Dashboard
                </a>
            </div>
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

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
            <h1 class="text-2xl font-bold text-red-500">Gym & Fitness</h1>
            <nav class="space-x-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-red-500">Dashboard</a>
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

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-screen" style="background-image: url('https://example.com/gym-bg.jpg');">
        <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
            <div class="text-center text-white">
                <h2 class="text-4xl font-bold mb-4">Transform Your Body Today</h2>
                <p class="text-lg mb-6">Join us at Gym & Fitness for world-class equipment and expert trainers.</p>
                <a href="#classes" class="bg-red-500 hover:bg-red-600 text-white py-3 px-8 rounded-lg transition">View
                    Classes</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-gray-100" id="about">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-8">Why Choose Us?</h3>
            <p class="max-w-2xl mx-auto text-lg mb-6">At Gym & Fitness, we provide state-of-the-art facilities, top-tier
                personal training, and a welcoming community for fitness enthusiasts at all levels.</p>
        </div>
    </section>

    <!-- Classes Section -->
    <section class="py-16 bg-white" id="classes">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-8">Our Available Classes</h3>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($classes as $item)
                    <div
                        class="bg-white border border-gray-200 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <h4 class="text-2xl font-semibold text-gray-800 mb-3">Yoga</h4>
                        <p class="text-gray-600 mb-4">Trainer:
                            {{ $item->trainer?->user?->firstname . ' ' . $item->trainer?->user?->lastname }}</p>

                        <div class="mb-4">
                            <span class="block text-sm text-gray-500">Date</span>
                            <span class="text-lg font-medium text-gray-900">{{ $item->date }}</span>
                        </div>

                        <div class="flex justify-center items-center mb-4">
                            <div class="mx-3 px-2">
                                <span class="block text-sm text-gray-500">Start Time</span>
                                <span class="text-lg font-medium text-gray-900">{{ $item->start_time }}</span>
                            </div>
                            <div>
                                <span class="block text-sm text-gray-500">End Time</span>
                                <span class="text-lg font-medium text-gray-900">{{ $item->end_time }}</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <span class="block text-sm text-gray-500">Capacity</span>
                            <span class="text-lg font-medium text-gray-900">{{ $item->capacity }}</span>
                        </div>

                        <a href="{{ route('session.checkout', $item->id) }}"
                            class="inline-block bg-red-500 text-white py-2 px-4 rounded-full text-center hover:bg-red-600 transition-colors duration-300 ease-in-out">Book
                            Now</a>
                    </div>
                @empty
                    <div class="grid md:grid-cols-1">
                        <span class="mx-auto text-red-500">No classes found. Please check back later.</span>
                    </div>
                @endforelse
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

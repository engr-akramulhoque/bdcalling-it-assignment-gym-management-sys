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

    {{-- <link href="{{ asset('build/assets/app-CKTn2O9R.css') }}" rel="stylesheet">
    <script src="{{ asset('build/assets/app-DLzyN2yJ.js') }}"></script> --}}
</head>

<body class="font-roboto bg-gray-100 text-gray-800">
    @yield('content')
</body>

</html>

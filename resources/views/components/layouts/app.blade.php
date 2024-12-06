<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alytics test task</title>

    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-100">

<nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-center gap-5">
        <a href="{{ route('url.store') }}"
           class="px-4 py-2 text-white rounded-lg
               {{ Route::currentRouteName() == 'url.store' ? 'bg-indigo-800' : 'bg-indigo-600 hover:bg-indigo-500' }}">
            Create URL
        </a>
        <a href="{{ route('url.index') }}"
           class="px-4 py-2 text-white rounded-lg
               {{ Route::currentRouteName() == 'url.index' ? 'bg-indigo-800' : 'bg-indigo-600 hover:bg-indigo-500' }}">
            View URLs
        </a>
        <a href="{{ route('checks') }}"
           class="px-4 py-2 text-white rounded-lg
               {{ Route::currentRouteName() == 'checks' ? 'bg-indigo-800' : 'bg-indigo-600 hover:bg-indigo-500' }}">
            View Checks
        </a>
    </div>
</nav>

<main class="p-6">
    {{ $slot }}
</main>

@vite(['resources/js/app.js'])
@livewireScripts
</body>
</html>

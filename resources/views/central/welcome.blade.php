<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Multi-Tenant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:pt-0">
            <h1 class="text-4xl font-bold text-gray-900">Laravel Multi-Tenant</h1>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="ml-4 text-lg leading-7 font-semibold">Welkom bij het Multi-Tenant Platform</div>
                </div>

                <div class="ml-4">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Dit is de centrale applicatie voor het beheren van tenants.
                    </div>
                </div>

                <div class="mt-6 flex">
                    @auth('central')
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mr-3">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Registreren</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

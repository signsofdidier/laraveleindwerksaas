<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
                            @if(request()->is('dashboard*') || request()->is('tenants*'))
                                Central
                            @else
                                {{ tenant()->name ?? 'App' }}
                            @endif
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        @if(request()->is('dashboard*') || request()->is('tenants*'))
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition">
                                Dashboard
                            </a>
                            <a href="{{ route('tenants.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">
                                Tenants
                            </a>
                        @else
                            <a href="{{ route('tenant.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition">
                                Dashboard
                            </a>
                        @endif
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="ml-3 relative">
                        <div class="flex items-center">
                                <span class="text-gray-800 mr-3">
                                    @if(request()->is('dashboard*') || request()->is('tenants*'))
                                        {{ Auth::guard('central')->user()->name ?? '' }}
                                    @else
                                        {{ Auth::user()->name ?? '' }}
                                    @endif
                                </span>

                            <form method="POST" action="{{ request()->is('dashboard*') || request()->is('tenants*') ? route('logout') : route('tenant.logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                                    Uitloggen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>

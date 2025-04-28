<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">Nieuwe Tenant Aanmaken</h2>

                    <form method="POST" action="{{ route('tenants.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="domain" class="block text-sm font-medium text-gray-700">Domein</label>
                            <input type="text" name="domain" id="domain" value="{{ old('domain') }}" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <p class="text-sm text-gray-500 mt-1">Bijvoorbeeld: tenant1.localhost</p>
                            @error('domain')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Aanmaken</button>
                            <a href="{{ route('tenants.index') }}" class="ml-3 text-sm text-blue-600 hover:underline">Annuleren</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
                    <p>Welkom bij het centrale dashboard!</p>

                    <div class="mt-6">
                        <a href="{{ route('tenants.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tenants beheren</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

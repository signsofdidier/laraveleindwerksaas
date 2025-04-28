<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Tenants</h2>
                        <a href="{{ route('tenants.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Nieuwe Tenant</a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Domeinen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aangemaakt op</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tenants as $tenant)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $tenant->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $tenant->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($tenant->domains as $domain)
                                        <a href="http://{{ $domain->domain }}" target="_blank" class="text-blue-600 hover:underline">{{ $domain->domain }}</a>
                                        @if (!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $tenant->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

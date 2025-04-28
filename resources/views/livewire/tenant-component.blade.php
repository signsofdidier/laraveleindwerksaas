<?php

use App\Models\Tenant;
use Livewire\Volt\Component;

new class extends Component {
    public $tenantName;
    public $tenants = [];

    public function mount()
    {
        $this->tenants = Tenant::all();
    }
    public function save(){
        $this->validate([
           'tenantName' => 'required|string|max:255',
        ]);
        $tenantName = $this->tenantName;
        $tenant1 = Tenant::create(['id' => $tenantName]);
        $tenant1 -> domains()->create(['domain' => "$tenantName.saas.test"]);
        $this->tenantName = '';
        $this->tenants = Tenant::all();
    }
};

?>

<div class="grid place-items-center text-white">
    <div>
        <h1 class="text-4xl font-black text-white">Create new tenant</h1>
        <p class="mt-4 text-2xl">Tenant name</p>
        <div class="max-w-sm space-y-3 mt-4 text-white">
        </div>

        <div class="sm:inline-flex sm:items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full">
            <input type="text" wire:model="tenantName" id="inline-input-label-with-helper-text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
            <p class="text-sm text-white-500 dark:text-white" id="hs-inline-input-helper-text">Enter tenant name</p>
        </div>
        <button type="button" wire:click="save" class="mt-4 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Create tenant
        </button>
    </div>

    <div class="">
        @foreach($tenants as $tenant)
            <div class="mt-4 text-white">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-white">
                        {{ $tenant->id }} - {{ $tenant->name }}
                    </h3>
                    <p class="mt-1 text-sm text-white">
                        <a href="http://{{ $tenant->domains->first()->domain }}:8000/login" class="text-blue-400 hover:text-blue-300">{{ $tenant->domains->first()->domain }}</a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>


<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('central.tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('central.tenants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:255', 'unique:domains,domain'],
        ]);

        $tenant = Tenant::create([
            'id' => Str::slug($request->name),
            'name' => $request->name,
            'data' => [],
        ]);

        $tenant->domains()->create([
            'domain' => $request->domain,
        ]);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant is succesvol aangemaakt.');
    }
}

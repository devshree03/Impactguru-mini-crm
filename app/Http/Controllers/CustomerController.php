<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CustomerController extends Controller
{
    public function index()
    {
        $query = Customer::query();

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $customers = $query->paginate(10)->withQueryString();

        return view('customers.index', compact('customers', 'search'));
    }

    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return view('customers.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:customers',
            'phone'         => 'required|string|max:15',
            'address'       => 'required|string',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name','email','phone','address']);

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        Customer::create($data);

        return redirect()->route('customers.index')->with('success', 'Customer created!');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:customers,email,' . $customer->id,
            'phone'         => 'required|string|max:15',
            'address'       => 'required|string',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name','email','phone','address']);

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated!');
    }

    public function destroy(Customer $customer)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted!');
    }

    // ---------- CSV export ----------
    public function exportCsv(): StreamedResponse
    {
        // Optional: restrict to admin
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        $fileName = 'customers_' . now()->format('Ymd_His') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');

            // Header row
            fputcsv($handle, ['ID', 'Name', 'Email', 'Phone', 'Address', 'Created At']);

            Customer::chunk(200, function ($customers) use ($handle) {
                foreach ($customers as $customer) {
                    fputcsv($handle, [
                        $customer->id,
                        $customer->name,
                        $customer->email,
                        $customer->phone,
                        $customer->address,
                        $customer->created_at,
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
    // ========== API methods ==========

public function apiIndex()
{
    $customers = \App\Models\Customer::paginate(10);

    return response()->json($customers);
}

public function apiShow(\App\Models\Customer $customer)
{
    return response()->json($customer);
}

public function apiStore(Request $request)
{
    if (!auth()->user()->isAdmin()) {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
    ]);

    $customer = \App\Models\Customer::create($validated);

    return response()->json($customer, 201);
}

public function apiUpdate(Request $request, \App\Models\Customer $customer)
{
    if (!auth()->user()->isAdmin()) {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email,' . $customer->id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
    ]);

    $customer->update($validated);

    return response()->json($customer);
}

public function apiDestroy(\App\Models\Customer $customer)
{
    if (!auth()->user()->isAdmin()) {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $customer->delete();

    return response()->json(['message' => 'Deleted']);
}

}

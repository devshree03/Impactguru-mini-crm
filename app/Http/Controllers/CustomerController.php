<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

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
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:customers',
    'phone' => 'required|string|max:15',
    'address' => 'required|string',
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
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
}

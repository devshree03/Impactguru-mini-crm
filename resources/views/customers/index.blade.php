<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customers
        </h2>
    </x-slot>

    <div class="container">
        <h1>Customers</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(auth()->user()->isAdmin())
            <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>
        @endif

        <form method="GET" action="{{ route('customers.index') }}" class="mb-3">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control"
                           placeholder="Search by name or email"
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">Search</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary w-100">Clear</a>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer) }}" class="btn btn-sm btn-info">View</a>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="{{ route('customers.destroy', $customer) }}" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No customers found.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $customers->links() }}
    </div>
</x-app-layout>

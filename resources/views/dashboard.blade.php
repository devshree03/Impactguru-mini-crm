<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="container">
        <h1>Dashboard</h1>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Total Customers</h5>
                    <p class="h4">{{ $totalCustomers }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Total Orders</h5>
                    <p class="h4">{{ $totalOrders }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Total Revenue</h5>
                    <p class="h4">{{ number_format($totalRevenue, 2) }}</p>
                </div>
            </div>
        </div>

        <h3>Recent Customers</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
            </thead>
            <tbody>
            @forelse($recentCustomers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr><td colspan="3">No customers yet.</td></tr>
            @endforelse
            </tbody>
        </table>

        @if($isAdmin)
            <hr>
            <h3>Admin Tools</h3>
            <p>As Admin you can manage users, customers and orders.</p>
            {{-- You can add extra admin-only cards or links here --}}
        @else
            <hr>
            <h3>Staff View</h3>
            <p>You can manage customers and orders but not users or settings.</p>
        @endif
    </div>
</x-app-layout>

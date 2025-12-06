<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orders
        </h2>
    </x-slot>

    <div class="container">
        <h1>Orders</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(auth()->user()->isAdmin())
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3 me-2">Add Order</a>
    <a href="{{ route('orders.export.csv') }}" class="btn btn-outline-secondary mb-3">
        Export Orders CSV
    </a>
@endif


        <table class="table">
            <thead>
    <tr>
        <th>ID</th>
        <th>Order #</th>
        <th>Customer</th>
        <th>Amount</th>
        <th>Order Date</th>
        <th>Status</th>
    </tr>
</thead>

            <tbody>
                @forelse($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->customer->name ?? 'N/A' }}</td>
        <td>{{ $order->amount }}</td>
        <td>{{ $order->order_date }}</td>
        <td>{{ $order->status }}</td>
    </tr>
@empty
    <tr><td colspan="6">No orders found.</td></tr>
@endforelse

            </tbody>
        </table>
{{ $orders->links() }}

    </div>
</x-app-layout>

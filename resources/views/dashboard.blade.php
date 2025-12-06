<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Top stats cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-5 bg-white/90 backdrop-blur shadow-sm rounded-xl border border-slate-100">

                    <div class="text-xs font-semibold text-slate-500 uppercase tracking-wide">
        Total Customers
    </div>
                    <div class="mt-3 text-3xl font-bold text-slate-900">{{ $totalCustomers }}</div>
</div>
                <div class="p-5 bg-white/90 backdrop-blur shadow-sm rounded-xl border border-slate-100">

                    <div class="text-sm text-slate-500 uppercase tracking-wide text-xs">Total Orders</div>
                    <div class="mt-3 text-3xl font-bold text-slate-900">{{ $totalOrders }}</div>
                </div>
                <div class="p-5 bg-white/90 backdrop-blur shadow-sm rounded-xl border border-slate-100">

                    <div class="text-sm text-slate-500 uppercase tracking-wide text-xs">Total Revenue</div>
                    <div class="mt-3 text-3xl font-bold text-slate-900">
                        ₹ {{ number_format($totalRevenue, 2) }}
                    </div>
                </div>
            </div>

            <!-- Recent customers + role info -->
            <div class="bg-white overflow-hidden shadow rounded p-6">
                <h3 class="text-lg font-semibold mb-4">Recent Customers</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-slate-800">


                        <thead>
    <tr class="border-b bg-slate-50">
        <th class="py-2 px-3 text-left font-semibold text-slate-700">Name</th>
        <th class="py-2 px-3 text-left font-semibold text-slate-700">Email</th>
        <th class="py-2 px-3 text-left font-semibold text-slate-700">Joined</th>
    </tr>
</thead>

                        <tbody>
                            @forelse($recentCustomers as $customer)
                                <tr class="border-b last:border-0">
                                    <td class="py-2">{{ $customer->name }}</td>
                                    <td class="py-2">{{ $customer->email }}</td>
                                    <td class="py-2">{{ $customer->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-4 text-center text-gray-500">
                                        No customers yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 border-t pt-4">
                    @if($isAdmin)
                        <h3 class="text-md font-semibold mb-1">Admin Tools</h3>
                        <p class="text-sm text-gray-600">
                            As Admin you can manage users, customers and orders.
                        </p>
                    @else
                        <h3 class="text-md font-semibold mb-1">Staff View</h3>
                        <p class="text-sm text-gray-600">
                            You can manage customers and orders but not users or settings.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

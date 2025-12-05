<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customer Details
        </h2>
    </x-slot>
@if($customer->profile_image)
    <img src="{{ asset('storage/'.$customer->profile_image) }}" width="120" class="mb-3">
@endif


    <div class="container">
        <h1>{{ $customer->name }}</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary mb-3">Back</a>

        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
        <p><strong>Address:</strong> {{ $customer->address }}</p>
    </div>
</x-app-layout>

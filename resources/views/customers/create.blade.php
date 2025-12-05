<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customers
        </h2>
    </x-slot>

    <!-- your page content here -->

<div class="container">
    <h1>Add Customer</h1>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary mb-3">Back</a>
    
    <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
<div class="mb-3">
    <label class="form-label">Profile Image</label>
    <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror">
    @error('profile_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

        <button type="submit" class="btn btn-primary">Save Customer</button>
    </form>
</div>
</x-app-layout>

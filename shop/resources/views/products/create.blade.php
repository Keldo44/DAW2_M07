<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-4">Create New Product</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 border border-green-600 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 p-2 border rounded w-full">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                <textarea name="description" id="description" class="mt-1 p-2 border rounded w-full">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Stock -->
            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Product Stock</label>
                <input type="text" name="stock" id="stock" value="{{ old('stock') }}" class="mt-1 p-2 border rounded w-full">
                @error('stock')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                <input type="text" name="price" id="price" value="{{ old('price') }}" class="mt-1 p-2 border rounded w-full">
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Product Category</label>
                <select name="category" id="category" class="mt-1 p-2 border rounded w-full">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('products.index') }}" class="mr-4 text-blue-500 hover:text-blue-700">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Create Product</button>
            </div>
        </form>
    </div>
@endsection

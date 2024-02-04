<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold">{{ $product->name }}</h2>
            <p class="mb-4"><strong>Description:</strong> {{ $product->description }}</p>
            <p class="mb-4"><strong>Price:</strong> ${{ $product->price }}</p>

            <div class="flex items-center space-x-4">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
                </form>
            </div>

            <a href="{{ route('products.index') }}" class="block mt-4 text-blue-500">Back to Products</a>
        </div>
    </div>
@endsection

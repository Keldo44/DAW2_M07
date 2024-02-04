<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a New Product</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
            
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" required>
            
            <button type="submit" class="btn btn-success">Create Product</button>
        </form>
        
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>
@endsection

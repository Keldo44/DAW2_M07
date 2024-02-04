<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Product List</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
    </div>
@endsection

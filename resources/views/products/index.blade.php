@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-4">Product List</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 border border-green-600 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Description</th>
                    <th class="py-2 px-4">Stock</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Category</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="py-2 px-4">{{ $product->id }}</td>
                        <td class="py-2 px-4">{{ $product->name }}</td>
                        <td class="py-2 px-4">{{ $product->description }}</td>
                        <td class="py-2 px-4">{{ $product->stock }}</td>
                        <td class="py-2 px-4">${{ $product->price }}</td>
                        <td class="py-2 px-4">
                            @if($product->category)
                                @php
                                    $categoryId = $product->category;
                                    $category = \App\Models\Category::find($categoryId);
                                @endphp
                                {{ $category ? $category->name : 'Category Not Found' }}
                            @else
                                No Category Available
                            @endif
                        </td>
                        <td class="py-2 px-4">
                        <a class="btn btn-sm btn-primary" href="{{ route('products.show',$product->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('products.create') }}" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700">Create Product</a>
    </div>
@endsection

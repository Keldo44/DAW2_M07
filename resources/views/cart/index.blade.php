@extends('layouts.appClient')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">Your Cart</h1>

    @if(count($cartItems) > 0)
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Product</th>
                    <th class="py-2 px-4 border-b">Quantity</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                @php
                    $product = \App\Models\Product::find($cartItem->product);
                @endphp
                <tr>
                    <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $cartItem->amount }}</td>
                    <td class="py-2 px-4 border-b">${{ $product->price * $cartItem->amount }}</td>
                    <td class="py-2 px-4 border-b">
                        <form action="{{ route('carts.destroy', $cartItem->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">Your cart is empty.</p>
    @endif
@endsection

@extends('layouts.appClient')

@section('content')
    <div class="container mx-auto mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-4">Product List</h2>

        @if(session('success'))
            <div id="productAddedPopup" class="alert alert-success" style="display: none; position: fixed; top: 0; width: 100%; text-align: center;">
                {{ session('success') }}
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    $('#productAddedPopup').fadeIn('fast', function () {
                        // Auto-hide the popup after 3 seconds (adjust the delay as needed)
                        setTimeout(function () {
                            $('#productAddedPopup').fadeOut('fast');
                        }, 3000);
                    });
                });
            </script>
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
                    <th class="py-2 px-4"></th>
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
                        <td>
                            @if($product->stock > 0)
                            <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="post">
                                    @csrf
                                    <button type="submit">Add to Cart</button>
                                </form>
                            @else
                            <button type="button" class="disabled-button" disabled onclick="alert('Out of Stock')">Add to Cart</button>
                            <span style="color: red;">Out of Stock</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Assuming you have a variable named 'productAdded' containing the response
            var productAdded = {!! json_encode(session('success')) !!};

            if (productAdded) {
                $('#productAddedModal').modal('show');

                // Auto-close the modal after 3 seconds (adjust the delay as needed)
                setTimeout(function () {
                    $('#productAddedModal').modal('hide');
                }, 3000);
            }
        });
    </script>

@endsection

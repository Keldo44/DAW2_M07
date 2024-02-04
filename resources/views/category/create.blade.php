<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-4">Create New Category</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 border border-green-600 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <!-- Category Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 p-2 border rounded w-full">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Category Description</label>
                <textarea name="description" id="description" class="mt-1 p-2 border rounded w-full">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('categories.index') }}" class="mr-4 text-blue-500 hover:text-blue-700">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Create Category</button>
            </div>
        </form>
    </div>
@endsection

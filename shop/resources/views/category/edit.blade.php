<!-- resources/views/categories/update.blade.php -->
@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Category
@endsection

@section('content')
    <section class="content container mx-auto mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-4">{{ __('Update') }} Category</h2>

        @includeif('partials.errors')

        <div class="card card-default p-4 bg-white rounded-lg shadow-md">
            <div class="card-header bg-gray-800 text-white">
                <span class="card-title">{{ __('Update') }} Category</span>
            </div>
            <div class="card-body mt-4">
                <form method="POST" action="{{ route('categories.update', $category->id) }}" role="form" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf

                    @include('category.form')

                </form>
            </div>
        </div>
    </section>
@endsection

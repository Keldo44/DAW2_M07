@extends('layouts.app')

@section('template_title')
    {{ $category->name ?? __('Show Category') }}
@endsection

@section('content')
    <section class="content container-fluid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-white rounded-lg shadow-md">
                    <div class="card-header">
                        <div class="flex justify-between items-center">
                            <span class="card-title">{{ __('Show Category') }}</span>
                            <a class="btn btn-primary" href="{{ route('categories.index') }}">{{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $category->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $category->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content')
    <section class="content container-fluid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card bg-white rounded-lg shadow-md">
                    <div class="card-header bg-gray-800 text-white">
                        <span class="card-title">{{ __('Create') }} User</span>
                    </div>
                    <div class="card-body mt-4">
                        <form method="POST" action="{{ route('user.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                @include('user.form')
                            </div>

                            <div class="flex items-center justify-end mt-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


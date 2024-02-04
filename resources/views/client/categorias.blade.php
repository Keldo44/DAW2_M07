@extends('layouts.appClient')

@section('template_title')
    Category
@endsection

@section('content')
    <div class="container-fluid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-white rounded-lg shadow-md">
                    <div class="card-header">
                        <div class="flex justify-between items-center">
                            <span id="card_title">
                                {{ __('Category') }}
                            </span>

                            
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

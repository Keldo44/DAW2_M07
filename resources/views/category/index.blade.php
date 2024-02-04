@extends('layouts.app')

@section('template_title')
    Category
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="flex justify-between items-center bg-gray-200 p-4">
                <span class="text-2xl font-semibold" id="card_title">
                    {{ __('Category') }}
                </span>

                <div class="float-right">
                    <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        {{ __('Create New') }}
                    </a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="bg-green-200 p-4">
                    <p class="text-green-800">{{ $message }}</p>
                </div>
            @endif

            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b">{{ __('No') }}</th>
                                <th class="py-2 px-4 border-b">{{ __('Name') }}</th>
                                <th class="py-2 px-4 border-b">{{ __('Description') }}</th>
                                <th class="py-2 px-4 border-b">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ ++$i }}</td>
                                    <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $category->description }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                            <a href="{{ route('categories.show', $category->id) }}" style="background-color: #3490dc; color: #ffffff;" class="py-1 px-2 rounded mr-1  items-center">
                                                <i class="fas fa-fw fa-eye mr-1"></i> {{ __('Show') }}
                                            </a>
                                            <a href="{{ route('categories.edit', $category->id) }}" style="background-color: #38a169; color: #ffffff;" class="py-1 px-2 rounded mr-1  items-center">
                                                <i class="fas fa-fw fa-edit mr-1"></i> {{ __('Edit') }}
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #e3342f; color: #ffffff;" class="py-1 px-2 rounded  items-center">
                                                <i class="fas fa-fw fa-trash mr-1"></i> {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

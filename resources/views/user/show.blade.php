@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('Show User') }}
@endsection

@section('content')
    <section class="content container mx-auto max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ __('Show User') }}</h2>
                    </div>

                    <div class="form-group">
                        <strong class="block text-gray-700">Nick:</strong>
                        {{ $user->nick }}
                    </div>
                    <div class="form-group">
                        <strong class="block text-gray-700">Name:</strong>
                        {{ $user->name }}
                    </div>
                    <div class="form-group">
                        <strong class="block text-gray-700">Surnames:</strong>
                        {{ $user->surnames }}
                    </div>
                    <div class="form-group">
                        <strong class="block text-gray-700">Dni:</strong>
                        {{ $user->DNI }}
                    </div>
                    <div class="form-group">
                        <strong class="block text-gray-700">Email:</strong>
                        {{ $user->email }}
                    </div>
                    <div class="form-group">
                        <strong class="block text-gray-700">Birth:</strong>
                        {{ $user->birth }}
                    </div>

                    <div class="mt-4">
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('user.index') }}">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

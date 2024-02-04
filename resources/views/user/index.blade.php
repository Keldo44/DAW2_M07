@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <span class="text-2xl font-semibold">
                {{ __('User') }}
            </span>
            <div class="ml-4">
                <a href="{{ route('user.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Create New') }}
                </a>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card">
            <div class="card-header bg-dark text-white">
                <div class="flex justify-between items-center">
                    <span id="card_title">
                        {{ __('User') }}
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full bg-white border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nick</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Surnames</th>
                                <th class="px-4 py-2">Dni</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Birth</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2">{{ ++$i }}</td>
                                    <td class="px-4 py-2">{{ $user->nick }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->surnames }}</td>
                                    <td class="px-4 py-2">{{ $user->DNI }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">{{ $user->birth }}</td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                            <a href="{{ route('user.show',$user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                                <i class="fa fa-eye"></i> {{ __('Show') }}
                                            </a>
                                            <a href="{{ route('user.edit',$user->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                                <i class="fa fa-edit"></i> {{ __('Edit') }}
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fa fa-trash"></i> {{ __('Delete') }}
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

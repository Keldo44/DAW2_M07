<!-- resources/views/pokemons/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Agregar Pokémon</h1>

    <form action="{{ route('pokemons.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label for="tipo">Tipo:</label>
        <select name="tipo" required>
            <option value="agua">Agua</option>
            <option value="fuego">Fuego</option>
            <option value="planta">Planta</option>
            <!-- Agrega más tipos según sea necesario -->
        </select>
        
        <label for="tamaño">Tamaño:</label>
        <select name="tamaño">
            <option value="">---</option>
            <option value="grande">Grande</option>
            <option value="mediano">Mediano</option>
            <option value="pequeño">Pequeño</option>
        </select>
        
        <label for="peso">Peso:</label>
        <input type="number" name="peso" step="0.01">
        
        <button type="submit">Guardar Pokémon</button>
    </form>
@endsection

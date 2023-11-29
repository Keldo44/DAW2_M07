<?php
namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        return view('pokemons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'tamaño' => 'nullable|in:grande,mediano,pequeño',
            'peso' => 'nullable|numeric',
        ], [
            'tamaño.in' => 'El tamaño seleccionado no es válido.',
        ]);
        

        Pokemon::create($request->all());

        return redirect()->route('pokemons.index');
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', compact('pokemon'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'tamaño' => 'required|in:grande,mediano,pequeño',
            'peso' => 'required|numeric',
        ]);

        $pokemon->update($request->all());

        return redirect()->route('pokemons.index');
    }

    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();

        return redirect()->route('pokemons.index');
    }
}


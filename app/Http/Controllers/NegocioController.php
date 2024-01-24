<?php
namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $negocios = Negocio::all();

        return view('components.negocio')->with('negocios', $negocios);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $negocio = Negocio::create($validatedData);
        $negocio->save();

        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $negocio = Negocio::find($id);

        if (!$negocio) {
            return view('negocios.show', ['message' => 'The negocio was not found']);
        }
        return view('negocios.show', ['message' => "The negocio was found", 'negocio' => $negocio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $negocio = Negocio::find($id);
        $negocio->update($request->only(
            'nombre',
            'direccion',
            'telefono',
            'status'));
        return view('negocios.show',
        ['message' => "The negocio was updated successfully",
        'negocio' => $negocio]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $negocio = Negocio::find($id);
        if ($negocio) {
            $negocio->delete();
            return view('negocios.index', ['message' => "The negocio was deleted successfully"]);
        } else {
            return view('negocios.index', ['message' => "The negocio was not found"]);
        }
    }
}
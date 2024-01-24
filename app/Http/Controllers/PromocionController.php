<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Models\Negocio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Else_;


class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promociones= Promocion::all();
        return view('promocion.index',compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí podrías cargar los negocios disponibles para mostrar en el formulario
        $negocios = Negocio::all();
        return view('promocion.create',compact('negocios'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'titulo' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
            'status' => 'required',
            'negocio_id' => 'required|exists:negocios,id'
        ]);

        $promocion = new Promocion();
        $promocion->descripcion = $request->get('descripcion');
        $promocion->titulo = $request->get('titulo');
        $promocion->status = $request->get('status');
        $promocion->negocio_id = $request->get('negocio_id');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $promocion->imagen = $imageName;
        }
        $promocion->save();

        return view('home');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

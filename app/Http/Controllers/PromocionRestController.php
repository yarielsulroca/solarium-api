<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class PromocionRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $promociones = Promocion::orderBy('created_at', 'desc')->get();
        return response()->json([
            'promociones' => $promociones,
            'mensage' => "List of Promociones orderBy created"],
            Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'descripcion' => 'nullable',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación para asegurar que sea una imagen
        'titulo' => 'nullable',
        'status' => 'required',
        'negocio_id' => 'required|exists:negocios,id'
    ]);

    $imagenPath = $request->file('imagen')->store('public/images'); // Guardar la imagen en el almacenamiento

    $promocion = new Promocion([
        'descripcion' => $validatedData['descripcion'],
        'titulo' =>      $validatedData['titulo'],
        'status' =>      $validatedData['status'],
        'negocio_id' =>  $validatedData['negocio_id'],
        'imagen' => $imagenPath  // Guardar la ruta de la imagen en la base de datos
    ]);

    $promocion->save();

    return response()->json([
        'mensage' => 'the Promotion was saved',
        'promocion' => $promocion],
        Response::HTTP_OK);
}


    /**
     * Display the specified resource.
     */
    public function show($model)
{
    $promocion = Promocion::find($model);
    if (!$promocion) {
        return response()->json([
        'message' => 'Promotion can be found'],
        Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    $promocion->imagen = asset('storage/' . $promocion->imagen); // Ruta de la imagen
    return response()->json([
        'mensage'=>"There is the Promotion",
        'promocion' => $promocion],
        Response::HTTP_OK);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $model)
{
    $promocion = Promocion::find($model);
    if (!$promocion) {
        return response()->json(['message' => 'Promotion can be found'],
        Response::HTTP_BAD_REQUEST);
    }
    $promocion->descripcion = $request->input('descripcion');
    $promocion->imagen =      $request->file('imagen')->store('public/promociones');
    $promocion->titulo =      $request->input('titulo');
    $promocion->status =      $request->input('status');
    $promocion->negocio_id =  $request->input('negocio_id');
    $promocion->save();
    return response()->json([
        'message' => 'Promoción has be updated successfully',
        'promocion' => $promocion],
        200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($model)
{
    $promocion = Promocion::find($model);
    if (!$promocion) {
        return response()->json([
            'message' => 'Promotion can not be found'],
            Response::HTTP_BAD_REQUEST);
    }
    // Eliminar la imagen almacenada
    Storage::delete('public/promociones/' . $promocion->imagen);
    $promocion->delete();
    return response()->json([
        'message' => 'Promoción can be deleted successfully',
        'promocion' =>$promocion],
        Response::HTTP_OK);
}


}

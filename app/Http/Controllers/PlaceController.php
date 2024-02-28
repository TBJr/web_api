<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use Exception;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::paginate(10);
        return response()->json(['data'=>$places],200);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request)
    {
        try {

            $data = $request->validated();
            $place = Place::create($data);
            return response()->json(['data'=>$place,'message'=>'Lugar insertado con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error'=>$e->getMessage()],500);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        try {

            $place = Place::findOrFail(1);  
            return response()->json(['data'=>$place],200);

        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, Place $place)
    {
        try {

            $place = Place::findOrFail(1);  
            $data = $request->validated();
            $place->update($data);

            return response()->json(['data'=>$place,'message'=>'El Lugar ha sido actualizado con exito'],200);

        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        try {
            $place = Place::findOrFail(1);  
            $place->delete();
            return response()->json(['message'=>'El Lugar ha sido eliminado con exito'],200);
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}

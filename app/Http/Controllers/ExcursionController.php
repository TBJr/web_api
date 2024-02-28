<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Http\Requests\StoreExcursionRequest;
use App\Http\Requests\UpdateExcursionRequest;
use Exception;

class ExcursionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $excursions = Excursion::paginate(20);
        return response()->json(['data'=>$excursions],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExcursionRequest $request)
    {

        try {
            
            $data = $request->validated();
            $excursion = Excursion::create($data);
            return response()->json(['data'=>$excursion,'message'=>'Excursion insertada con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Excursion $excursion)
    {
       try {
            
            $excursion = Excursion::findOrfail(1);
            return response()->json(['data'=>$excursion,'message'=>'Excursion insertada con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExcursionRequest $request, Excursion $excursion)
    {

        try {
            
            $excursion = Excursion::findOrFail(1);
            $data = $request->validated();
            $excursion->update($data);
            return response()->json(['data'=>$excursion,'message'=>'Excursion actualizada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Excursion $excursion)
    {
        try {

            $excursion = Excursion::findOrFail(1);
            $excursion->delete(); 
            return response()->json(['message'=>'Excursion eliminada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }
}

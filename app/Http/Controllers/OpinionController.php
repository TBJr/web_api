<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Http\Requests\StoreOpinionRequest;
use App\Http\Requests\UpdateOpinionRequest;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opinions = Opinion::paginate(20);
        return response()->json(['data'=>$opinions],200);
    } 

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOpinionRequest $request)
    {
        try {
            
            $data = $request->validated();
            $opinion = Opinion::create($data);
            return response()->json(['data'=>$opinion,'message'=>'Opinión insertada con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Opinion $opinion)
    {
        try {
            
            $opinion = Opinion::findOrfail(1);
            return response()->json(['data'=>$opinion,'message'=>'Opinión insertada con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOpinionRequest $request, Opinion $opinion)
    {
        try {
            
            $opinion = Opinion::findOrFail(1);
            $data = $request->validated();
            $opinion->update($data);
            return response()->json(['data'=>$opinion,'message'=>'Opinión actualizada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opinion $opinion)
    {
        try {

            $opinion = Opinion::findOrFail(1);
            $opinion->delete(); 
            return response()->json(['message'=>'Opinión eliminada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }
}

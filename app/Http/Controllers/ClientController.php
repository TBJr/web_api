<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Exception;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::paginate(15);
        return response()->json(['data'=>$clients],200); 
    }
 

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        //
        try {

            $data=$request->validated();
            $client = Client::create($data);
            return response()->json(['data'=>$client, 'message'=>'Cliente insertado con exito'],201); 

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],500); 
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        try {

            $client = Client::findOrFail(1);
            return response()->json(['data'=>$client],200); 

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
        }
        
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {

        try {

            $client = Client::findOrFail(1);
            $data = $request->validated();
            $client->update($data);
            return response()->json(['data'=>$client, 'message'=>'Cliente actualizado con exito'],200); 
            
        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 

        }


       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {

            $client = Client::findOrFail(1);
            $client->delete();
            return response()->json(['message'=>'Cliente eliminado con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
        

    
    }
}

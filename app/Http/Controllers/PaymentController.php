<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::paginate(20);
        return response()->json(['data'=>$ $payments],200);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        try {
            
            $data = $request->validated();
            $payment = Payment::create($data);
            return response()->json(['data'=>$payment,'message'=>'Pago insertado con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        try {
            
            $payment = Payment::findOrfail(1);
            return response()->json(['data'=>$payment,'message'=>'Pago insertado con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        try {
            
            $payment = Payment::findOrFail(1);
            $data = $request->validated();
            $payment->update($data);
            return response()->json(['data'=>$payment,'message'=>'Pago actualizado con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        try {

            $payment = Payment::findOrFail(1);
            $payment->delete(); 
            return response()->json(['message'=>'Pago eliminado con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }
}

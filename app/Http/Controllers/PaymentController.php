<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Stripe\StripeClient;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Invoice;
use Nette\Utils\Floats;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{

            $validatedData = Validator::make($request->all(), [
                'number_card' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
                'invoice_id' => 'required',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $invoice = Invoice::findOrFail($data['invoice_id']);
            if(!$invoice)return response()->json(['error' => "Invoice not found"], 400);
            $stripe = new StripeClient(
                config('services.stripe.secrect_key')
            );
            $paymentMethods =   $stripe->paymentMethods->create([
                'type' => 'card',
                'card' => [
                'number' => $data['number_card'],
                'exp_month' => $data['exp_month'],
                'exp_year' => $data['exp_year'],
                'cvc' => $data['cvc'],
                ],
            ]);

            $stripe->paymentIntents->create([
                'amount' => (int)($invoice->amount * 100),
                'currency' => 'usd',
                'payment_method' => $paymentMethods->id,
                'confirm'=>true
            ]);
          Invoice::where('id',$data['invoice_id'])->update(['status' => 4 ]);
          return response()->json(['message' => 'Payment successfully'], 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

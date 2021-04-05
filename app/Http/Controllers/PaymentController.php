<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use App\Payment;

use App\Services\PaypalService;

class PaymentController extends Controller
{
    private $paypalService;

    function __construct(PaypalService $paypalService){
        $this->paypalService = $paypalService;
    }

    public function payWithPayPal($productID) {
        $payment = new Payment;
        $payment->user_id = Auth::user()->id;
        $payment->product_id = $productID;
        $payment->save();

        $response = $this->paypalService->createOrder($payment->id);
        
        if($response->statusCode !== 201) {
            abort(500);
        }

        $payment = Payment::find($payment->id);
        $payment->paypal_orderid = $response->result->id;
        $payment->save();

        // REDIRECCION
        foreach ($response->result->links as $link) {
            if($link->rel == 'approve') {
                return redirect($link->href);
            }
        }
    }

    public function success($payment_id){

        $payment = Payment::find($payment_id);
        $response = $this->paypalService->captureOrder($payment->paypal_orderid);

        if ($response->result->status == 'COMPLETED') {
            $payment->is_paid = 1;
            $payment->save();
          
            return redirect()->route('product',['id'=> $payment->product_id])->withMessage('Pago realizado');
        }

        return redirect()->route('product',['id'=> $payment->product_id])->withError('El pago no pudo ser procesado');
    }

    public function cancel()
    {
       dd('Cancelado');
    }
}

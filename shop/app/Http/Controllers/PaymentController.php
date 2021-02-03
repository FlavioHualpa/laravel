<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cart;
use App\Models\Purchase;
use MercadoPago\SDK;
use MercadoPago\Payer;
use MercadoPago\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $idTypes = Http::get('https://api.mercadopago.com/v1/identification_types?public_key='.config('app.mp_public_key'));

        // $pmtTypes = Http::get('https://api.mercadopago.com/v1/payment_methods?public_key='.config('app.mp_public_key'));

        $cart = auth()->user()->cart;
        $totalAmount = $cart->total();
        $description = auth()->user()->fullName . ' - '
            . date('d/m/Y')
            . ' - Id de compra '
            . $this->orderId($cart);

        return view('checkout', [
            'user' => auth()->user(),
            'idTypes' => $idTypes->json(),
            'totalAmount' => $totalAmount,
            'description' => $description,
        ]);
    }

    public function store(Request $request)
    {
        $payment = $this->processPayment($request);
        return $this->showResult($payment, auth()->user()->cart);
    }

    private function orderId(Cart $cart)
    {
        return hexdec(substr(md5($cart->products), 22));
    }

    private function processPayment(Request $request)
    {
        SDK::setAccessToken(config('app.mp_access_token'));

        $payment = new Payment();
        $payment->transaction_amount = (float)$request->transactionAmount;
        $payment->description = $request->description;
        $payment->payment_method_id = $request->paymentMethodId;
        
        if ($request->paymentMethod == 'pm_card')
        {
            $payment->token = $request->token;
            $payment->statement_descriptor = "EASYSHOP ARGENTINA";
            $payment->installments = (int)$request->installments;
            $payment->issuer_id = (int)$request->issuer;
        }

        $payer = new Payer();
        $payer->first_name = $request->first_name;
        $payer->last_name = $request->last_name;
        $payer->email = $request->email;
        $payer->identification = [
            "type" => $request->docType,
            "number" => $request->docNumber
        ];
        $payment->payer = $payer;

        $payment->save();
        dd($payment);
        return $payment;
    }

    private function showResult(Payment $payment, Cart $cart)
    {
        switch ($payment->status)
        {
            case 'approved':
            case 'in_process':
            case 'pending':

                $purchase = Purchase::create([
                    'user_id' => auth()->id(),
                    'number' => $this->orderId($cart),
                    'payment_info' => $payment->toArray(),
                ]);

                $purchase->products()->attach(
                    $cart->products->mapWithKeys(function($prod) {
                        return [
                            $prod->id => [
                                'quantity' => $prod->detail->quantity,
                                'price' => $prod->price,
                            ]
                        ];
                    })->toArray()
                );

                $cart->products()->detach();
            
                return redirect()
                    ->route('payment.approved')
                    ->with('purchase_id', $purchase->id);
                return 'Aprobado!!';

            default:

                return redirect()
                    ->route('payment.approved')
                    ->with('purchase_id', $purchase->id);
                return 'Falló :(';
        }
    }

    public function approved()
    {
        if (!session()->has('purchase_id'))
            return redirect()->route('home');
        
        $purchase = Purchase::findOrFail(session('purchase_id'));
        $purchase->user->sendPurchaseDetails($purchase);

        return view('approved', [
            'purchase' => $purchase
        ]);
    }

    public function rejected()
    {
        if (!session()->has('purchase_id'))
            return redirect()->route('home');
        
        $purchase = Purchase::findOrFail(session('purchase_id'));
        return view('rejected', [
            'purchase' => $purchase
        ]);
    }
}

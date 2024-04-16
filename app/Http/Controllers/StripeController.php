<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('welcome');
    }

    public function makePayment(Request $r)
    {
        $product = Product::findOrFail($r->id);

        try {
            Stripe::setApiKey(config('cashier.secret'));
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('success'),
            ]);

            return redirect()->away($session->url);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success()
    {
        return "Payment Done Thanks!..";
    }
}

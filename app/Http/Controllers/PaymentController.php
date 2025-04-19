<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Show the payment form
    public function showPaymentForm()
    {
        $cart = session()->get('cart');
        $total = 0;

        if ($cart) {
            foreach ($cart as $id => $details) {
                $total += floatval($details['prix']) * $details['quantity'];
            }
        }

        return view('payment', compact('total'));
    }

    // Handle the payment process
    public function processPayment(Request $request)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Calculate the total amount from the cart
        $cart = session()->get('cart');
        $total = 0;

        if ($cart) {
            foreach ($cart as $id => $details) {
                $total += floatval($details['prix']) * $details['quantity'];
            }
        }

        // Create a Stripe Checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mad',
                        'product_data' => [
                            'name' => 'Total Cart Payment',
                        ],
                        'unit_amount' => $total * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success'), // Redirect after successful payment
            'cancel_url' => route('payment.cancel'), // Redirect if payment is canceled
        ]);

        // Redirect to Stripe Checkout
        return redirect()->away($session->url);
    }

    // Handle successful payment
    public function paymentSuccess()
    {
        // Clear the cart after successful payment
        session()->forget('cart');

        return view('payment_success');
    }

    // Handle canceled payment
    public function paymentCancel()
    {
        return view('payment_cancel');
    }
}
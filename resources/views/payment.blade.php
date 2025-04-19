@extends('Master')

@section('title', 'Payment')

@section('content')
<style>
    /* Variables for consistent colors */
    :root {
        --primary-color: #1abc9c;
        --secondary-color: #2c3e50;
        --accent-color: #e74c3c;
        --text-color: #34495e;
        --light-bg: #ecf0f1;
        --card-bg: #ffffff;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .payment-container {
        padding: 40px 0;
        background: transparent;
        min-height: 100vh;
    }

    .payment-card {
        background: var(--card-bg);
        border-radius: 15px;
        box-shadow: var(--shadow);
        padding: 30px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .product-list {
        margin-bottom: 30px;
    }

    .product-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding: 15px;
        background: var(--light-bg);
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-item:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow);
    }

    .product-image {
        width: 100px;
        height: 100px;
        border-radius: 10px;
        object-fit: cover;
        margin-right: 20px;
    }

    .product-details {
        flex: 1;
    }

    .product-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 5px;
    }

    .product-price {
        font-size: 1rem;
        color: var(--accent-color);
        font-weight: 500;
    }

    .total-amount {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        text-align: right;
        margin-top: 20px;
    }

    .pay-button {
        width: 100%;
        padding: 15px;
        font-size: 1.2rem;
        font-weight: 600;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .pay-button:hover {
        background: #16a085;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="payment-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="payment-card">
                    <h1 class="text-center mb-4" style="color: #1abc9c">Payment</h1>

                    <!-- Product List -->
                    <div class="product-list">
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <div class="product-item">
                                    <img src="{{ $details['image'] }}" alt="{{ $details['nom'] }}" class="product-image">
                                    <div class="product-details">
                                        <div class="product-name">{{ $details['nom'] }}</div>
                                        <div class="product-price">{{ $details['prix'] }} MAD x {{ $details['quantity'] }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">Your cart is empty.</p>
                        @endif
                    </div>

                    <!-- Total Amount -->
                    <div class="total-amount">
                        Total: {{ $total }} MAD
                    </div>

                    <!-- Payment Form -->
                    <form action="{{ route('payment.process') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="pay-button">Proceed to Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
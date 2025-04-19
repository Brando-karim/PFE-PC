@extends('Master')

@section('title', 'Payment Canceled')

@section('content')
<style>
    .cancel-container {
        padding: 40px 0;
        background: #ecf0f1;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .cancel-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 40px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .cancel-icon {
        font-size: 5rem;
        color: #e74c3c;
        margin-bottom: 20px;
        animation: shake 0.5s infinite;
    }

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

    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        25% {
            transform: translateX(-10px);
        }
        75% {
            transform: translateX(10px);
        }
    }
</style>

<div class="cancel-container">
    <div class="cancel-card">
        <div class="cancel-icon">❌</div>
        <h1 class="text-danger">Payment Canceled</h1>
        <p>Your payment was not completed. Please try again.</p>
        <a href="{{ route('cart') }}" class="btn btn-primary">Return to Cart</a>
    </div>
</div>
@endsection
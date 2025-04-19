@extends('Master')

@section('title', 'Payment Success')

@section('content')
<style>
    .success-container {
        padding: 40px 0;
        background: transparent;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .success-card {
        background: transparent;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 40px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .success-icon {
        font-size: 5rem;
        color: #1abc9c;
        margin-bottom: 20px;
        animation: bounce 1s infinite;
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

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>

<div class="success-container">
    <div class="success-card">
        <div class="success-icon">🎉</div>
        <h1 class="text-success">Payment Successful!</h1>
        <p>Thank you for your purchase.</p>
        <br>
        <a href="/" class="btn btn-primary" align='center'>Go Back To Home</a>
    </div>
</div>
@endsection
@extends('Master')
@section('title','Products Details')
@section('content')

<style>
    /* Variables for consistent colors */
    :root {
        --primary-color: #1abc9c;
        --secondary-color: #ecf0f1;
        --accent-color: #e74c3c;
        --text-color: #bdc3c7;
        --light-gray: #2c3e50;
        --dark-bg: rgba(0,0,0,0);
        --card-bg: rgba(0,0,0,0) ;
    }

    .product-container {
        padding: 40px 0;
        background: var(--dark-bg);
        min-height: 100vh;
    }

    .product-img {
        border-radius: 15px;
        transition: all 0.5s ease;
        max-height: 500px;
        object-fit: cover;
        width: 100%;
    }

    .product-img:hover {
        transform: scale(1.02);
    }

    .img-container {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        background: var(--card-bg);
    }

    .sale-flag {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--accent-color);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .product-title {
        color: var(--secondary-color);
        font-weight: 700;
        letter-spacing: -0.5px;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .price-container {
        display: flex;
        align-items: baseline;
        gap: 15px;
        margin-bottom: 25px;
    }

    .current-price {
        font-size: 2.8rem;
        color: var(--primary-color);
        font-weight: 700;
    }

    .original-price {
        font-size: 1.5rem;
        color: var(--text-color);
        text-decoration: line-through;
    }

    .category-tag {
        background: var(--card-bg);
        color: var(--secondary-color);
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 500;
        display: inline-block;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }

    .category-tag:hover {
        background: var(--primary-color);
        color: black;
        transform: translateY(-2px);
    }

    .product-description {
        color: var(--text-color);
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .quantity-btn {
        width: 40px;
        height: 40px;
        border: 2px solid var(--primary-color);
        background: var(--card-bg);
        border-radius: 50%;
        color: var(--primary-color);
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quantity-btn:hover {
        background: var(--primary-color);
        color: black;
    }

    .quantity-input {
        width: 60px;
        height: 40px;
        text-align: center;
        border: 1px solid var(--text-color);
        border-radius: 20px;
        font-size: 1.1rem;
        background: var(--card-bg);
        color: var(--secondary-color);
    }

    .action-buttons {
        display: flex;
        gap: 15px;
    }

    .btn-cart, .btn-buy {
        flex: 1;
        padding: 15px 30px;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        border: none;
        font-size: 1.1rem;
    }

    .btn-cart {
        background: var(--primary-color);
        color: black;
    }

    .btn-buy {
        background: var(--card-bg);
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-cart:hover, .btn-buy:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-cart:hover {
        background: #16a085;
    }

    .btn-buy:hover {
        background: var(--primary-color);
        color: black;
    }

    .details-card {
        background: var(--card-bg);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        height: 100%;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .product-title {
            font-size: 2rem;
        }
        .current-price {
            font-size: 2.2rem;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="product-container">
    <div class="container">
        <div class="row g-4">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="img-container">
                    <img src="{{$produits->Img}}" class="product-img" alt="{{$produits->Title}}">
                    @if($produits->Solde)
                        <div class="sale-flag">{{$produits->Solde}}</div>
                    @endif
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <div class="details-card">
                    <h1 class="product-title">{{$produits->Title}}</h1>
                    
                    <span class="category-tag">{{$produits->Categorie}}</span>
                    
                    <div class="price-container">
                        @if($produits->Solde)
                        <span class="current-price">{{floatval($produits->Price)  * 0.9 }} DH</span>
                            <span class="original-price">{{$produits->Price }}</span>
                        @else
                        <span class="current-price">{{$produits->Price}} </span>
                        @endif
                    </div>

                    <div class="product-description">
                        {{$produits->Contenu}}
                    </div>

                    <div class="quantity-selector">
                        <button class="quantity-btn">-</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                        <button class="quantity-btn">+</button>
                    </div>

                    <div class="action-buttons">
                        <button class="btn-cart"><a href="{{ url('cart/addc', ['id' => $produits['id']]) }}">Add To Cart</a></button>
                        <button class="btn-buy">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Quantity selector functionality
    document.addEventListener('DOMContentLoaded', function() {
        const minusBtn = document.querySelector('.quantity-btn:first-child');
        const plusBtn = document.querySelector('.quantity-btn:last-child');
        const input = document.querySelector('.quantity-input');

        minusBtn.addEventListener('click', () => {
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        });

        plusBtn.addEventListener('click', () => {
            const currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        });
    });
</script>

@endsection

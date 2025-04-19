@extends('Master')
@section('title','Carts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Flaticon Font -->
<link href="lib/flaticon/font/flaticon.css" rel="stylesheet">



      
    <style>
         .nav-link.active {
    color: red !important; /* Exemple de couleur pour les liens actifs */
    font-weight: bold;
    border-radius: 5px; /* Facultatif */
}

        /* Custom animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .fade-in-up { animation: fadeInUp 0.6s ease-out; }
        .slide-in { animation: slideIn 0.5s ease-out; }

        /* Custom styles */
        .cart-container {
            background: linear-gradient(145deg, #ffffff, #f3f4f6);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            transition: all 0.3s ease;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 500;
        }

        .btn-update {
            background: linear-gradient(45deg, #4F46E5, #6366F1);
            border: none;
            color: white;
        }

        .btn-update:hover {
            background: linear-gradient(45deg, #4338CA, #4F46E5);
            transform: translateY(-2px);
        }

        .btn-delete {
            background: linear-gradient(45deg, #EF4444, #DC2626);
            border: none;
            color: white;
        }

        .btn-delete:hover {
            background: linear-gradient(45deg, #DC2626, #B91C1C);
            transform: translateY(-2px);
        }

        .btn-pay {
            background: linear-gradient(45deg, #10B981, #34D399);
            border: none;
            color: white;
        }

        .btn-pay:hover {
            background: linear-gradient(45deg, #059669, #10B981);
            transform: translateY(-2px);
        }

        .quantity {
            border: 2px solid #E5E7EB;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .quantity:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .table th {
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #E5E7EB;
        }

        .price-text { color: #059669; font-weight: 600; }

        .total-section {
            background: linear-gradient(145deg, #f3f4f6, #ffffff);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        /* Responsive adjustments */
@media (max-width: 768px) {
    .table th, .table td {
        font-size: 14px;
    }
    
    .cart-container {
        padding: 20px 10px;
    }

    .product-image {
        width: 80px;
        height: 80px;
    }

    .quantity {
        width: 80px;
    }

    .btn-custom {
        padding: 6px 12px;
        font-size: 14px;
    }

    .total-section {
        text-align: center;
    }

    .text-end {
        text-align: center !important;
    }
}

@media (max-width: 480px) {
    .product-image {
        width: 60px;
        height: 60px;
    }

    .quantity {
        width: 60px;
    }

    .btn-custom {
        padding: 5px 10px;
        font-size: 12px;
    }

    h5 {
        font-size: 16px;
    }
}

    </style>

@section('content')
    <div class="container">
        <h1 class="display-5 mb-4 text-center fade-in-up">Mon Panier</h1>

        <div class="cart-container p-4 mb-4 fade-in-up">
            <div class="table-responsive">
                <table id="cart" class="table table-borderless">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php 
                                        $originalPrice = floatval($details['prix']);
                                        $discountedPrice = !empty($details['Solde']) ? $originalPrice * 0.9 : $originalPrice;
                                        $total += $discountedPrice * $details['quantity']; 
                                
                                @endphp
                                <tr class="product-card slide-in">
                                    <td data-th="Product">
                                        <div class="d-flex align-items-center">
                                            <div class="hidden-xs">
                                                <img src="{{ $details['image'] }}" width="100" height="100" class="product-image me-3"/>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">{{ $details['nom'] }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">
                                        <span class="price-text">{{ $discountedPrice }} DH</span>
                                    </td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" min="1"/>
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        <span class="price-text">{{ $discountedPrice * $details['quantity'] }} DH</span>
                                    </td>
                                    <td class="actions" data-th="">
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-custom btn-update btn-sm update-cart" data-id="{{ $id }}" id="up">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                            <button class="btn btn-custom btn-delete btn-sm remove-from-cart" data-id="{{ $id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="total-section mt-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <a href="{{ url('/') }}" class="btn btn-warning">
                            <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                        </a>
                        <br>
                        <a href="{{ route('payment.form') }}" class="btn btn-pay ms-2">
                            <i class="fas fa-credit-card me-2"></i> Payer Maintenant
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="mb-1 text-muted">Total (TVA incluse)</p>
                        <h3 class="price-text mb-3">{{ $total }} DH</h3>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Smooth quantity update validation
            $(".quantity").on('input', function() {
                const value = parseInt($(this).val());
                const min = parseInt($(this).attr('min'));
                
                if (isNaN(value) || value < min) {
                    $(this).val(min);
                }
                
                // Visual feedback on quantity change
                $(this).addClass('border-primary');
                setTimeout(() => {
                    $(this).removeClass('border-primary');
                }, 300);
            });
        
            // Update Cart Handler
            $(".update-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                console.log('hello')
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.attr("data-id"), 
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    beforeSend: function() {
                        ele.find('i').addClass('fa-spin');
                        ele.addClass('disabled');
                    },
                    success: function () { 
                        window.location.reload(); 
                    },
                    error: function () { 
                        alert("Erreur lors de la mise à jour du panier"); 
                        ele.find('i').removeClass('fa-spin');
                        ele.removeClass('disabled');
                    }
                });
            });
        
            // Remove from Cart Handler
            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                const productName = ele.closest('tr').find('h5').text();
                
                if (confirm(`Voulez-vous vraiment supprimer "${productName}" de votre panier ?`)) {
                    $.ajax({
                        url: '{{ route("cart.remove") }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.attr("data-id")
                        },
                        beforeSend: function() {
                            ele.find('i').addClass('fa-spin');
                            ele.addClass('disabled');
                            ele.closest('tr').addClass('opacity-50');
                        },
                        success: function () { 
                            window.location.reload(); 
                        },
                        error: function () { 
                            alert("Erreur lors de la suppression de l'article"); 
                            ele.find('i').removeClass('fa-spin');
                            ele.removeClass('disabled');
                            ele.closest('tr').removeClass('opacity-50');
                        }
                    });
                }
            });
        
            // Subtle total price calculation preview
            $(".quantity").on('change', function() {
                const $row = $(this).closest('tr');
                const price = parseFloat($row.find('.price-text').first().text());
                const quantity = parseInt($(this).val());
                const subtotal = (price * quantity).toFixed(2);
                
                $row.find('[data-th="Subtotal"] .price-text').text(subtotal + ' DH');
            });
        });
        </script>
@endsection

   
</body>
</html>
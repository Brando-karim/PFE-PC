@extends('Master')
@section('title','Mon Panier')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

@section('content')
<div class="container">
    <div class="cart-header text-center mb-5 fade-in-up">
        <h1 class="display-4 mb-3">
            <i class="fas fa-shopping-cart me-3"></i>Mon Panier
        </h1>
        @if(session('cart') && count(session('cart')) > 0)
            <p class="lead text-muted">
                {{ count(session('cart')) }} {{ count(session('cart')) > 1 ? 'articles' : 'article' }} dans votre panier
            </p>
        @endif
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="cart-container p-4 mb-4 fade-in-up">
            <!-- Cart Items Table -->
            <div class="table-responsive">
                <table id="cart" class="table table-borderless">
                    <thead>
                        <tr>
                            <th style="width:45%">Produit</th>
                            <th style="width:15%">Prix</th>
                            <th style="width:15%">Quantité</th>
                            <th style="width:15%" class="text-center">Sous-total</th>
                            <th style="width:10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach(session('cart') as $id => $details)
                            @php 
                                $originalPrice = floatval($details['prix']);
                                $discountedPrice = !empty($details['Solde']) ? $originalPrice * 0.9 : $originalPrice;
                                $total += $discountedPrice * $details['quantity']; 
                            @endphp
                            <tr class="product-card slide-in" data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="d-flex align-items-center">
                                        <div class="product-image-container position-relative me-3">
                                            <img src="{{ $details['image'] }}" width="100" height="100" class="product-image" alt="{{ $details['nom'] }}"/>
                                            @if(!empty($details['Solde']))
                                                <span class="sale-badge">-10%</span>
                                            @endif
                                        </div>
                                        <div class="product-info">
                                            <h5 class="mb-2 product-name">{{ $details['nom'] }}</h5>
                                            @if(!empty($details['Solde']))
                                                <span class="badge bg-success mb-2">
                                                    <i class="fas fa-tag me-1"></i>En Solde
                                                </span>
                                            @endif
                                            <div class="product-meta">
                                                <small class="text-muted">SKU: #{{ $id }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">
                                    <div class="price-container">
                                        <span class="price-text current-price">{{ number_format($discountedPrice, 2, ',', ' ') }} DH</span>
                                        @if(!empty($details['Solde']))
                                            <small class="original-price text-muted text-decoration-line-through d-block">
                                                {{ number_format($originalPrice, 2, ',', ' ') }} DH
                                            </small>
                                        @endif
                                    </div>
                                </td>
                                <td data-th="Quantity">
                                    <div class="quantity-controls">
                                        <button class="btn btn-quantity btn-decrease" data-id="{{ $id }}">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" class="form-control quantity" min="1" max="99"/>
                                        <button class="btn btn-quantity btn-increase" data-id="{{ $id }}">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td data-th="Subtotal" class="text-center">
                                    <div class="subtotal-container">
                                        <span class="price-text subtotal-price">{{ number_format($discountedPrice * $details['quantity'], 2, ',', ' ') }} DH</span>
                                    </div>
                                </td>
                                <td class="actions" data-th="">
                                    <div class="action-buttons">
                                        <button class="btn btn-custom btn-update btn-sm update-cart" data-id="{{ $id }}" title="Mettre à jour">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <button class="btn btn-custom btn-delete btn-sm remove-from-cart" data-id="{{ $id }}" title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary -->
            <div class="cart-summary mt-5">
                <div class="row">
                    <!-- Continue Shopping -->
                    <div class="col-lg-6 mb-4">
                        <div class="continue-shopping-section">
                            <h5 class="mb-3">
                                <i class="fas fa-store me-2"></i>Continuer vos achats
                            </h5>
                            <p class="text-muted mb-3">Découvrez plus de produits dans notre catalogue</p>
                            <a href="{{ url('/') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-arrow-left me-2"></i> Parcourir les produits
                            </a>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-lg-6">
                        <div class="order-summary">
                            <h5 class="mb-4">
                                <i class="fas fa-receipt me-2"></i>Résumé de la commande
                            </h5>
                            
                            <div class="summary-line">
                                <span>Livraison</span>
                                <span class="text-success">Gratuite</span>
                            </div>
                            
                            <hr class="my-3">
                            
                            <div class="summary-line total-line">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold total-amount">{{ number_format($total, 2, ',', ' ') }} DH</span>
                            </div>
                            
                            <div class="checkout-actions mt-4">
                                <a href="{{ route('payment.form') }}" class="btn btn-pay btn-lg w-100 mb-3">
                                    <i class="fas fa-credit-card me-2"></i> Procéder au paiement
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty Cart State -->
        <div class="empty-cart-container text-center py-5 fade-in-up">
            <div class="empty-cart-icon mb-4">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h3 class="mb-3">Votre panier est vide</h3>
            <p class="text-muted mb-4">Il semble que vous n'ayez pas encore ajouté d'articles à votre panier.</p>
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-store me-2"></i> Découvrir nos produits
            </a>
        </div>
    @endif

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3">Mise à jour en cours...</p>
        </div>
    </div>
</div>

<!-- Toast Notifications Container -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i>
                <span class="toast-message"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
    
    <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-exclamation-circle me-2"></i>
                <span class="toast-message"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<style>
/* Enhanced Animations */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideIn {
    from { transform: translateX(-30px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.fade-in-up { animation: fadeInUp 0.8s ease-out; }
.slide-in { animation: slideIn 0.6s ease-out; }

/* Enhanced Cart Styling */
.cart-container {
    background: linear-gradient(145deg, #ffffff, #f8fafc);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.cart-header h1 {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Product Card Enhancements */
.product-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 15px;
    padding: 15px;
    margin-bottom: 10px;
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    background: rgba(255, 255, 255, 0.9);
}

.product-image-container {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
}

.product-image {
    border-radius: 12px;
    transition: transform 0.3s ease;
    object-fit: cover;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

.sale-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(45deg, #ff6b6b, #ee5a24);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
    box-shadow: 0 4px 8px rgba(255, 107, 107, 0.3);
}

.product-name {
    color: #2d3748;
    font-weight: 600;
    line-height: 1.4;
}

/* Enhanced Price Display */
.price-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.current-price {
    font-size: 1.1rem;
    font-weight: 700;
    color: #059669;
}

.original-price {
    font-size: 0.9rem;
    margin-top: 2px;
}

/* Quantity Controls */
.quantity-controls {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #f7fafc;
    border-radius: 12px;
    padding: 4px;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
}

.quantity-controls:focus-within {
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.btn-quantity {
    width: 32px;
    height: 32px;
    border: none;
    border-radius: 8px;
    background: #4f46e5;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    font-size: 12px;
}

.btn-quantity:hover {
    background: #4338ca;
    transform: scale(1.1);
}

.btn-quantity:active {
    transform: scale(0.95);
}

.quantity {
    width: 60px;
    text-align: center;
    border: none;
    background: transparent;
    font-weight: 600;
    color: #2d3748;
}

.quantity:focus {
    outline: none;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
    flex-direction: column;
}

.btn-custom {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 10px;
    padding: 8px 12px;
    font-weight: 500;
    border: none;
    position: relative;
    overflow: hidden;
}

.btn-custom::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.btn-custom:hover::before {
    left: 100%;
}

.btn-update {
    background: linear-gradient(135deg, #4f46e5, #7c3aed) !important;
    color: white !important;
    border: none !important;
}

.btn-update:hover {
    background: linear-gradient(135deg, #4338ca, #6d28d9) !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444, #dc2626) !important;
    color: white !important;
    border: none !important;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
}

/* Order Summary */
.order-summary {
    background: linear-gradient(145deg, #f8fafc, #ffffff);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.summary-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #e2e8f0;
}

.summary-line:last-child {
    border-bottom: none;
}

.total-line {
    font-size: 1.2rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.savings-line {
    background: rgba(16, 185, 129, 0.1);
    border-radius: 8px;
    padding: 8px 12px;
    margin: 8px 0;
}

.savings-highlight {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    border-radius: 12px;
    border-left: 4px solid #f59e0b;
    color: #92400e;
}

/* Payment Button */
.btn-pay {
    background: linear-gradient(135deg, #10b981, #059669);
    border: none;
    color: white;
    font-weight: 600;
    border-radius: 12px;
    padding: 15px 30px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-pay::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s;
}

.btn-pay:hover::before {
    left: 100%;
}

.btn-pay:hover {
    background: linear-gradient(135deg, #059669, #047857);
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
}

/* Empty Cart State */
.empty-cart-container {
    padding: 80px 20px;
    background: linear-gradient(145deg, #f8fafc, #ffffff);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.empty-cart-icon i {
    font-size: 5rem;
    color: #cbd5e0;
    margin-bottom: 20px;
    animation: pulse 2s infinite;
}

/* Loading Overlay */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.loading-spinner {
    text-align: center;
    color: white;
}

/* Table Enhancements */
.table th {
    font-weight: 700;
    color: #374151;
    border-bottom: 2px solid #e5e7eb;
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    padding: 20px 15px;
}

.table td {
    padding: 20px 15px;
    vertical-align: middle;
}

/* Responsive Design */
@media (max-width: 768px) {
    .cart-container {
        padding: 20px 15px;
        margin: 0 10px;
    }
    
    .product-card {
        padding: 15px 10px;
    }
    
    .product-image {
        width: 80px;
        height: 80px;
    }
    
    .quantity-controls {
        flex-direction: column;
        gap: 4px;
    }
    
    .btn-quantity {
        width: 28px;
        height: 28px;
    }
    
    .action-buttons {
        flex-direction: row;
        gap: 4px;
    }
    
    .btn-custom {
        padding: 6px 8px;
        font-size: 12px;
    }
    
    .order-summary {
        padding: 20px;
        margin-top: 30px;
    }
    
    .table th, .table td {
        font-size: 14px;
        padding: 15px 8px;
    }
    
    .cart-header h1 {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .product-image {
        width: 60px;
        height: 60px;
    }
    
    .product-name {
        font-size: 14px;
    }
    
    .current-price {
        font-size: 1rem;
    }
    
    .btn-pay {
        padding: 12px 20px;
        font-size: 14px;
    }
    
    .empty-cart-icon i {
        font-size: 3rem;
    }
}

/* Toast Animations */
.toast {
    animation: slideInRight 0.3s ease-out;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Hover Effects */
.continue-shopping-section {
    padding: 20px;
    border-radius: 15px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    transition: transform 0.3s ease;
}

.continue-shopping-section:hover {
    transform: translateY(-5px);
}

.continue-shopping-section .btn {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    backdrop-filter: blur(10px);
}

.continue-shopping-section .btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

/* Additional Effects */
.updating {
    opacity: 0.7;
    pointer-events: none;
}

.removing {
    opacity: 0.5;
    pointer-events: none;
}

.success-flash {
    background: rgba(16, 185, 129, 0.1) !important;
    transition: background 0.3s ease;
}

.shake {
    animation: shake 0.5s ease-in-out;
}

.pulse {
    animation: pulse 0.3s ease-in-out;
}

.page-loaded {
    opacity: 1;
    transition: opacity 0.5s ease-in-out;
}

body {
    opacity: 0;
}

.is-invalid {
    border-color: #dc3545 !important;
    animation: shake 0.3s ease-in-out;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Show loading overlay
    function showLoading() {
        $('#loadingOverlay').fadeIn(300);
    }

    // Hide loading overlay
    function hideLoading() {
        $('#loadingOverlay').fadeOut(300);
    }

    // Show toast notification
    function showToast(type, message) {
        const toastId = type === 'success' ? '#successToast' : '#errorToast';
        $(toastId).find('.toast-message').text(message);
        const toast = new bootstrap.Toast($(toastId)[0]);
        toast.show();
    }

    // Animate number changes
    function animateNumber(element, newValue) {
        const $element = $(element);
        const currentValue = parseFloat($element.text().replace(/[^\d.,]/g, '').replace(',', '.')) || 0;
        const targetValue = parseFloat(newValue);
        
        $({ value: currentValue }).animate({ value: targetValue }, {
            duration: 500,
            easing: 'swing',
            step: function() {
                $element.text(this.value.toFixed(2).replace('.', ',') + ' DH');
            },
            complete: function() {
                $element.text(targetValue.toFixed(2).replace('.', ',') + ' DH');
            }
        });
    }

    // Enhanced quantity validation
    $(".quantity").on('input', function() {
        const $input = $(this);
        const value = parseInt($input.val());
        const min = 1; // Always minimum 1
        const max = parseInt($input.attr('max')) || 99;
        
        if (isNaN(value) || value < min) {
            $input.val(min);
            $input.addClass('is-invalid');
            setTimeout(() => $input.removeClass('is-invalid'), 1000);
        } else if (value > max) {
            $input.val(max);
            $input.addClass('is-invalid');
            setTimeout(() => $input.removeClass('is-invalid'), 1000);
        }
        
        // Visual feedback
        $input.closest('.quantity-controls').addClass('border-primary');
        setTimeout(() => {
            $input.closest('.quantity-controls').removeClass('border-primary');
        }, 300);
    });

    // Quantity increase/decrease buttons
    $('.btn-increase').click(function() {
        const $input = $(this).siblings('.quantity');
        const currentValue = parseInt($input.val()) || 1;
        const maxValue = parseInt($input.attr('max')) || 99;
        
        if (currentValue < maxValue) {
            $input.val(currentValue + 1);
            $input.trigger('change');
        }
    });

    $('.btn-decrease').click(function() {
        const $input = $(this).siblings('.quantity');
        const currentValue = parseInt($input.val()) || 1;
        const minValue = 1; // Always minimum 1
        
        if (currentValue > minValue) {
            $input.val(currentValue - 1);
            $input.trigger('change');
        }
    });

    // Enhanced update cart handler
    $(".update-cart").click(function (e) {
        e.preventDefault();
        const $button = $(this);
        const $row = $button.closest('tr');
        const productId = $button.attr("data-id");
        const quantity = $row.find(".quantity").val();
        const productName = $row.find('.product-name').text();

        // Validation
        if (!quantity || quantity < 1) {
            showToast('error', 'La quantité doit être supérieure à 0');
            return;
        }

        showLoading();
        
        // Store original button content
        const originalContent = $button.html();
        $button.html('<i class="fas fa-spinner fa-spin"></i>');
        $button.prop('disabled', true);
        $row.addClass('updating');

        $.ajax({
            url: '{{ route('cart.update') }}',
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}', 
                id: productId, 
                quantity: quantity
            },
            success: function (response) {
                hideLoading();
                showToast('success', `${productName} mis à jour avec succès`);
                
                // Animate the changes
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
            error: function (xhr) {
                hideLoading();
                const errorMessage = xhr.responseJSON?.message || "Erreur lors de la mise à jour du panier";
                showToast('error', errorMessage);
                
                // Reset button state
                $button.html(originalContent);
                $button.prop('disabled', false);
                $row.removeClass('updating');
                
                // Shake animation for error
                $row.addClass('shake');
                setTimeout(() => $row.removeClass('shake'), 500);
            }
        });
    });

    // Enhanced remove from cart handler
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        const $button = $(this);
        const $row = $button.closest('tr');
        const productId = $button.attr("data-id");
        const productName = $row.find('.product-name').text();

        // Enhanced confirmation dialog
        if (confirm(`Êtes-vous sûr de vouloir supprimer "${productName}" de votre panier ?\n\nCette action ne peut pas être annulée.`)) {
            showLoading();
            
            // Store original button content
            const originalContent = $button.html();
            $button.html('<i class="fas fa-spinner fa-spin"></i>');
            $button.prop('disabled', true);
            
            // Add removing animation
            $row.addClass('removing');
            $row.css({
                'transform': 'translateX(20px)',
                'opacity': '0.5',
                'transition': 'all 0.3s ease'
            });

            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: productId
                },
                success: function (response) {
                    hideLoading();
                    showToast('success', `${productName} supprimé du panier`);
                    
                    // Animate removal
                    $row.css({
                        'transform': 'translateX(-100%)',
                        'opacity': '0',
                        'height': '0',
                        'padding': '0',
                        'margin': '0'
                    });
                    
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                },
                error: function (xhr) {
                    hideLoading();
                    const errorMessage = xhr.responseJSON?.message || "Erreur lors de la suppression de l'article";
                    showToast('error', errorMessage);
                    
                    // Reset button and row state
                    $button.html(originalContent);
                    $button.prop('disabled', false);
                    $row.removeClass('removing');
                    $row.css({
                        'transform': '',
                        'opacity': '',
                        'transition': ''
                    });
                }
            });
        }
    });

    // Live subtotal calculation with animation
    $(".quantity").on('change input', function() {
        const $row = $(this).closest('tr');
        const $priceElement = $row.find('.current-price');
        const $subtotalElement = $row.find('.subtotal-price');
        
        const priceText = $priceElement.text();
        const price = parseFloat(priceText.replace(/[^\d,]/g, '').replace(',', '.'));
        const quantity = parseInt($(this).val()) || 1;
        const newSubtotal = price * quantity;
        
        // Animate the subtotal change
        animateNumber($subtotalElement, newSubtotal);
        
        // Recalculate total
        let newTotal = 0;
        $('.quantity').each(function() {
            const rowPrice = parseFloat($(this).closest('tr').find('.current-price').text().replace(/[^\d,]/g, '').replace(',', '.'));
            const rowQty = parseInt($(this).val()) || 1;
            newTotal += rowPrice * rowQty;
        });
        
        // Animate total change (removed TVA calculation)
        const $totalElement = $('.total-amount');
        $totalElement.addClass('text-primary');
        animateNumber($totalElement, newTotal);
        
        setTimeout(() => {
            $totalElement.removeClass('text-primary');
        }, 1000);
    });

    // Add smooth scrolling to checkout button
    $('.btn-pay').click(function(e) {
        $(this).addClass('pulse');
        setTimeout(() => {
            $(this).removeClass('pulse');
        }, 300);
    });

    // Add entrance animations to cart items
    $('.product-card').each(function(index) {
        $(this).css({
            'animation-delay': (index * 0.1) + 's'
        });
    });

    // Auto-save cart changes (optional)
    let autoSaveTimeout;
    $('.quantity').on('input', function() {
        clearTimeout(autoSaveTimeout);
        const $input = $(this);
        
        autoSaveTimeout = setTimeout(() => {
            const $updateButton = $input.closest('tr').find('.update-cart');
            if ($updateButton.length) {
                $updateButton.trigger('click');
            }
        }, 2000); // Auto-save after 2 seconds of inactivity
    });

    // Add keyboard shortcuts
    $(document).keydown(function(e) {
        // Ctrl/Cmd + Enter to proceed to checkout
        if ((e.ctrlKey || e.metaKey) && e.keyCode === 13) {
            $('.btn-pay')[0]?.click();
        }
        
        // Escape to clear any loading states
        if (e.keyCode === 27) {
            hideLoading();
        }
    });

    // Initialize page with fade-in effect
    $('body').addClass('page-loaded');
});
</script>
@endsection

@extends('Master') 
@section('title', 'Add Products') 
 
@section('content') 
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold gradient-text mb-3">Add New Product</h2>
                <p class="lead text-light">Fill in the details below to add a new product to your store</p>
            </div>

            @include('flash')

            <div class="card shadow-lg border-0 rounded-lg overflow-hidden animate__animated animate__fadeInUp">
                <div class="card-header bg-gradient text-white py-4" style="background: linear-gradient(45deg, #5c32a3, #7b4cbf);">
                    <h5 class="mb-0 text-center fw-bold">{{ __('Add New Product') }}</h5>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{route('produits.store')}}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="Titre" class="form-label fw-semibold">
                                        <i class="fas fa-tag text-primary me-2"></i>{{ __('Product Title') }}
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-pencil-alt text-muted"></i>
                                        </span>
                                        <input id="Titre" type="text" class="form-control form-control-lg" 
                                            name="Titre" placeholder="Enter product title" required>
                                    </div>
                                    @error('Titre')
                                        <div class="invalid-feedback d-block mt-1">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="Price" class="form-label fw-semibold">
                                        <i class="fas fa-dollar-sign text-success me-2"></i>{{ __('Product Price') }}
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-money-bill text-muted"></i>
                                        </span>
                                        <input id="Price" type="text" class="form-control form-control-lg" 
                                            name="Price" placeholder="Enter product price" required>
                                    </div>
                                    @error('Price')
                                        <div class="invalid-feedback d-block mt-1">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="Categorie" class="form-label fw-semibold">
                                        <i class="fas fa-folder text-info me-2"></i>{{ __('Product Category') }}
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-tags text-muted"></i>
                                        </span>
                                        <input id="Categorie" type="text" class="form-control form-control-lg" 
                                            name="Categorie" placeholder="Enter product category" required>
                                    </div>
                                    @error('Categorie')
                                        <div class="invalid-feedback d-block mt-1">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="Solde" class="form-label fw-semibold">
                                        <i class="fas fa-percent text-warning me-2"></i>{{ __('Product Discount') }}
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-tag text-muted"></i>
                                        </span>
                                        <input id="Solde" type="text" class="form-control form-control-lg" 
                                            name="Solde" placeholder="Enter discount percentage">
                                    </div>
                                    @error('Solde')
                                        <div class="invalid-feedback d-block mt-1">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="Contenu" class="form-label fw-semibold">
                                <i class="fas fa-align-left text-primary me-2"></i>{{ __('Product Description') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-file-alt text-muted"></i>
                                </span>
                                <textarea id="Contenu" class="form-control form-control-lg" 
                                    name="Contenu" rows="4" placeholder="Enter product description" required></textarea>
                            </div>
                            @error('Contenu')
                                <div class="invalid-feedback d-block mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="Img" class="form-label fw-semibold">
                                <i class="fas fa-image text-success me-2"></i>{{ __('Product Image') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-upload text-muted"></i>
                                </span>
                                <input id="Img" type="file" class="form-control form-control-lg" 
                                    name="Img" accept="image/*" required>
                            </div>
                            <small class="text-muted mt-1">
                                <i class="fas fa-info-circle me-1"></i>Recommended size: 800x800 pixels, max 2MB
                            </small>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button type="submit" class="btn btn-primary px-5 py-2">
                                {{ __('Add Product') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.gradient-text {
    background: linear-gradient(45deg, #5c32a3, #7b4cbf);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.form-control:focus {
    border-color: #7b4cbf;
    box-shadow: 0 0 0 0.25rem rgba(123, 76, 191, 0.25);
}

.input-group-text {
    border-color: #e9ecef;
}

.input-group:focus-within .input-group-text {
    border-color: #7b4cbf;
}

.invalid-feedback {
    font-size: 0.875rem;
}

textarea.form-control {
    resize: none;
}

/* File input styling */
input[type="file"] {
    padding: 0.375rem;
}

input[type="file"]::-webkit-file-upload-button {
    padding: 0.375rem 0.75rem;
    margin: -0.375rem;
    margin-right: 0.75rem;
    color: #fff;
    background-color: #7b4cbf;
    border: 0;
    border-radius: 0.25rem;
    transition: all 0.2s ease;
}

input[type="file"]::-webkit-file-upload-button:hover {
    background-color: #5c32a3;
}
</style>

<!-- Include Animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- Include Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });

    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection

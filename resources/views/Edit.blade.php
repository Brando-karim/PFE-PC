@extends('Master')
@section('title', 'Edit Products')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-white py-3">
                    <h3 class="text-center mb-0" style="color: #2d3748; font-weight: 600;">
                        <i class="fas fa-edit me-2"></i>Edit Product
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form action="/produits/{{ $produits->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        
                        <div class="form-group mb-4">
                            <label for="Titre" class="form-label fw-bold" style="color: #4a5568;">Product Title</label>
                            @error('Titre')
                                <small class="text-danger d-block mb-2">{{ $message }}</small>
                            @enderror
                            <input 
                                type="text" 
                                class="form-control shadow-sm" 
                                id="Titre" 
                                name="Titre" 
                                value="{{ old('Titre', $produits->Titre) }}" 
                                style="border-radius: 8px; padding: 12px; border: 1px solid #e2e8f0;">
                        </div>

                        <div class="form-group mb-4">
                            <label for="Contenu" class="form-label fw-bold" style="color: #4a5568;">Product Description</label>
                            @error('Contenu')
                                <small class="text-danger d-block mb-2">{{ $message }}</small>
                            @enderror
                            <textarea 
                                class="form-control shadow-sm" 
                                id="Contenu" 
                                name="Contenu" 
                                rows="4" 
                                style="border-radius: 8px; padding: 12px; border: 1px solid #e2e8f0;">{{ old('Contenu', $produits->Contenu) }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="Price" class="form-label fw-bold" style="color: #4a5568;">Product Price</label>
                            @error('Price')
                                <small class="text-danger d-block mb-2">{{ $message }}</small>
                            @enderror
                            <textarea 
                                class="form-control shadow-sm" 
                                id="Price" 
                                name="Price" 
                                rows="1" 
                                style="border-radius: 8px; padding: 12px; border: 1px solid #e2e8f0;">{{ old('Price', $produits->Price) }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="Categorie" class="form-label fw-bold" style="color: #4a5568;">Product Category</label>
                            @error('Categorie')
                                <small class="text-danger d-block mb-2">{{ $message }}</small>
                            @enderror
                            <select 
                                class="form-control shadow-sm" 
                                id="Categorie" 
                                name="Categorie" 
                                style="border-radius: 8px; padding: 12px; border: 1px solid #e2e8f0;">
                                <option value="{{ old('Categorie', $produits->Categorie) }}" selected>{{ old('Categorie', $produits->Categorie) }}</option>
                                <option value="Consoles">Consoles</option>
                                <option value="Accessoires">Accessoires</option>
                                <option value="Components">Components</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="Img" class="form-label fw-bold" style="color: #4a5568;">Product Image</label>
                            <div class="input-group">
                                <input 
                                    id="Img" 
                                    type="file" 
                                    class="form-control shadow-sm" 
                                    name="Img" 
                                    style="border-radius: 8px; padding: 8px; border: 1px solid #e2e8f0;">
                            </div>
                            @if($produits->Img)
                                <div class="mt-2">
                                    <small class="text-muted">Current image: {{ basename($produits->Img) }}</small>
                                </div>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <button 
                                type="submit" 
                                class="btn btn-primary px-4 py-2" 
                                style="border-radius: 8px; background-color: #007BFF; border: none; font-weight: bold;">
                                Modifier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.form-control:focus {
    border-color: #4299e1;
    box-shadow: 0 0 0 0.2rem rgba(66, 153, 225, 0.25);
}

.form-label {
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.input-group {
    position: relative;
}

.input-group .form-control {
    padding-right: 40px;
}

.form-control::placeholder {
    color: #a0aec0;
}

select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 12px;
}
</style>
@endsection

@extends('Master') 
@section('title', 'Add Products') 
 
@section('content') 
<h2 class="text-center mt-4">Add New Product</h2> 
 
<div class="container justify-content-center mt-3"> 
    @include('flash') <!-- Inclusion du message flash --> 
</div> 
 
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <div class="card shadow-lg border-0 animate__animated animate__fadeInUp"> 
                <div class="card-header bg-primary text-white text-center"> 
                    <h5 class="m-0">{{ __('Ajouter un nouveau produit') }}</h5> 
                </div> 
 
                <div class="card-body bg-light"> 
                    <form method="POST" action="{{route('produits.store')}}" enctype="multipart/form-data"> 
                        @csrf 
 
                        <div class="form-group mb-4"> 
                            <label for="Titre" class="form-label">{{ __('Titre du produit') }}</label> 
                            <input id="Titre" type="text" class="form-control" name="Titre" placeholder="Entrez le titre du produit"> 
                            @error('Titre') 
                                <div style="color:red;">{{ $message }}</div> 
                            @enderror 
                        </div> 
 
                        <div class="form-group mb-4"> 
                            <label for="Price" class="form-label">{{ __('Price du produit') }}</label> 
                            <input id="Price" type="text" class="form-control" name="Price" placeholder="Entrez le prix du produit"> 
                            @error('Price') 
                                <div style="color:red;">{{ $message }}</div> 
                            @enderror 
                        </div> 
 
                        <div class="form-group mb-4"> 
                            <label for="Categorie" class="form-label">{{ __('Catégorie du produit') }}</label> 
                            <input id="Categorie" type="text" class="form-control" name="Categorie" placeholder="Entrez la catégorie du produit"> 
                            @error('Categorie') 
                                <div style="color:red;">{{ $message }}</div> 
                            @enderror 
                        </div> 
 
                        <div class="form-group mb-4"> 
                            <label for="Contenu" class="form-label">{{ __('Contenu du produit') }}</label> 
                            <input id="Contenu" type="text" class="form-control" name="Contenu" placeholder="Entrez le contenu du produit"> 
                            @error('Contenu') 
                                <div style="color:red;">{{ $message }}</div> 
                            @enderror 
                        </div> 
 
                        <div class="form-group mb-4"> 
                            <label for="Solde" class="form-label">{{ __('Solde du produit') }}</label> 
                            <input id="Solde" type="text" class="form-control" name="Solde" placeholder="Entrez la remise (solde)"> 
                            @error('Solde') 
                                <div style="color:red;">{{ $message }}</div> 
                            @enderror 
                        </div> 
 
                        <div class="form-group mb-4"> 
                            <label for="Img">{{ __('Image du produit') }}</label> 
                            <input id="Img" type="file" class="form-control-file" name="Img"> 
                            {{-- Pas de règle de validation pour l’image dans l’exemple, 
                                 mais vous pouvez en rajouter. --}} 
                        </div> 
 
                        <div class="form-group mb-0 text-center"> 
                            <button type="submit" class="btn btn-primary px-5 py-2"> 
                                {{ __('Ajouter le produit') }} 
                            </button> 
                        </div> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
 
<!-- Include Animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> 
@endsection 
 
<!-- Include Bootstrap 5 --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

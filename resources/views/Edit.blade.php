@extends('Master') ;
@section('title', 'Edit Products') ;
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form action="/produits/{{ $produits->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group mb-4">
        <label for="Titre" class="form-label">Title Of The Product</label>
        @error('Titre')
            <small class="text-danger d-block mb-2">{{ $message }}</small>
        @enderror
        <input 
            type="text" 
            class="form-control shadow-sm" 
            id="Titre" 
            name="Titre" 
            value="{{ old('Titre', $produits->Titre) }}" 
            style="border-radius: 8px; padding: 10px;">
    </div>
    <div class="form-group mb-4">
        <label for="Contenu" class="form-label">Contenu Of Product</label>
        @error('Contenu')
            <small class="text-danger d-block mb-2">{{ $message }}</small>
        @enderror
        <textarea 
            class="form-control shadow-sm" 
            id="Contenu" 
            name="Contenu" 
            rows="3" 
            style="border-radius: 8px; padding: 10px;">{{ old('Contenu', $produits->Contenu) }}</textarea>
    </div>
    <div class="form-group mb-4">
        <label for="Price" class="form-label">Price of the produit</label>
        @error('Price')
            <small class="text-danger d-block mb-2">{{ $message }}</small>
        @enderror
        <textarea 
            class="form-control shadow-sm" 
            id="Price" 
            name="Price" 
            rows="3" 
            style="border-radius: 8px; padding: 10px;">{{ old('Price', $produits->Price) }}</textarea>
    </div>
    <div class="form-group mb-4">
        <label for="Categorie" class="form-label">Categorie de produit</label>
        @error('Categorie')
            <small class="text-danger d-block mb-2">{{ $message }}</small>
        @enderror
        <textarea 
            class="form-control shadow-sm" 
            id="Categorie" 
            name="Categorie" 
            rows="3" 
            style="border-radius: 8px; padding: 10px;">{{ old('Categorie', $produits->Categorie) }}</textarea>
    </div>
    <div class="form-group mb-4">
        <label for="Img" class="form-label">Product Image</label>
        <input 
            id="Img" 
            type="file" 
            class="form-control-file shadow-sm" 
            name="Img" 
            style="padding: 5px;">
    </div>
    <button 
        type="submit" 
        class="btn btn-primary px-4 py-2" 
        style="border-radius: 8px; background-color: #007BFF; border: none; font-weight: bold;">
        Modifier
    </button>
</form>

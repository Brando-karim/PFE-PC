
<style>         

h1, h2 { 
    text-align: center; 
}         
table {             
    width: 100%;             
    border-collapse: collapse;             
    margin-top: 25px; 
}         
th, td { 
    border: 1px solid #ddd;             
    padding: 8px; 
}         
th { 
    background-color: #f2f2f2; 
} 
tr:nth-child(even){background-color: #f9f9f9;}         tr:hover {background-color: #ddd;} 
</style> 
</head> 

<h1>Notre Catalogue en Solde</h1> 
<h2>Liste des Produits</h2> 

<table> 
<thead> 
    <tr> 
        <th>Nom du Produit</th> 
        <th>Img</th> 
        <th>Price</th> 
        <th>Categorie</th> 
        <th>Solde</th> 
        <th>Contenu</th> 
    </tr> 
</thead> 
<tbody> 
    @foreach ($produits as $item) 
        <tr> 
            <td>{{ $item->Titre }}</td> 
            <td>
                <img src="{{ public_path($item->Img) }}" alt="{{ $item->Titre }}" style="max-width: 150px; height: auto;">
            </td>            
            <td>{{ $item->Price }} </td> 
            <td>{{ $item->Categorie }}</td> 
            <td>{{ $item->Solde }}</td> 
            <td>{{ $item->Contenu }}</td> 
        </tr> 
    @endforeach 
</tbody> 
</table> 


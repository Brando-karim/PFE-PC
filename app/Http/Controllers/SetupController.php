<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; 
use Barryvdh\DomPDF\Facade\Pdf; 

class SetupController extends Controller{
    public function getArticles(Request $req)
{

    $cat=$req->cat;
    $produits = Article::where('Categorie', '=', $cat)->paginate( $cat=="Consoles" ?  6 : 8); 
     
    return view('Produits', [ 
        'produits' => $produits, 
        'Categorie' => $cat
    ]); 
} 
public function Home(){
    $produits=Article::paginate(4);
    return view('Home',['produits'=>$produits]);
    

} 
public function EspaceAdmin(){


    $produits=Article::paginate(3);
    return view('EspaceAdmin',['products' => $produits ]);

}
public function EspaceClient(){



    return view('EspaceClient');

}
 public function cataloguepdf(){

     $produits = Article::where('Solde',"=", 1)->get();




    $data = [ 'produits' => $produits,];

     // Générer le PDF
     $pdf =Pdf::loadView('catalogue',$data);

     // Télécharger le PDF
     return $pdf->stream();




   }
}

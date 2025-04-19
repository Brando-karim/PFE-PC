<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Article;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Article::paginate(3);
        return view('Home', ['produits' => $produits]); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Addproduit');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(AddProductRequest $request)
        {
            // 1. Validate the request
            $request->validated();
            
            // 2. Create a new Article instance
            $Article = new Article();
            $Article->Titre = $request->input('Titre');
            $Article->Price = $request->input('Price');
            $Article->Categorie = $request->input('Categorie');
            $Article->Contenu = $request->input('Contenu');
            $Article->Solde = $request->input('Solde');
        
            // 3. Handle the image
            if ($request->hasFile('Img')) {
                $image = $request->file('Img');
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Save the image name to the database
                $Article->Img = "/img/$imageName";
                // Move the file after we've set the name
                $image->move(public_path('Img'), $imageName);
            }
        
            // 4. Save the article
            $Article->save();
        
            return back()->with('success', 'You have successfully added a New Product.');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produits = Article::find($id);
        return view('InfoDet', compact('produits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produits = Article::find($id);
        return view('Edit')->with('produits',$produits);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddProductRequest $request, string $id)
    {
        $request->validated();
        $produits = Article::find($id);
        $produits->Titre=$request->input('Titre');
        $produits->Price=$request->input('Price');
        $produits->Contenu=$request->input('Contenu');
        $produits->Categorie=$request->input('Categorie');
        if ($request->hasFile('Img')) {
            $image = $request->file('Img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Save the image name to the database
            $produits->Img = "/img/$imageName";
            // Move the file after we've set the name
            $image->move(public_path('Img'), $imageName);
        };
        $produits->save();
        return to_route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produits = Article::find($id); 
 
    // Supprimer l'article 
    $produits->delete(); 
 
    return back()->with('successdelete', 'Article supprimé avec succès.'); 

    }
    // Carts






    public function cart()
    {
        $cart = session()->get('cart');
        $total = 0;
    
        // Calcul du total des produits dans le panier
        if ($cart) {
            foreach ($cart as $details) {
                $total += floatval($details['prix']) * $details['quantity'];
            }
        }
    
        // Passez la variable $total à la vue
        return view('cart', compact('total'));
    }
    
    public function addToCart($id)
    {
        Log::info('Adding product to cart with ID: ' . $id);
    
        $produits = Article::find($id);
    
        if(!$produits) {
            Log::error('Product not found with ID: ' . $id);
            return redirect()->back()->with('error', 'Product not found!');
        }
    
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nom" => $produits->Titre,
                "quantity" => 1,
                "prix" => $produits->Price,
                "image" => $produits->Img ,
                "Solde"=>$produits->Solde
            ];
        }
    
        session()->put('cart', $cart);
    
        Log::info('Product added to cart successfully.');
    
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
     // update product of choose in cart
     public function updatec(Request $request)
     {
         if ($request->id && $request->quantity) {
             $cart = session()->get('cart');
     
             if (isset($cart[$request->id])) {
                 $cart[$request->id]["quantity"] = $request->quantity;
                 session()->put('cart', $cart);
             }
     
             return response()->json(['success' => 'Cart updated successfully']);
         }
     }
     
     public function removec(Request $request)
     {
         if ($request->id) {
             $cart = session()->get('cart');
            
             if (isset($cart[$request->id])) {
                 unset($cart[$request->id]);
                 session()->put('cart', $cart);
             }
     
             return response()->json(['success' => 'Product removed successfully']);
         }

     }
     






}


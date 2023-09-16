<?php
namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {

        // On récupère tous les produits
        $products = Product::all();

        // On retourne les informations des produits en JSON
        return response()->json($products);
        
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // La validation de données
        $this->validate($request, [
            'name' => 'required|max:100',
            'detail' => 'required|detail',
        ]);

        // On crée un nouveau produit
        $product = Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);

        // On retourne les informations du produit en JSON
        return response()->json($product, 201);
    }

    /**
    * Display the specified resource.
    */
    public function show(Product $product)
    {
        // On retourne les informations du produit en JSON
        return response()->json($product);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Product $product)
    {
        // La validation de données
        $this->validate($request, [
            'name' => 'required|max:100',
            'detail' => 'required|detail',
        ]);

        // On crée un nouveau produit
        $product = Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);

        // On retourne les informations du produit en JSON
        return response()->json($product);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Product $product)
    {
        //
        // On supprime le produit
        $product->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}

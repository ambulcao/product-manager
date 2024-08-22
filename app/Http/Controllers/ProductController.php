<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nome' => ['required', 'string', 'max:255'],
        'descricao' => ['required', 'string', 'max:255'],
        'preco' => ['required', 'numeric', 'min:12'],
        'data_de_validade' => ['required', 'date_format:d/m/Y'], 
        'imagem' => ['image', 'mimes:jpeg,png,jpg,gif'], 
    ]);

    // Handle image upload 
    if ($request->hasFile('imagem')) {
        $imagePath = $request->file('imagem')->store('products', 'public'); 
    } else {
        $imagePath = null; // Or set a default image path if needed
    }

    $products = Product::create(array_merge(
        $request->only(['nome', 'descricao', 'preco', 'categoria_id']),
        [
            'data_de_validade' => SupportCarbon::createFromFormat('d/m/Y', $request->input('data_de_validade')), 
            'imagem' => $imagePath, 
        ]
    ));

    return new ProductResource($products);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
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
        try {
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

            $products = Product::create([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
                'preco' => $request->input('preco'),
                'data_de_validade' => SupportCarbon::createFromFormat('d/m/Y', $request->input('data_de_validade')),
                'imagem' => $imagePath,
                'categoria_id' => $request->input('categoria_id'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return new ProductResource($products);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $products)
    {
        return new ProductResource($products);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $products)
    {
        $request->validate([
                'nome' => ['required', 'string', 'max:255'],
                'descricao' => ['required', 'string', 'max:255'],
                'preco' => ['required', 'numeric', 'min:12'],
                'data_de_validade' => ['required', 'date_format:d/m/Y'],
                'imagem' => ['image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        $products->update($request->only(['nome','descricao', 'preco', 'data_de_validade', 'imagem']));

        return new ProductResource($products);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

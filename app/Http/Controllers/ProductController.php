<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Rules\ValidSku;

class ProductController extends Controller
{
    /**
     * Display a paginated list of products.
     *
     * @param \Illuminate\Http\Request $request The incoming request containing pagination parameters.
     * @return \Illuminate\Pagination\LengthAwarePaginator Paginated list of products.
     */
    public function index(Request $request)
    {
        $request->validate([
            'page' => 'integer|min:1|max:100',
            'per_page' => 'integer|min:1|max:100',
        ]);
        
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 10);

        $products = Product::paginate($perPage, ['*'], 'page', $page);

        return $products;
    }

    /**
     * Display the specified product along with its category.
     *
     * @param int $id The ID of the product to retrieve.
     * @return \Illuminate\Database\Eloquent\Model The product with its associated category.
     */
    public function show($id)
    {
        return Product::with('category')->findOrFail($id);
    }

    /**
     * Store a newly created product in the database.
     *
     * @param \Illuminate\Http\Request $request The incoming request containing product data.
     * @return \Illuminate\Http\JsonResponse The created product in JSON format.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => ['required', 'unique:products', new ValidSku],
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    /**
     * Update the specified product in the database.
     *
     * @param \Illuminate\Http\Request $request The incoming request containing updated product data.
     * @param int $id The ID of the product to update.
     * @return \Illuminate\Http\JsonResponse The updated product in JSON format.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'sku' => ['sometimes', 'unique:products,sku,' . $product->id, new ValidSku],
            'price' => 'sometimes|numeric',
            'category_id' => 'sometimes|exists:categories,id',
        ]);

        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * Remove the specified product from the database.
     *
     * @param int $id The ID of the product to delete.
     * @return \Illuminate\Http\JsonResponse An empty response with a 204 status code.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::query();


        if ($request->has('search')) {
            $query->where('product_id', 'like', '%' . $request->search . '%')
                  ->orWhere('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('price', 'like', '%' . $request->search . '%');
        }

        
        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_order ?? 'asc');
        }

        $products = $query->paginate(4); 
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }

 
    public function store(Request $request)
    {
     
        $validated = $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
        ]);

    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

     
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

   
    public function show($id)
    {
        $product = Product::findOrFail($id); 
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
{
    // Validate the form inputs
    $validated = $request->validate([
        'product_id' => 'required|unique:products,product_id,' . $id,
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'nullable|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate image
    ]);

    // Find the product to update
    $product = Product::findOrFail($id);

    // Check if an image is uploaded
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        // Store the new image in the 'images/products' directory
        $imagePath = $request->file('image')->store('storage/', 'public');

        // Update the image path in the product data
        $validated['image'] = $imagePath;
    }

    // Update the product with validated data
    $product->update($validated);

    // Redirect with a success message
    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

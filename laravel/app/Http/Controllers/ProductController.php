<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpg,jpeg,png,gif|max:20480',
            'price' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('img')->store('products', 'public'); // Store image

        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'img' => $imagePath,
            'price' => $validated['price'],
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:20048', 
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];

        if ($request->hasFile('img')) {
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }

            $imagePath = $request->file('img')->store('products', 'public');
            $product->img = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->img) {
            Storage::disk('public')->delete($product->img); 
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}

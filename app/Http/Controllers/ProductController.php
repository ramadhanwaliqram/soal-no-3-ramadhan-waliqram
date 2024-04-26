<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        if ($request->file('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/product/', $fileName);
            $validated['image'] = $fileName;
        }

        $product = Product::create($validated);

        if ($product) {
            session()->flash('notif.success', 'Add product successfully!');
            return to_route('product.index');
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $fileName = time() . '.' . $request->image->extension();
            Storage::delete('public/images/product/' . $product->image);
            $request->image->storeAs('public/images/product/', $fileName);
            $validated['image'] = $fileName;
        }

        $product->update($validated);

        if ($product) {
            session()->flash('notif.success', 'Update product successfully!');
            return to_route('product.index');
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete('public/images/product/' . $product->image);
        $product->delete();

        if ($product) {
            session()->flash('notif.success', 'Delete product successfully!');
            return to_route('product.index');
        }

        abort(500);
    }
}

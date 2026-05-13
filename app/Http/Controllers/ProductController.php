<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = Product::all();


        return view('products.index', compact('data'));
}
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::all();
        return view('products.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = new Product;
        $data->Name = $request->input('name');
        $data->Price = $request->input('price');
        $data->Stock = $request->input('stock');
        $data->Barcode = $request->input('barcode');
        $data->category_id = $request->input('category_id');
        $data->save();
        
return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    // $data = Product::find($id);
    $data=Product::with('category')->find($id);
    return view('products.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
         $data = Product::find($id); 
    $categories = Category::all(); 
    return view('products.edit', compact('data', 'categories')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //     $data = Product::find($id);
    //     $data->Name = $request->input('name');
    //     $data->Price = $request->input('price');
    //     $data->Colour = $request->input('colour');
    //     $data->category_id = $request->input('category_id');
    //     $data->save();
     
        $data = Product::find($id);
        $data->update($request->all());
        
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

  $product = Product::findOrFail($id);
    $product->delete();

    return back();




    
    }
}

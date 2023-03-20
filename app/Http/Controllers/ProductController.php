<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = new Product();
        $allproducts = new Product();
        if ($request->search) {
            $allproducts = $allproducts->where('name', 'LIKE', "%{$request->search}%");
        }
        
        
        $request->flash();
        if (request()->has('search1')) {
            
            $products = $products->where('name','LIKE','%'.$request->search1.'%')->paginate(5);
        }
            
        else{
            $products = $products->where('type', 'LIKE', "Product")->latest()->paginate(10);
        }
        
        $products = $products->appends($request->all());
        
        
        
        $allproducts = $allproducts->latest()->paginate(10);
       
        

        if (request()->wantsJson()) {
            return ProductResource::collection($allproducts);
        }
        return view('products.index')->with('products', $products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        //
        $image_path="";
        if($request->hasFile('image'))
            $image_path = $request->file('image')->store('products', 'public');

        $product= Product::create([
            
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image_path,
            'barcode'=> $request->barcode,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
            'status'=> $request->status,    
            'type'=> 'Product',

        ]);
        
        if(!$product){
            return redirect()->back()->with('error','Sorry, there a problem happened while creating products/services'); 
        }
        return redirect()->route('products.index')->with('success','The products/services have been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        //
        $product->name= $request->name;
        $product->description= $request->description;
        
        $product->barcode= $request->barcode;
        $product->price= $request->price;
        $product->quantity= $request->quantity;
        $product->status= $request->status;
    
        if($request->hasFile('image')){

            if($product->image){
                //delete image
            Storage::delete($product->image);
            }
        
            //Store Image
            $image_path = $request->file('image')->store('products','public');
            // save 
            $product->image = $image_path;
        }    

        if(!$product->save()){
            return redirect()->back()->with('error','Sorry, there a problem happened while updating products/services'); 
        }
        return redirect()->route('products.index')->with('success','The products/services have been updated');

    }



    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        if($product->image){
            Storage::delete($product->image);

        }
        $product->delete();
        return response()->json([
            'success' => true
        ]);
    }




}

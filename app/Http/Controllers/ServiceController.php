<?php

namespace App\Http\Controllers;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = new Product();
        $request->flash();
        if ($request->search) {
            $services = $services->where('name', 'LIKE', "%{$request->search}%")->where('type', 'LIKE', "Service")->latest()->paginate(10);
        }
        
         
         else{
            $services = $services->where('type', 'LIKE', "Service")->latest()->paginate(10);
        }
        $services = $services->appends($request->all());
      
        return view('services.index')->with('services', $services);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
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
            'quantity'=> 1,
            'status'=> $request->status,    
            'type'=> 'Service',

        ]);
        
        if(!$product){
            return redirect()->back()->with('error','Sorry, there a problem happened while creating services'); 
        }
        return redirect()->route('services.index')->with('success','The services have been created');

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
    public function edit(Product $service)
    {
        //
        return view('services.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, Product $service)
    {
        //
        $service->name= $request->name;
        $service->description= $request->description;
        
        $service->barcode= $request->barcode;
        $service->price= $request->price;
        
        $service->status= $request->status;
        
    
        if($request->hasFile('image')){

            if($service->image){
                //delete image
            Storage::delete($service->image);
            }
        
            //Store Image
            $image_path = $request->file('image')->store('products','public');
            // save 
            $service->image = $image_path;
        }    

        if(!$service->save()){
            return redirect()->back()->with('error','Sorry, there a problem happened while updating products/services'); 
        }
        return redirect()->route('services.index')->with('success','The services have been updated');

    }



    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $service)
    {
        //
        if($service->image){
            Storage::delete($service->image);

        }
        $service->delete();
        return response()->json([
            'success' => true
        ]);
    }




}
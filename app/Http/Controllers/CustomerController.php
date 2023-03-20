<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerUpdateRequest;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->flash();
        if (request()->has('search')) {
            
            $customers= Customer::where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }
            
      
        else{
            $customers= Customer::latest()->orderBy("id", "desc")->paginate(5);
        }
        if (request()->wantsJson()) {
            return response(
                Customer::all()
            );
        }

        $customers = $customers->appends($request->all());
        
        return view('customers.index')->with('customers',$customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
        $customer= Customer::create([
            
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'user_id'=>$request->user()->id
            
        ]);
        
        if(!$customer){
            return redirect()->back()->with('error','Sorry, there a problem happened while creating customer'); 
        }
        return redirect()->route('customers.index')->with('success','The customer have been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        //
        $customer->name= $request->name;
        $customer->email= $request->email;
        $customer->phone= $request->phone;
        $customer->address= $request->address;
       
         

        if(!$customer->save()){
            return redirect()->back()->with('error','Sorry, there a problem happened while updating customers'); 
        }
        return redirect()->route('customers.index')->with('success','The customers have been updated');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return response()->json([
            'success'=> true
        ]); 
    }
    
}

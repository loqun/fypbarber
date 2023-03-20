<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;


class StaffController extends Controller
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
            
            $staffs = Staff::where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }
            
       
        else{
            $staffs= Staff::latest()->paginate(5);
        }
        
        $staffs = $staffs->appends($request->all());

        
        
        return view('staffs.index')->with('staffs',$staffs);
    }

    public function create()
    {
        //
        return view('staffs.create');
    }

    public function store(StaffStoreRequest $request)
    {
        

        $staff= Staff::create([
            
            'name'=> $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
           
        
        ]);
        
        if(!$staff){
            return redirect()->back()->with('error','Sorry, there a problem happened while creating staff'); 
        }
        return redirect()->route('staffs.index')->with('success','The staff have been created');

    }

    public function edit(Staff $staff)
    {
        //
        return view('staffs.edit')->with('staff', $staff);

    }

    public function destroy(Staff $staff)
    {
    
      
        $staff->delete();
        return response()->json([
            'success' => true
        ]);

    }

    public function update(StaffUpdateRequest $request, Staff $staff)
    {
        //
        $staff->name= $request->name;
        
        $staff->phone= $request->phone;
        $staff->address= $request->address;
       
         

        if(!$staff->save()){
            return redirect()->back()->with('error','Sorry, there a problem happened while updating staffs'); 
        }
        return redirect()->route('staffs.index')->with('success','The staffs have been updated');

        
    }




}

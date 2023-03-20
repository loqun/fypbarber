<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Staff;
use App\Models\Booking;
use App\Models\Slot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookingUpdateRequest;
use App\Http\Requests\BookingStoreRequest;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {  
        //
        $request->flash();
        if (request()->has('search')) {
            
            $bookings = Booking::where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }
            
        elseif (request()->has('sfilter')){

            $bookings = Booking::where('staff_id','LIKE','%'.$request->sfilter.'%')->paginate(5);
        }
        else{
            $bookings = Booking::with("staff","user","slot")->latest()->paginate(5 );
        }
        
        $bookings = $bookings->appends($request->all());

        
        $staff = Staff::all();
        

        
        // $bookings= Booking::latest()->paginate(10);
        
        
        return view('bookings.index',compact('bookings','staff'));
    }


    public function show()
    {
        
    }

    public function create()
    {
        $staffs = Staff::all();
        $users = User::all();
        $slots = Slot::all();
        
        return view('bookings.create')->with('staffs',$staffs)->with('users',$users)->with('slots',$slots);
    }

    public function testcreate()
    {
        $staffs = Staff::all();
        $users = User::all();
        $slots = Slot::all();
        
        return view('bookings.testcreate')->with('staffs',$staffs)->with('users',$users)->with('slots',$slots);
    }

    public function userappointment()
    {
        $staffs = Staff::all();
        $users = User::all();
        $slots = Slot::all();
        
        return view('userappointment')->with('staffs',$staffs)->with('users',$users)->with('slots',$slots);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        //
       
        $booking= Booking::create([
            
            'date'=> $request->date,
            'name'=> $request->name,
            'slot_id'=> $request->slot,
            'staff_id'=>$request->staff,
            'user_id'=>$request->user,
            
        ]);
        
        if(!$booking){
            return redirect()->back()->with('error','Sorry, there a problem happened while creating booking'); 
        }
        return redirect()->route('bookings.index')->with('success','The booking have been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
        $staffs = Staff::all();
        $users = User::all();
        $slots = Slot::all();
        return view('bookings.edit', compact('booking','staffs','users','slots'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(BookingUpdateRequest $request, Booking $booking)
    {
        //
        $booking->name= $request->name;
        $booking->date= $request->date;
        $booking->slot_id= $request->slot;
        $booking->staff_id= $request->staff;
        $booking->user_id= $request->user;
        
         

        if(!$booking->save()){
            return redirect()->back()->with('error','Sorry, there a problem happened while updating bookings'); 
        }
        return redirect()->route('bookings.index')->with('success','The booking have been updated');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
        $booking->delete();
        return response()->json([
            'success'=> true
        ]); 
    }

    function available_slots(Request $request, $date){

        $aslot=DB::SELECT("SELECT * FROM slots WHERE id NOT IN (SELECT slot_id FROM bookings WHERE date = '$date')ORDER BY nslot");

       

        return response()->json(['data'=>$aslot]);
      
    

    }





  
   public function userstore(BookingStoreRequest $request)
   {
       //
      
       $booking= Booking::create([
           
           'date'=> $request->date,
           'name'=> $request->name,
           'slot_id'=> $request->slot,
           'staff_id'=>$request->staff,
           'user_id'=>$request->user()->id,
           
       ]);
       
       if(!$booking){
           return redirect()->back()->with('error','Sorry, there a problem happened while creating booking'); 
       }
       else
       return redirect()->route('appointment')->with('success','The booking have been created successfully');

   }

   public function userhistory(){
    $id = Auth::id(); 
    $bookings= Booking::where('user_id',$id)->with('staff','user','slot')->latest()->paginate(3);
    return view('userhistory',compact('bookings'));

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */

   public function destroyhistory($id)
    {
        //
        Booking::destroy($id);
        return  redirect(route('userhistory'))->with('message', 'Booking has been deleted');
    }


}

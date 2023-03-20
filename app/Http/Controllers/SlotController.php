<?php

namespace App\Http\Controllers;
use App\Models\Slot;
use Illuminate\Http\Request;
use Carbon\CarbonInterval;
use App\Http\Requests\SlotStoreRequest;


class SlotController extends Controller
{
    

    public function index()
    {
        //
       

      
            $slots= Slot::latest()->paginate(9);
       
    
        
        return view('slots.index')->with('slots',$slots);
    }

    public function create()
    {
        //
        return view('slots.create');
    }

    public function store(Request $request)
    {
        

        // $slots= Slot::create([
            
        //     'nslot'=> $request->nslot,
            
        
        // ]);
        
        // if(!$slots){
        //     return redirect()->back()->with('error','Sorry, there a problem happened while creating staff'); 
        // }
        // return redirect()->route('slots.index')->with('success','The slots have been created');

    }

    public function edit(Slot $slot)
    {
        //
        return view('slots.edit')->with('slot', $slot);

    }

    public function destroy(Slot $slot)
    {
    
      
        $slot->delete();
        return response()->json([
            'success' => true
        ]);

    }

    public function update(Request $request, Slot $slot)
    {
        //
        $slot->nslot= $request->nslot;
       
       
         

        if(!$slot->save()){
            return redirect()->back()->with('error','Sorry, there a problem happened while updating slot'); 
        }
        return redirect()->route('slots.index')->with('success','The slots have been updated');

        
    }

    public function storetimeintervals(SlotStoreRequest $request){


        



        $start = $request->starttime;
        $interval = $request->interval;
        $end = $request->endtime;

        if(strtotime($end) < strtotime($start)){
			$starttime = \Carbon\Carbon::parse($start)->format("Y-m-d H:i:s");
			$endtime = \Carbon\Carbon::parse($end)->addDay(1)->format("Y-m-d H:i:s");
		} else {
			$starttime = \Carbon\Carbon::parse($start)->format("H:i:s");
			$endtime = \Carbon\Carbon::parse($end)->format("H:i:s");
		}






        $intervals = CarbonInterval::minutes($interval)->toPeriod($starttime, $endtime);


        // $period = new CarbonPeriod($starttime, $interval, $endtime); // for create use 24 hours format later change format 
        // $slots = [];
        // foreach($period as $item){
        //     array_push($slots,$item->format("h:i A"));
        // }
        
        foreach($intervals as $slot){

            $slots= Slot::create([
            
                'nslot'=> $slot->format('H:i'),
                
            
            ]);

        }
        if(!$slots){
            return redirect()->back()->with('error','Sorry, there a problem happened while creating slot'); 
        }
        return redirect()->route('slots.index')->with('success','The slots have been created');

        
    }

       



    




}

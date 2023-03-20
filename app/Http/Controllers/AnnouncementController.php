<?php

namespace App\Http\Controllers;
use App\Models\Announcement;
use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Requests\AnnouncementUpdateRequest;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        
        $request->flash();
        if (request()->has('search')) {
            
            $announcement= Announcement::where('title','LIKE','%'.$request->search.'%')->paginate(5);
        }
            
        elseif (request()->has('sfilter')){

            $announcement= Announcement::where('staff_id','LIKE','%'.$request->sfilter.'%')->paginate(5);
        }
        else{
            $announcement= Announcement::latest()->paginate(5);
        }

        $announcement = $announcement->appends($request->all());
        
        return view('announcement.index')->with('announcements',$announcement);
    }

    public function create()
    {
        //
        return view('announcement.create');
    }

    public function store(Request $request)
    {
        //
       
        $announcement= Announcement::create([
            
            'title'=> $request->title,
            'description'=> $request->description,
            'date'=> $request->date,
            
            
        ]);
        
        if(!$announcement){
            return redirect()->back()->with('error','Sorry, there a problem happened while creating announcement'); 
        }
        return redirect()->route('announcements.index')->with('success','New announcement have been created');

    }
    public function edit(Announcement $announcement)
    {
        //
        return view('announcement.edit', compact('announcement'));
    }

    public function update(AnnouncementUpdateRequest $request, Announcement $announcement)
    {
        //
        $announcement->title= $request->title;
        $announcement->description= $request->description;
        $announcement->date= $request->date;
       
         

        if(!$announcement->save()){
            return redirect()->back()->with('error','Sorry, there a problem happened while updating announcement'); 
        }
        return redirect()->route('announcements.index')->with('success','The news have been updated');

        
    }
    public function destroy(Announcement $announcement)
    {
        //
        $announcement->delete();
        return response()->json([
            'success'=> true
        ]); 
    }
    public function show()
    {
        if (request()->wantsJson()) {
            return response(
                Announcement::all()
            );
        }
        $announcement= Announcement::latest()->paginate(10);
        return view('announcement.show')->with('announcements',$announcement);;
    }


    public function userfeed(){

         $announcement= Announcement::latest()->paginate(5);
        return view('announcement.userfeed')->with('announcements',$announcement);

    }


    public function shopstatus(){

        

    }




}

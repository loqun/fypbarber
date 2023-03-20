@extends('layouts.admin')
@section('title','Announcement')
@section('content-action')

@endsection

@section('content')


<div class="container-fluid ">
    <!-- <div class="row m-2">
            <div class="m-"><h2 style="text-align: center;">Clique Barbershop News & Updates</h2></div>
    </div>
    <div class="row m-3">
            <div class="col-md-9"><h4>Latest Announcement</h4></div>
            <div class="col-md-3"><h4>Shop Status</h4></div>   
    </div> -->
    


    <div class="row m-2">

        
        <div class="col-md-9">
        
        @foreach ($announcements as $announcement) 
            <div class="card ml-1">

                <div class="card-body m-2">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <div class="post">
                                <div class="user-block">

                                    <h5 class="pl-2"style="font-weight: bold">{{$announcement->title}}</h5>
                                    <h6 class="pl-2" style="font-size: 11px;">{{$announcement->date}}</h6>

                                </div>

                                <p>{{$announcement->description}}</p>
                                <span class="float-right">-Admin</span>
                                
                                        
                            </div>
                        
                        </div>
                    </div>
                    
                </div>
                
            </div>
            @endforeach
        </div>
        <div class="col-md-3">
        
        
            <div class="card ml-1">

                <div class="card-body m-2">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <div class="post">
                                <div class="user-block">

                                    <h5 class="pl-2"style="font-weight: bold">Shop status</h5>
                                   

                                </div>

                              
                                
                                        
                            </div>
                        
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>

        


       

    </div>
   







</div>
</div>
{{$announcements->render()}}


@endsection
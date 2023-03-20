<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
     <!-- Site Metas -->
    <title>test</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">


    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .body{
        
        
        background-image: url('http://127.0.0.1:8000/assets/uploads/backgroundmedium.jpg');
        background-size: auto;
       
    }


        .card{

            background: #6b6b6b2b;




        }




    </style>

<script type="text/javascript">
      

      $crisp = [];
    @if(Auth::check()){
      
      
      CRISP_TOKEN_ID = '{{auth()->user()->chattoken;}}';
      CRISP_WEBSITE_ID = '7d9cab23-4dd3-47ed-8aaf-e89ffe58a258';
      (function(){d=document;s=d.createElement('script');s.src='//client.crisp.chat/l.js';s.async=1;d.getElementsByTagName('head')[0].appendChild(s);})();
      $crisp.push(["set", "user:email", "{{auth()->user()->email  }}"]);
    }
    @else {
      
      
    }
    @endif
    
      
      
      
      
      
    
      
      </script>  
    



    <body class="body barber-version">


@include('home.homenavbar')

<hr>

<main id="main" class="main-content grid-container" style= 'color: #404040;font-family: "Fira Sans","Trebuchet MS",Ubuntu,Helvetica,Arial,sans-serif;line-height: 1.5;text-size-adjust: none;font-size: 1rem;box-sizing: border-box; display: block; max-width: 1220px;margin: 1.25rem auto 2rem;background-color: #fff;margin-top: 2rem; padding: 1.5rem 2rem;min-height: 200px; max-height:auto; box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 6px 6px 0 rgba(0, 0, 0, 0.15);border-radius: 10px;'>
<div class="mt-3" style="font-size: 30px"> Welcome,</strong>    </div>
<div class="alert alert-info mt-3 mb-3 center"><span class="glyphicon glyphicon-alert"></span> You can check the  <b><B>News and Update</B></b> here <br>If you ever happen to found any bug or problem you can directly sent us your response<br>  </div>
<h1 class="m-4"><strong> Announcement</strong> 
   </h1>
<row>

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

        
        <div class="col-md-12">
        
        @foreach ($announcements as $announcement) 
            <div class="card m-4" style = "">
            <h5 class="card-title ml-4"style="font-weight: bold; margin-bottom: 0rem;">{{$announcement->title}}</h5>
            <h6 class="ml-4" style="font-size: 11px;">{{$announcement->date}}</h6>
                <div class="card-body m-4">
                       
                        <div class="active tab-pane" id="activity">

                            <div class="post">
                                <div class="user-block">

                                    
                                    

                                </div>

                                <p>{{$announcement->description}}</p>
                                <span class="float-right">-Admin</span>
                                
                                        
                            </div>
                        
                        </div>
                    
                    
                </div>
                
            </div>
            @endforeach
        </div>
        
        
        
           

        


       

    </div>
   







</div>
</div>
{{$announcements->render()}}



    </main>
    <hr>
    @include('home.homefooter')

   
    <script src="{{asset('assets/js/all.js')}}"></script>
    <script src="{{asset('assets/js/responsive-tabs.js')}}"></script>
    
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  
    <script type="text/javascript">
        
    
        $(document).ready(function(){
            $(".date").on('change',function(){
                var _date=$(this).val();
                $.ajax({
                    url:"{{url('appointment')}}/available-slots/"+_date,
                    dataType:'json',
                    beforeSend:function(){
                    $(".slot-list").html('<option>--- Loading ---</option>');
                     },
                    success:function(res){ 
                        
                    var _html='';
                    $.each(res.data,function(index,row){
                        _html+='<option value="'+row.id+'">'+row.nslot+'</option>';
                    });
                    $(".slot-list").html(_html);
                    
                    
                    }
                });
                
            });
        });

        
        
  
       
       
    </script>


</body>
</html>

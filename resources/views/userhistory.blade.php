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
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    
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

    #history{
        
  margin: auto;
  width: 50%;
  height:80%;
  border: 3px solid green;
  padding: 10px;

          
    }

    .body{
        background-image: url('http://127.0.0.1:8000/assets/uploads/parallax_20.jpg');
        border-radius: 10px;
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
    






</head>
<body class="body barber-version">


@include('home.homenavbar')

<hr>

<main id="main" class="main-content grid-container" style= 'color: #404040;font-family: "Fira Sans","Trebuchet MS",Ubuntu,Helvetica,Arial,sans-serif;line-height: 1.5;text-size-adjust: none;font-size: 1rem;box-sizing: border-box; display: block; max-width: 1220px;margin: 1.25rem auto 2rem;background-color: #fff;margin-top: 2rem; padding: 1.5rem 2rem;min-height: 600px; max-height:1500px; box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 6px 6px 0 rgba(0, 0, 0, 0.15);border-radius: 10px;'>
<div class="mt-3" style="font-size: 30px"> Welcome,<strong>{{auth()->user()->name;}}</strong>    </div>
<div class="alert alert-danger mt-3 mb-3"><span class="glyphicon glyphicon-alert"></span> Please check your recent booking <b><B>BOOKING DETAILS</B></b> here. You can either delete the existing booking or cancel your booking by clicking delete . <br>If you ever happen to found any bug or problem you can directly sent us your response<br>  </div>
<h1 class="m-4"><strong> Booking History</strong> 
   </h1>
   
<row>

@if(\Session::has('message'))

    
        <div class="alert alert-success " style="width:70%;margin: auto; margin-bottom: 2rem;">
        {!! \Session::get('message') !!}
        </div>




   



@endif






@if(count($bookings)==0)

<div><p class="text-center">No record of history yet</p></div>

@endif


@foreach($bookings as $booking)

                <div class="card " style="width:70%;margin: auto;box-shadow:10px; background-color: ">
                    <div class="card-block">
                        <h4 class="card-title pricing-ti text-center"> 
                            Booking details
                        </h4>
                        <div class="line-pricing ">
                            <h5 class ="mt-1">Booking ID = {{$booking->id}}</h5>
                            <h5 class ="mt-1">Name = {{$booking->name}}</h5>
                            <h5 class ="mt-1">Date = {{$booking->date}}</h5>
                            <h5 class ="mt-1">Slot = {{$booking->slot->nslot}}</h5>
                            <h5 class ="mt-1">Timestamp = {{$booking->created_at}}</h5>

                            
                        </div>
                        <div class="container ">
                            <div class="col-md-12 text-center">
                                <!-- <form action="{{  route( 'deletehistory', $booking->id )  }}" method = "POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" >Delete Booking</button>
                                </form> -->
                                <button  data-url = "{{  route( 'deletehistory', $booking->id )  }}"class="btn btn-warning btn-delete" >Delete Booking</button>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="mt-3"> </div>
                <div class="mt-3"> </div>
                <hr>

@endforeach
{{$bookings->render()}}
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
        
        
    
        $(document).ready(function () {
            $(document).on('click', '.btn-delete', function () {
                $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this bookings?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {_method: 'DELETE', _token: '{{csrf_token()}}'}, function (res) {
                           
                    
                        })
                        if (result.isConfirmed) {
                                    Swal.fire(
                                    'Success!',
                                    'Booking have been deleted',
                                    'success'
                                    )
                                }
                            setTimeout("location.reload(true);", 1000);


                    }

                })
            })
        })
       
       
    </script>


</body>
</html>

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

    .card-body{
        height: 450px;
    }

    .card1{
        
  margin: auto;
  width: 70%;
  box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 4px 4px 0 rgba(0, 0, 0, 0.15);
  font-family: Montserrat;
  
  border-radius: 10px;

          
    }
    .card-title{
        color: #ffffff;
    }

    .card-header{
        background: #c26435;
    }

    .body{
        
        height: 1000px;
        background-image: url('http://127.0.0.1:8000/assets/uploads/parallax_20.jpg');
       
    }

    .btn-primary {
  color: #fff;
  background-color: #c26435;
  border-color: #c26435;
}
.btn-primary:hover {
  color: #fff;
  background-color: #6e381d;
  border-color: #6e381d;
}
.btn-check:focus + .btn-primary, .btn-primary:focus {
  color: #fff;
  background-color: #6e381d;
  border-color: #6e381d;
  box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
}
.btn-check:checked + .btn-primary, .btn-check:active + .btn-primary, .btn-primary:active, .btn-primary.active, .show > .btn-primary.dropdown-toggle {
  color: #fff;
  background-color: #6e381d;
  border-color: #6e381d;
}
.btn-check:checked + .btn-primary:focus, .btn-check:active + .btn-primary:focus, .btn-primary:active:focus, .btn-primary.active:focus, .show > .btn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
}
.btn-primary:disabled, .btn-primary.disabled {
  color: #fff;
  background-color: #c26435;
  border-color: #c26435;
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
<body class="body">

@include('home.homenavbar')
<main id="main" class="main-content grid-container" style= 'color: #404040;font-family: "Fira Sans","Trebuchet MS",Ubuntu,Helvetica,Arial,sans-serif;line-height: 1.5;text-size-adjust: none;font-size: 1rem;box-sizing: border-box; display: block; max-width: 1220px;margin: 1.25rem auto 2rem;background-color: #fff;margin-top: 2rem; padding: 1.5rem 2rem;min-height: 800px; max-height:1500px;  box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 6px 6px 0 rgba(0, 0, 0, 0.15);border-radius: 10px;'>
    <div class="mt-3" style="font-size: 30px"> Welcome,<strong>{{auth()->user()->name;}}</strong>    </div>
    <div class="alert alert-info mt-3 mb-3"><span class="glyphicon glyphicon-alert"></span> Please fill this form and submit for booking your session <b><B>right</B></b> here. You can choose date and your preferred barber, If there is no slot available, please pick another date . If you ever happen to found any bug or problem you can directly sent us your response  </div>
    <h2 class="m-3"> </h2>
    <div class="card1 mt-3 mb-3" style="overflow:auto">
        <div class="card-header">   
        <h3 class="card-title" style="font-family: Montserrat;" >BOOKING APPOINTMENT</h3>
        </div>
        <div class="card-body">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif
    

            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           placeholder=" Name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control date @error('date') is-invalid @enderror" id="date"
                           placeholder="Date" value="{{ old('date') }}" >
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                <label for="slot">Timeslot</label>
                <select name="slot" id="slot" class="form-control slot-list  @error('slot') is-invalid @enderror" id="slot"
                           placeholder="Slot" value="{{ old('slot') }}" style="" >                                                                  
                  
                       
                    </select>
                    @error('slot')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               

                <div class="controls">
                <label for="staff">Preferred barber</label>
                <select name="staff" required     id="staff" class="form-control  @error('staff') is-invalid @enderror" id="staff"
                           placeholder="Staff" value="{{ old('staff') }}" >                                                                  
                    @foreach($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->name }}
                        </option>                                                                                               
                    @endforeach
                    </select>
                    @error('staff')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-primary mt-3 mb-2 float-right "style="display:inline-block;float:left" type="submit">Book</button>
                
                
                
            </form>
        </div>
    


    </div >
</main>
@include('home.homefooter')




    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/all.js')}}"></script>
    <script src="{{asset('assets/js/responsive-tabs.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
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
                    $("#slot").removeAttr("disabled");
                   
                    if(Object.keys(res.data).length == 0){
                         _html='<option value="" required>'+'Today bookings is full. Please choose another date'+'</option>';
                         $('#slot').prop('disabled', 'disabled');
                    }
                    
                    $(".slot-list").html(_html);
                    
                    
                    }
                });
                
            });
        });

        var today = new Date();
        var md = String(today.getDate()+14).padStart(2, '0');
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        maxweek = yyyy + '-' + mm + '-' + md;
        $('#date').attr('min',today);
        $('#date').attr('max',maxweek);

        
        
        
        
        
  
       
       
    </script>


</body>
</html>
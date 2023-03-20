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

</head>
<body class="barber_version" style= "background-color:#6e381d;">

      @yield('section1')
   
      @yield('script1')
</body>
</html>


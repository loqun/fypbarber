<header class="top-navbar" style = "position: sticky;
    top: 0;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('assets/images/logoori.png')}}" style="width: 100px;" alt="" />
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbars-rs-food">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="{{route('userhome')}}" id="">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('userfeed')}}" >Announcement</a></li>
                            @if (Auth::check())
                            <li class="nav-item"><a class="nav-link" href="{{route('appointment')}}" >Appointment</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Appointment</a></li>
                            @endif
                            @if (Auth::check())
                            <li class="nav-item"><a class="nav-link" href="{{route('userhistory')}}" >Booking History</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Booking History</a></li>
                            @endif
                            
                            <li class="nav-item dropdown">
                            @if (Auth::check())
                            
                            <a class="nav-link dropdown-toggle ui" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                {{Auth::user()->name}}   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #010101; margin-left:3px;">
                            <a href="#" class="nav-link" onclick = "document.getElementById('logout-form').submit()">Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
                            @csrf
                             </form>
                            </a>
                            </div>

                            @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log In</a></li>
                            @endif
                           
                            
                           
                        </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
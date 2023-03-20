<div class="copyrights">
                <div class="container">
                    <div class="footer-distributed">
                        <div class="footer-left">
                            <p class="footer-links">
                                <a href="{{route('userhome')}}">Home</a>
                                <a href="{{route('userfeed')}}">Announcement</a>
                                 @if (Auth::check())
                                <a  href="{{route('appointment')}}" >Appointment</a>
                                @else
                                <a  href="{{route('login')}}">Appointment</a>
                                @endif
                                @if (Auth::check())
                                <a  href="{{route('userhistory')}}" >Booking History</a>
                                @else
                                <a  href="{{route('login')}}">Booking History</a>
                                @endif
                            
                              
                            </p>
                            <p class="footer-company-name">All Rights Reserved. &copy; 2023 <a href="#">CliqueBarber</a> Design By : <a href="https://html.design/">LOK</a></p>
                        </div>
                    </div>
                </div><!-- end container -->
            </div><!-- end copyrights -->
        </div>
        
       
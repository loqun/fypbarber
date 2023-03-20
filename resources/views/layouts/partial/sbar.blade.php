

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('image/logo.jpg')}}"  class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CliqueAdmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->getAvatar()}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->getName()}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{activeSegment('home')}}">
            <i class="fa-solid fa-gauge"></i>
              <p class = "ml-2">
                Dashboard 
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link {{activeSegment('products')}}">
            <i class="fa-solid fa-cart-shopping"></i>
            <p class = "ml-2">
                Commodity 
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('customers.index')}}" class="nav-link {{activeSegment('customers')}}">
              <i class="fa-solid fas fa-user-group"></i>
              <p class = "ml-2">
                Customers
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('cart.index')}}" class="nav-link {{activeSegment('cart')}}">
                <i class="fa-solid fa-cash-register"></i>
                <p class = "ml-2">
                 POS (Point of Sales)
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('orders.index')}}" class="nav-link {{activeSegment('orders')}}">
              <i class="fa-solid fa-money-check-dollar"></i>
              <p class = "ml-2">
                 Sales Lists
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{route('services.index')}}" class="nav-link {{activeSegment('services')}}">
               <i class="fa-solid fa-scissors"></i>
               <p class = "ml-2">
                 Services Lists
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{route('staffs.index')}}" class="nav-link {{activeSegment('staffs')}}">
            <i class="fa-solid fa-people-group"></i>
            <p class = "ml-2">
                 Staffs Lists
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{route('announcements.index')}}" class="nav-link {{activeSegment('announcements')}}">
            <i class="fa-solid fa-bullhorn"></i>
            <p class = "ml-2">
                 Announcement
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{route('bookings.index')}}" class="nav-link {{activeSegment('bookings')}}">
            <i class="fa-sharp fa-solid fa-bookmark"></i>
            <p class = "ml-2">
                 Booking
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{route('slots.index')}}" class="nav-link {{activeSegment('slots')}}">
            <i class="fa-solid fa-check-to-slot"></i>
            <p class = "ml-2">
                 Slot
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" onclick = "document.getElementById('logout-form').submit()">
            <i class= "fa-solid fa-right-from-bracket"></i>
            <p class = "ml-2">
                Logout
              </p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
              </form>
            </a>
            
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

   
    <!-- /.sidebar-custom -->
  </aside>

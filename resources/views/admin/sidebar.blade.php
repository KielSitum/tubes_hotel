<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="title">
          <h2>Hi, Admin</h2>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li><a href="{{url('home')}}"> <i class="icon-home"></i>Home </a></li>
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Room</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('create_room')}}">Add Room</a></li>
                  <li><a href="{{url('view_room')}}">View Rooms</a></li>
                </ul>
              </li>

              <li>
                <a href="{{('bookings')}}"> <i class="icon-home"></i>Bookings</a>
              </li>
              <li>
                <a href="{{url('view_gallery')}}"> <i class="icon-home"></i>Gallery</a>
              </li>

              <li>
                <a href="{{url('all_messages')}}"> <i class="icon-home"></i>Messages</a>
              </li>

      </ul>
    </nav>

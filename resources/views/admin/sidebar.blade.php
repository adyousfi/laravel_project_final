<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admin_template/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Admin EHB</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">

        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a href="{{ url('admin/dashboard') }}"> <i class="icon-grid"></i>Contact-us page panel </a>
        </li>

        <li class="{{ Request::is('admin/manage_users') ? 'active' : '' }}">
        <a href="{{url('admin/manage_users') }}"> <i class="icon-grid"></i>Manage users </a>
        </li>

        <li class="{{ Request::is('admin/news') ? 'active' : '' }}">
        <a href="{{ url('admin/news') }}">
        <i class="icon-grid"></i>News Items</a>
        </li>

        <li class="{{ Request::is('admin/faqs') ? 'active' : '' }}">
        <a href="{{ route('admin.faqs.index') }}">
        <i class="icon-grid"></i>Manage FAQ</a>
        </li>

                
                
      </ul>
    </nav>

   
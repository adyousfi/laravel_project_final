<header class="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="navbar-header">
        <!-- Navbar Header -->
        <a href="" class="navbar-brand">
          <div class="brand-text brand-big visible text-uppercase">
            <strong class="text-primary">Dark</strong><strong>Admin</strong>
          </div>
          <div class="brand-text brand-sm">
            <strong class="text-primary">D</strong><strong>A</strong>
          </div>
        </a>
        <!-- Sidebar Toggle Btn -->
        <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
      </div>
      <!-- Log out -->
      <div class="list-inline-item logout">
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
          @csrf
          <button type="submit" class="btn btn-primary d-flex align-items-center">
            <i class="fa fa-sign-out-alt mr-2"></i>
            Logout
          </button>
        </form>
      </div>
    </div>
  </nav>
</header>

<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{ route('home') }}">
          <span>
            Referee Shop
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>

            <li>
            <a class="nav-link" href="{{ route('shop') }}">Shop</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('news.index') }}">News items</a> 
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('profiles.index') }}">Profiles</a>
            </li>

              @if (Auth::check())
            <li class="nav-item">
            <a class="nav-link" href="{{ route('messages.inbox') }}">Inbox</a>
            </li>
              @endif

              @if (Auth::check())
            <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">Edit profile</a>
            </li>
              @endif
          </ul>
        

        <div class="user_option">
        

          @if (Route::has('login'))

          @auth 

          <a href="">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          </a>

         
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
         @csrf
        <button type="submit" class="btn nav_search-btn">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
          Logout
        </button>
        </form>


          @else

            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>


            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>

                Register

              </span>
            </a>
          @endauth 
          @endif 

           
          </div>
        </div>
      </nav>
    </header>
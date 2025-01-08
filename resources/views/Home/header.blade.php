<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Referee Shop
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.html">
                Shop
              </a>
              <li class="nav-item">
                <a class="nav-link" href="about.html">
                  About us
                </a>
              </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
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
            <a class="nav-link" href="{{ route('profile.edit') }}">Profiel bewerken</a>
            </li>
              @endif
          </ul>

          <div class="user_option">
        

          @if (Route::has('login'))

          @auth 

          <a href="">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          </a>

         

          <form style="padding: 10px" method="POST" action="{{ route('logout') }}">
                            @csrf

                           <input class="btn-danger" type="submit" value="logout">

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
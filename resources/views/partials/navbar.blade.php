      <div class="page-header row">
        <div class="header-logo-wrapper col-auto">
          <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="" /><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_light.png') }}" alt="" /></a></div>
        </div>
        <div class="col-4 col-xl-4 page-title">
          <h4 class="f-w-700">Dashboard</h4>
          <nav>
            <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
              <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"> </i></a></li>
              <li class="breadcrumb-item f-w-400">Dashboard</li>
              <li class="breadcrumb-item f-w-400 active">Dashboard</li>
            </ol>
          </nav>
        </div>
        <!-- Page Header Start-->
        <div class="header-wrapper col m-0">
          <div class="row">
            <form class="form-inline search-full col" action="#" method="get">
              <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                  <div class="u-posRelative">
                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Mofi .." name="q" title="" autofocus>
                    <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                  </div>
                  <div class="Typeahead-menu"></div>
                </div>
              </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
              <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a></div>
              <div class="toggle-sidebar">
                <svg class="stroke-icon sidebar-toggle status_toggle middle">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#toggle-icon') }}"></use>
                </svg>
              </div>
            </div>
            <div class="nav-right col-xxl-8 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
              <ul class="nav-menus">
                <li> <span class="header-search">
                    <svg>
                      <use href="{{ asset('assets/svg/icon-sprite.svg#search') }}"></use>
                    </svg></span></li>
                <li class="onhover-dropdown">
                  <div class="notification-box">
                    <svg>
                      <use href="{{ asset('assets/svg/icon-sprite.svg#notification') }}"></use>
                    </svg><span class="badge rounded-pill badge-primary">{{ $totalNotifications }}</span>
                  </div>
                  <div class="onhover-show-div notification-dropdown">
                    <h5 class="f-18 f-w-600 mb-0 dropdown-title">Notitications </h5>
                    <ul class="notification-box">
                    @foreach($latestNotifications as $notification)
                      <li class="d-flex">
                        <div class="flex-grow-1">
                          <a href="{{ route('notifications.view-notifications') }}">
                            <h6>{{ $notification->name }}</h6>
                          </a>
                          <p>{{ $notification->description }}</p>
                        </div>
                      </li>
                      @endforeach
                      <li><a class="f-w-700" href="{{ route('notifications.view-notifications') }}">View all </a></li>
                    </ul>
                  </div>
                </li>
                <li class="onhover-dropdown">
                  <div class="notification-box">
                    <svg>
                      <use href="{{ asset('assets/svg/icon-sprite.svg#header-message') }}"></use>
                    </svg><span class="badge rounded-pill badge-info">3 </span>
                  </div>
                  <div class="onhover-show-div notification-dropdown">
                    <h5 class="f-18 f-w-600 mb-0 dropdown-title">Messages </h5>
                    <ul class="messages">
                      <li class="d-flex b-light1-primary gap-2">
                        <div class="flex-shrink-0"><img src="{{ asset('assets/images/dashboard-2/user/1.png') }}" alt="Graph"></div>
                        <div class="flex-grow-1">
                          <a href="private-chat.html">
                            <h6 class="font-primary f-w-600">Hackett Yessenia</h6>
                          </a>
                          <p>Hello Miss...&#128522;</p>
                        </div><span>10 min.</span>
                      </li>
                      <li class="d-flex b-light1-secondary gap-2">
                        <div class="flex-shrink-0"><img src="{{ asset('assets/images/dashboard-2/user/2.png') }}" alt="Graph"></div>
                        <div class="flex-grow-1">
                          <a href="private-chat.html">
                            <h6 class="font-secondary f-w-600">schneider Adan</h6>
                          </a>
                          <p>Wishing You a Happy Birthday Dear.. 🥳&#127882;</p>
                        </div><span>25 min.</span>
                      </li>
                      <li class="d-flex b-light1-success gap-2">
                        <div class="flex-shrink-0"><img src="{{ asset('assets/images/dashboard-2/user/3.png') }}" alt="Graph"></div>
                        <div class="flex-grow-1">
                          <a href="private-chat.html">
                            <h6 class="font-success f-w-600">Mahdi Gholizadeh</h6>
                          </a>
                          <p>Hello Dear!! This Theme Is Very beautiful</p>
                        </div><span>1 hours</span>
                      </li>
                      <li><a class="f-w-700" href="email-application.html">Check all</a></li>
                    </ul>
                  </div>
                </li>
                <li class="profile-nav onhover-dropdown px-0 py-0">
                  <div class="d-flex profile-media align-items-center">
                  <img class="img-30" src="{{ Auth::user()->profile_image ? asset('assets/profile_images/' . Auth::user()->profile_image) : asset('assets/images/dashboard/profile.png') }}" alt="">
                      <div class="flex-grow-1"><span>{{ Auth::user()->name }}</span>
                      @if(auth()->check() && auth()->user()->role == 0)
                      <p class="mb-0 font-outfit">Administrator <i class="fa fa-angle-down"></i></p>
                      @endif
                      @if(auth()->check() && auth()->user()->role == 1)
                      <p class="mb-0 font-outfit">Financial Advisor<i class="fa fa-angle-down"></i></p>
                      @endif
                    </div>
                  </div>
                  <ul class="profile-dropdown onhover-show-div">
                    <li><a href="profile"><i data-feather="user"></i><span>Account </span></a></li>
                    <li><a href="inbox"><i data-feather="mail"></i><span>Inbox</span></a></li>
                    <li>
                      <a onclick="document.getElementById('logout_form').submit();">
                        <i data-feather="log-in"></i>
                        <span>Log Out</span>
                      </a>
                      <form action="{{route('logout')}}" method="POST" id="logout_form"> @csrf </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Page Header Ends                              -->
      </div>
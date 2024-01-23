{{-- <!--  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <ul class="navbar-nav">
       <li class="nav-item">
           <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
   </ul>
   
   <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown user-menu">
           <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
               <img src="https://www.KryptoniumTheOG.com/images/KryptoniumTheOG-Small.png"
                    class="user-image img-circle elevation-2" alt="User Image">
               <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
           </a>
           <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <li class="user-header bg-primary">
                   <img src="https://www.KryptoniumTheOG.com/images/KryptoniumTheOG-Small.png"
                        class="img-circle elevation-2"
                        alt="User Image">
                   <p>
                       {{ Auth::user()->name }}
                       <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                   </p>
               </li>
               <li class="user-footer">
                   <a href="#" class="btn btn-default btn-flat disabled">Profile</a>
                   <a href="#" class="btn btn-default btn-flat float-right"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Sign out
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                   </form>
               </li>
           </ul>
       </li>
   </ul>
   </nav>
   --> --}}

@inject('imageCacheService', 'App\Services\ImageCacheService')

@php
    $imageUrl = 'https://www.logodesign.net/logo/disk-combined-with-camera-shutter-562ld.png?size=180x180';
    $base64Image = $imageCacheService->getCachedImage($imageUrl);
@endphp



<!-- Main Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block" style="display: none;">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                <img src="data:image/png;base64,{{ $base64Image }}" class="user-image img-circle elevation-2"
                    alt="User Image">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                <!-- User image -->
                <div class="text-center mb-3">
                    <img src="data:image/png;base64,{{ $base64Image }}" class="img-circle elevation-2" alt="User Image"
                        width="60" height="60">
                    <small class="d-block mt-2">Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                </div>
                <!-- Dropdown Menu Links -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item py-2" href="/billing">Billing</a>
                {{-- <a class="dropdown-item py-2 disabled" href="#">Profile</a> --}}
                <a class="dropdown-item py-2" href="/edit_profiles">Profile</a>
                {{-- <a class="dropdown-item py-2" href="#">Another link</a> --}}
                <!-- Sign out link -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item py-2" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

        {{-- place for toggle button --}}
        @if (view()->exists('categories.js.categories_js'))
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                    role="button" onclick="toggleSidebar()">
                    <i class="fas fa-tags"></i>
                </a>
            </li>
        @endif
    </ul>
</nav>

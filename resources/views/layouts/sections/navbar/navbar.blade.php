@php
$containerNav = ($configData['contentLayout'] === 'compact') ? 'container-xxl' : 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');
@endphp

<!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
<nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme" id="layout-navbar">
@endif
@if(isset($navbarDetached) && $navbarDetached == '')
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="{{$containerNav}}">
@endif

@if(isset($navbarFull))
<div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
  <a href="{{url('/')}}" class="app-brand-link gap-2">
    <span class="app-brand-logo demo">
      @include('_partials.macros',["height"=>20])
    </span>
    <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
  </a>
</div>
@endif

@if(!isset($navbarHideToggle))
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="ti ti-menu-2 ti-sm"></i>
  </a>
</div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

  @if($configData['hasCustomizer'] == true)
  <!-- Style Switcher -->
  <div class="navbar-nav align-items-center">
    <div class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <i class='ti ti-md'></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
        <li>
          <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
            <span class="align-middle"><i class='ti ti-sun me-2'></i>Light</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
            <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
            <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!--/ Style Switcher -->
  @endif

  <div style="text-align: center; width: 100%; background-color: #151B54;">
    <h2 style="color: #e28743;">Energy And Water Regulatory Authority</h2>
  </div>

  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          @if(Auth::check())
          <span>{{ Auth::user()->first_name }}</span>
      @else
          <span>Guest</span>
      @endif
      
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0);' }}">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="">
                  {{-- <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/avatars/2.png') }}" alt class="h-auto rounded-circle"> --}}
                </div>
              </div>
              <div class="flex-grow-1">
                <span class="fw-medium d-block">
                  @if (Auth::check())
                  {{ Auth::user()->first_name }}
                  @else
                  user
                  @endif
                </span>
                <small class="text-muted">User</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          {{-- <a class="dropdown-item" href="#">
            <i class="ti ti-user me-2 ti-sm"></i>
            <span class="align-middle">My Profile</span>
          </a> --}}
        </li>
        
        @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
        <li>
          <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
            <i class='ti ti-key me-2 ti-sm'></i>
            <span class="align-middle">API Tokens</span>
          </a>
        </li>
        @endif
        @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <h6 class="dropdown-header">Manage Team</h6>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
            <i class='ti ti-settings me-2'></i>
            <span class="align-middle">Team Settings</span>
          </a>
        </li>
        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
        <li>
          <a class="dropdown-item" href="{{ route('teams.create') }}">
            <i class='ti ti-user me-2'></i>
            <span class="align-middle">Create New Team</span>
          </a>
        </li>
        @endcan
        @if (Auth::user()->allTeams()->count() > 1)
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <h6 class="dropdown-header">Switch Teams</h6>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        @endif
        @endif
        <li>
          <div class="dropdown-divider"></div>
        </li>
        @if (Auth::check())
        <li>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class='ti ti-logout me-2'></i>
            <span class="align-middle">Logout</span>
          </a>
        </li>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
          @csrf
        </form>
        @else
        <li>
          <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : url('auth/login') }}">
            <i class='ti ti-login me-2'></i>
            <span class="align-middle">Login</span>
          </a>
        </li>
        @endif
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>

@if(!isset($navbarDetached))
</div>
@endif
</nav>
<!-- / Navbar -->

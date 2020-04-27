<nav class="navbar navbar-expand-md  navbar-light bg-white shadow-sm sticky-top">
<div class="container">
    <div class="row" id="menu">
      <div class="col-sm-3 d-12 top-left-menu d-flex align-items-center">
         <div class="navbar-header">
         <a href="{{'admin'}}" class="navbar-brand">
                    <h1>HEXIAN</h1>
                </a>

        </div>
        <button class="navbar-toggler ml-auto" type="button"
        data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
        aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
       </button>


                {{-- <a  class="header-refresh ml-auto" data-toggle="tooltip" data-html="true" title="Refresh data" data-delay="500">
                    <span class="fa fa-user"></span>
                </a> --}}

        </div>
          <div class="collapse navbar-collapse ml-auto" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                @if (Auth::guard()->getGuard() === 'staff')
                                   {{ Auth::user()->title.'  '.Auth::user()->lastname}} <img src="{{asset('storage/images/logo.png')}}" width="60" height="40" alt="" class="img-rounded">
                                   @elseif(Auth::guard()->getGuard()==='students'):
                                        {{ Auth::user()->firstname.'  '.Auth::user()->lastname}} <img src="{{asset('storage/images/logo.png')}}" width="60" height="40" alt="" class="img-rounded">

                                   @else
                                   {{ Auth::user()->name}} <img src="{{asset('storage/images/logo.png')}}" width="60" height="40" alt="" class="img-rounded">
                                @endif

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                @switch(Auth::guard()->getGuard())

                                    @case('staff')
                                    <a class="dropdown-item" href="{{ route('staff.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a href="#" class="dropdown-item">
                                    {{_('Edit Profile')}}
                                </a>
                                <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @break

                                    @case('admin')
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a href="#"  class="dropdown-item">
                                    {{_('Edit Profile')}}
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                 @break

                                 @case('students')
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a href="#" class="dropdown-item">
                                    {{_('Edit Profile')}}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                    @default

                                @endswitch
                            </div>
                        </li>
            </ul>
          </div>
    </div>
</div>


</nav>

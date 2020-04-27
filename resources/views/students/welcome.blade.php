<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

</head>
<body>
  <div id="app">
        @include('partials.header')
        <div class="container-fluid">

            <div class="row">
                    <div id="side-menu" class="col-sm-3">

                            <div class="profile-block">
                                    <img src="{{asset('storage/images/logo.png')}}" alt="" class="rounded d-none d-sm-block">

                                    </div>

                                    <ul class="nav nav-pills flex-column" id="navbarNavAltMarkup">
                                             <li class="nav-item">
                                            <a class="nav-link" href="#"  role="button" >
                                            <i class="fa fa-euro-sign"></i>
                                                Financial Statement
                                            </a>
                                            </li>
                                             <li class="nav-item">
                                            <a class="nav-link" href="#"  role="button" >
                                            <i class="fa fa-euro-sign"></i>
                                                View Invoice
                                            </a>
                                            </li>
                                             <li class="nav-item">
                                            <a class="nav-link" href="#"  role="button" >
                                            <i class="fa fa-book"></i>
                                                Results
                                            </a>
                                            </li>
                                              <li class="nav-item">
                                            <a class="nav-link" href="#"  role="button" >
                                            <i class="fa fa-user"></i>
                                               View Profile
                                            </a>
                                            </li>
                                              <li class="nav-item">
                                            <a class="nav-link" href="#"  role="button" >
                                            <i class="fa fa-book"></i>
                                               Course Material
                                            </a>
                                            </li>
                                              <li class="nav-item">
                                            <a class="nav-link" href="#"  role="button" >
                                            <i class="fa fa-book"></i>
                                               Courses On Offer
                                            </a>
                                            </li>

                                        </ul>


                                </div>

            <div id="main" class="offset-sm-3 col-sm-9">
                @yield('content')
        </div>
  </div>
  </div>
         </div>
         </div>
  </div>

  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>

{{--
    @stack('scripts')

    @if(Route::currentRouteName() === "admin")
        {!! $chart->script() !!}
        {!! $cherry->script() !!}
        {!! $bar->script() !!}
    @endif --}}

</body>


</html>

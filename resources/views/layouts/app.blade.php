<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ระบบบันทึกคำรับรอง') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('/logo/logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('../../css/app.css') }}" rel="stylesheet">

</head>

<body style="background-color: rgb(231, 229, 229)">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container">
                <img src="{{ url('/logo/logo.png') }}" alt="LOGO" width="45" height="60">

                <a class="navbar-brand p-md-2" href="{{ route('home') }}">
                    {{ 'ระบบบันทึกคำรับรอง มหาวิทยาลัยทักษิณ' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link"
                                href="{{ route('page.create') }}">{{ __('+เพิ่มตัวชี้วัด') }}</a></li>
                        {{-- <li><a class="nav-link" href="{{ route('home.add_exp_ind') }}">{{ __('+ตัวชี้วัffด') }}</a></li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                document.getElementById('manage_user').submit();">
                                        {{ __('จัดการผู้ใช้') }}
                                    </a>
                                    <form id="manage_user" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                document.getElementById('manage_data').submit();">
                                        {{ __('จัดการข้อมูล') }}
                                    </a>
                                    <form id="manage_data" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form> --}}



                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>

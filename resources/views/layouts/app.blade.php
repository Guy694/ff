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
                    @if (Auth::user()->agency_id != 1)
                        <ul class="navbar-nav mr-auto">
                            <li><a class="nav-link"
                                    href="{{ route('page.create') }}">{{ __('+เพิ่มตัวชี้วัด') }}</a></li>

                        </ul>
                    @else

                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::user()->agency_id == 1)
                                        {{ 'Administrator' }}
                                    @elseif (Auth::user()->agency_id ==2) {{ 'คณะเทคโนโลยีและการพัฒนาชุมชน' }}
                                    @elseif (Auth::user()->agency_id ==3) {{ 'คณะนิติศาสตร์' }}
                                    @elseif (Auth::user()->agency_id ==4) {{ 'คณะพยาบาลศาสตร์' }}
                                    @elseif (Auth::user()->agency_id ==5) {{ 'คณะมนุษยศาสตร์และสังคมศาสตร์' }}
                                    @elseif (Auth::user()->agency_id ==6) {{ 'คณะวิทยาการสุขภาพและการกีฬา' }}
                                    @elseif (Auth::user()->agency_id ==7) {{ 'คณะวิทยาศาสตร์' }}
                                    @elseif (Auth::user()->agency_id ==8) {{ 'คณะวิศวกรรมศาสตร์' }}
                                    @elseif (Auth::user()->agency_id ==9) {{ 'คณะศิลปกรรมศาสตร์' }}
                                    @elseif (Auth::user()->agency_id ==10) {{ 'คณะศึกษาศาสตร์' }}
                                    @elseif (Auth::user()->agency_id ==11) {{ 'คณะเศรษฐศาสตร์และบริหารธุรกิจ' }}
                                    @elseif (Auth::user()->agency_id ==12) {{ 'คณะอุตสาหกรรมเกษตรและชีวภาพ' }}
                                    @elseif (Auth::user()->agency_id ==13) {{ 'วิทยาลัยการจัดการเพื่อการพัฒนา' }}
                                    @elseif (Auth::user()->agency_id ==14) {{ 'วิทยาลัยนานาชาติ' }}
                                    @elseif (Auth::user()->agency_id ==15) {{ 'บัณฑิตวิทยาลัย' }}
                                    @elseif (Auth::user()->agency_id ==16)
                                        {{ 'สำนักส่งเสริมการบริการวิชาการและภูมิปัญชุมชน' }}
                                    @elseif (Auth::user()->agency_id ==17) {{ 'สถาบันทักษิณคดีศึกษา' }}
                                    @elseif (Auth::user()->agency_id ==18)
                                        {{ 'สถาบันปฏิบัติการชุมชนเพื่อการศึกษาแบบบูรณาการ' }}
                                    @elseif (Auth::user()->agency_id ==19) {{ 'สถาบันวิจัยและพัฒนา' }}
                                    @elseif (Auth::user()->agency_id ==20) {{ 'สำนักคอมพิวเตอร์' }}
                                    @elseif (Auth::user()->agency_id ==21) {{ 'สำนักหอสมุด' }}
                                    @elseif (Auth::user()->agency_id ==22) {{ 'ฝ่ายการคลังและทรัพย์สิน' }}
                                    @elseif (Auth::user()->agency_id ==23) {{ 'ฝ่ายกิจการนิสิตวิทยาเขตพัทลุง' }}
                                    @elseif (Auth::user()->agency_id ==24) {{ 'ฝ่ายกิจการนิสิตวิทยาเขตสงขลา' }}
                                    @elseif (Auth::user()->agency_id ==25) {{ 'ฝ่ายตรวจสอบภายใน' }}
                                    @elseif (Auth::user()->agency_id ==26) {{ 'ฝ่ายนิติการ' }}
                                    @elseif (Auth::user()->agency_id ==27) {{ 'ฝ่ายบริหารกลางและทรัพยากรบุคคล' }}
                                    @elseif (Auth::user()->agency_id ==28) {{ 'ฝ่ายบริหารงานสภามหาวิทยาลัย' }}
                                    @elseif (Auth::user()->agency_id ==29) {{ 'ฝ่ายบริหารวิทยาเขตพัทลุง' }}
                                    @elseif (Auth::user()->agency_id ==30) {{ 'ฝ่ายบริหารวิทยาเขตสงขลา' }}
                                    @elseif (Auth::user()->agency_id ==31) {{ 'ฝ่ายประกันคุณภาพการศึกษา' }}
                                    @elseif (Auth::user()->agency_id ==32) {{ 'ฝ่ายแผนงาน' }}
                                    @elseif (Auth::user()->agency_id ==33) {{ 'ฝ่ายวิชาการ' }}
                                    @elseif (Auth::user()->agency_id ==34) {{ 'งานวิเทศสัมพันธ์' }}
                                    @elseif (Auth::user()->agency_id ==35)
                                        {{ 'สำนักบ่มเพาะวิชาการเพื่อวิสาหกิจในชุมชน' }}
                                    @else
                                        {{ 'ฝ่ายสื่อสารองค์กร' }}
                                    @endif

                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->agency_id == 1)


                                        <a class="dropdown-item" href="{{ route('home.userlist') }}">
                                            {{ __('จัดการผู้ใช้') }}
                                        </a>

                                        {{-- <a class="dropdown-item" href="{{ route('home.managedata') }}">
                                            {{ __('จัดการข้อมูล') }}
                                        </a> --}}

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                         document.getElementById('logout-form').submit();">
                                            {{ __('ออกจากระบบ') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                    document.getElementById('logout-form').submit();">
                                            {{ __('ออกจากระบบ') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    @endif




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

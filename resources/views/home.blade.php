@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md">
                @if ($message = Session::get('success'))
                    <div class=" alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div>
                    @if (Auth::user()->user_type == 'MANAGE' || Auth::user()->user_type == 'ETC')
                        <a class="btn btn-warning"
                            href="{{ route('page.create2', Auth::user()->agency_id) }}">{{ __('+เพิ่มผลลัพธ์') }}</a>
                    @else

                    @endif

                </div>


                {{-- เช็คประเภทหน่วยงาน --}}
                @if (Auth::user()->user_type == 'MANAGE' || Auth::user()->user_type == 'ETC')
                    @if ($relat != null)
                        <div class="card">
                            @if ($relat == null)
                                <div class="card-header bg-primary text-white">{{ __('ไม่มีข้อมูล') }}</div>
                            @else
                                <div class="card-header text-white bg-primary d-flex justify-content-between">
                                    {{ 'ตารางคำรับรองตัวชี้วัด' }} <a href="{{ route('home.generatedocx') }}"
                                        class="text-white">{{ 'ดาวน์โหลดไฟล์ ' }}<img
                                            src="{{ url('/logo/msword.png') }}" alt="LOGO" width="25" height="25"></div>
                                </a>
                            @endif

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <table class="table table-bordered" style="width: 100%">
                                    <tr align='center'>
                                        <th rowspan="2" style="vertical-align: middle;width: 40%">ตัวชี้วัด</th>
                                        {{-- <th rowspan="2" style="vertical-align: middle;width: 10%">หน่วย</th> --}}
                                        <th colspan="2" style="width: 20%">ผลการดำเนินงานย้อนหลัง</th>
                                        <th rowspan="2" style="vertical-align: middle;width: 10%">ค่าเป้าหมาย 2564</th>
                                        <th rowspan="2" style="vertical-align: middle;width: 5%">หมายเหตุ</th>
                                        <th rowspan="2" style="vertical-align: middle;width: 20%">การจัดการ</th>

                                    </tr>
                                    <tr align='center'>
                                        <th style="width: 10%">2562</th>
                                        <th style="width: 10%">2563</th>
                                    </tr>


                                    @foreach ($relat as $row)

                                        <tr class=" font-weight-bold">

                                            <td>{{ $row->indicator_list_name }}
                                            </td>

                                            <td></td>
                                            <td></td>
                                            {{-- <td></td> --}}
                                            <td></td>
                                            <td></td>
                                            <td align='right'>
                                                <form action="{{ route('page.destroy', $row->ind_id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('exp.show', $row->ind_id) }}"
                                                        class="btn btn-primary ">เพิ่มตัวชี้วัด</a>
                                                    {{-- <a href="{{ route('page.edit', $row->ind_id) }}"
                                                    class="btn btn-primary ">แก้ไข</a> --}}
                                                    <button type="submit" class="btn btn-danger show_confirm"
                                                        data-toggle="tooltip">ลบ</button>
                                                </form>
                                            </td>
                                        </tr>


                                        @foreach ($subrelat as $sub)
                                            @if ($row->ind_id == $sub->parent_id)
                                                <tr>
                                                    <td>{{ $sub->exind_num_name }} {{ $sub->exind_name }}</td>
                                                    {{-- <td align='center'>
                                                    {{ $sub->value_type }}
                                                </td> --}}
                                                    <td align='center'>
                                                        {{ $sub->num2562 }}
                                                    </td>
                                                    <td align='center'>

                                                        {{ $sub->num2563 }}
                                                    </td>
                                                    <td align='center'>
                                                        {{ $sub->target2564 }}
                                                    </td>
                                                    @if ($sub->symbol_name == 'วงกลม')
                                                        <td align='center'>
                                                            <img src="{{ url('/logo/circle.png') }}" alt="ICON"
                                                                width="15" height="15">
                                                        </td>
                                                    @elseif($sub->symbol_name == 'ข้าวหลามตัด')
                                                        <td align='center'>
                                                            <img src="{{ url('/logo/rhombus.png') }}" alt="ICON"
                                                                width="15" height="15">
                                                        </td>
                                                    @elseif($sub->symbol_name == 'ดอกจัน')
                                                        <td align='center'>
                                                            <img src="{{ url('/logo/asterisk.png') }}" alt="ICON"
                                                                width="15" height="15">
                                                        </td>
                                                    @elseif($sub->symbol_name == 'ฉ-เฉพาะ')
                                                        <td align='center'>
                                                            ฉ
                                                        </td>
                                                    @else
                                                        <td align='center'>
                                                        </td>
                                                    @endif
                                                    <td align='right'>
                                                        <form action="{{ route('exp.destroy', $sub->exind_id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="{{ route('exp.show_side', $sub->exind_id) }}"
                                                                class="btn btn-primary ">เพิ่มตัวย่อย</a>
                                                            <a href="{{ route('exp.edit', $sub->exind_id) }}"
                                                                class="btn"
                                                                style="background-color: orange">แก้ไข</a>
                                                            <button type="submit" class="btn btn-danger show_confirm_ex"
                                                                data-toggle="tooltip">ลบ</button>
                                                        </form>
                                                    </td>
                                                    @foreach ($sub_sub as $side)

                                                        @if ($sub->exind_id == $side->exind_id)
                                                <tr>

                                                    <td>{{ $side->ex_side_list_name }}
                                                    </td>
                                                    <td align='center'>
                                                        {{ $side->num2562 }}
                                                    </td>
                                                    <td align='center'>

                                                        {{ $side->num2563 }}
                                                    </td>
                                                    <td align='center'>
                                                        {{ $side->target2564 }}
                                                    </td>
                                                    <td></td>
                                                    <td align='right'>
                                                        <form
                                                            action="{{ route('exp.destroy_side', $side->ex_side_list_id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="{{ route('exp.edit_side', $side->ex_side_list_id) }}"
                                                                class="btn"
                                                                style="background-color: orange">แก้ไข</a>
                                                            <button type="submit" class="btn btn-danger">ลบ</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            @endif
                                        @endforeach
                                        </tr>
                                    @endif
                    @endforeach
                @endforeach

                </table>
            </div>
        </div>
        @endif










    @elseif(Auth::user()->user_type == 'ACADEMIC')

        @if ($relat_is_academic != null)
            <div class="card">
                @if ($relat_is_academic == null)
                    <div class="card-header bg-primary text-white">{{ __('ไม่มีข้อมูล') }}</div>
                @else
                    <div class="card-header text-white bg-primary d-flex justify-content-between">
                        {{ 'ตารางคำรับรองตัวชี้วัด' }} <a href="{{ route('home.generatedocx_is') }}"
                            class=" text-white">{{ 'ดาวน์โหลดไฟล์ ' }}<img src="{{ url('/logo/msword.png') }}"
                                alt="LOGO" width="25" height="25">
                        </a></div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered" style="width: 100%">
                        <tr align='center'>
                            <th rowspan="2" style="vertical-align: middle;width: 40%">ตัวชี้วัด</th>
                            {{-- <th rowspan="2" style="vertical-align: middle;width: 10%">หน่วย</th> --}}
                            <th colspan="2" style="width: 20%">ผลการดำเนินงานย้อนหลัง</th>
                            <th rowspan="2" style="vertical-align: middle;width: 15%">ค่าเป้าหมาย 2564</th>
                            <th rowspan="2" style="vertical-align: middle;width: 20%">การจัดการ</th>

                        </tr>
                        <tr align='center'>
                            <th style="width: 10%">2562</th>
                            <th style="width: 10%">2563</th>
                        </tr>

                        @foreach ($relat_is_academic as $row_is)

                            <tr class=" font-weight-bold">

                                <td>{{ $row_is->ind_name }}
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align='right'>
                                    {{-- <form action="{{ route('page.destroy', $row->ind_id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf --}}
                                    <a href="{{ route('exp.show_is', ['exp' => $row_is->ind_id, 'exp2' => $row_is->ind_type]) }}"
                                        class="btn btn-primary ">เพิ่มตัวชี้วัด</a>
                                    {{-- </form> --}}
                                </td>
                            </tr>

                            @foreach ($subrelat_is_academic as $sub_is)
                                @if ($row_is->ind_id == $sub_is->parent_id)
                                    <tr>
                                        <td>{{ $sub_is->exind_name }}</td>
                                        <td align='center'>
                                            {{ $sub_is->num2562 }}
                                        </td>
                                        <td align='center'>

                                            {{ $sub_is->num2563 }}
                                        </td>
                                        <td align='center'>
                                            {{ $sub_is->target2564 }}
                                        </td>

                                        <td align='right'>
                                            <form action="{{ route('exp.destroy', $sub_is->exind_id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('exp.show_exside', $sub_is->exind_id) }}"
                                                    class="btn btn-primary ">เพิ่มตัวย่อย</a>
                                                <a href="{{ route('exp.edit_is', $sub_is->exind_id) }}"
                                                    style="background-color: orange" class="btn">แก้ไข</a>
                                                <button type="submit" class="btn btn-danger show_confirm_ex"
                                                    data-toggle="tooltip">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @foreach ($sub_side_is_academic as $sub_side)

                                        @if ($sub_is->exind_id == $sub_side->exind_id)
                                            <tr>

                                                <td>{{ $sub_side->ex_side_list_name }}
                                                </td>
                                                <td align='center'>
                                                    {{ $sub_side->num2562 }}
                                                </td>
                                                <td align='center'>

                                                    {{ $sub_side->num2563 }}
                                                </td>
                                                <td align='center'>
                                                    {{ $sub_side->target2564 }}
                                                </td>

                                                <td align='right'>
                                                    <form
                                                        action="{{ route('exp.destroy_exside', $sub_side->ex_side_list_id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('exp.edit_exside', $sub_side->ex_side_list_id) }}"
                                                            class="btn "
                                                            style="background-color: orange">แก้ไข</a>
                                                        <button type="submit" class="btn btn-danger ">ลบ</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endif
                                    @endforeach
                                @endif

                            @endforeach
                        @endforeach

                    </table>
                </div>
            </div>
        @endif

    @else
        {{-- /ADMIN --}}
        @endif


    </div>
    </div>
    </div>
    </div>
    </div>




    {{-- confirm delete alert------------------------------------------------------------------------------------------------------------------ --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        // เตือนลบตัวย่อย
        $('.show_confirm').click(function(event) {

            var form = $(this).closest("form");

            var name = $(this).data("name");

            event.preventDefault();

            swal({

                    title: `ต้องการลบหรือไม่`,

                    text: "หากทำการลบผลลัพธ์นี้ ตัวชี้วัดและตัวย่อยในผลลัพธ์นี้จะถูกลบไปด้วย",

                    icon: "warning",

                    buttons: true,

                    dangerMode: true,

                })

                .then((willDelete) => {

                    if (willDelete) {

                        form.submit();

                    }

                });

        });




        // เตือนลบตัวชี้วัด
        $('.show_confirm_ex').click(function(event) {

            var form = $(this).closest("form");

            var name = $(this).data("name");

            event.preventDefault();

            swal({

                    title: `ต้องการลบหรือไม่`,

                    text: "หากทำการลบตัวชี้วัดนี้ ตัวย่อยในตัวชี้วัดจะถูกลบไปด้วย",

                    icon: "warning",

                    buttons: true,

                    dangerMode: true,

                })

                .then((willDelete) => {

                    if (willDelete) {

                        form.submit();

                    }

                });

        });
    </script>
@endsection

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

                <div class="card">
                    @if ($relat == null)
                        <div class="card-header bg-primary text-white">{{ __('ไม่มีข้อมูล') }}</div>
                    @else
                        <div class="card-header text-white bg-primary d-flex justify-content-between">
                            {{ 'ตารางคำรับรองตัวชี้วัด' }} <a href="http://"
                                class=" text-white">{{ 'ดาวน์โหลดไฟล์' }}</a></div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($relat != null)
                            <table class="table table-bordered" style="width: 100%">
                                <tr align='center'>
                                    <th rowspan="2" style="vertical-align: middle;width: 40%">ตัวชี้วัด</th>
                                    <th rowspan="2" style="vertical-align: middle;width: 10%">หน่วย</th>
                                    <th colspan="2" style="width: 20%">ผลการดำเนินงานย้อนหลัง</th>
                                    <th rowspan="2" style="vertical-align: middle;width: 15%">ค่าเป้าหมาย 2564</th>
                                    <th rowspan="2" style="vertical-align: middle;width: 15%">การจัดการ</th>

                                </tr>
                                <tr align='center'>
                                    <th style="width: 10%">2562</th>
                                    <th style="width: 10%">2563</th>
                                </tr>

                                @foreach ($relat as $row)

                                    <tr class=" font-weight-bold">
                                        @if ($row->ind_num_name != null)
                                            <td><a href="{{ route('exp.show', $row->ind_id) }}">{{ $row->ind_num_name }}
                                                    {{ $row->ind_name }}</a>
                                            </td>
                                        @else
                                            <td><a href="{{ route('exp.show', $row->ind_id) }}">{{ $row->ind_name }}</a>
                                            </td>
                                        @endif
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td align='center'>
                                            <form action="{{ route('page.destroy', $row->ind_id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('page.edit', $row->ind_id) }}"
                                                    class="btn btn-primary ">แก้ไข</a>
                                                <button type="submit" class="btn btn-danger">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>


                                    @foreach ($subrelat as $sub)
                                        @if ($row->ind_id == $sub->parent_id)
                                            <tr>
                                                <td>{{ $sub->exind_name }}</td>
                                                <td align='center'>
                                                    {{ $sub->value_type }}
                                                </td>
                                                <td align='center'>
                                                    @if ($sub->num2562 == null)
                                                        {{ $sub->num2562 }}
                                                    @else
                                                        {{ number_format($sub->num2562, 2) }}
                                                    @endif

                                                </td>
                                                <td align='center'>
                                                    @if ($sub->num2563 == null)
                                                        {{ $sub->num2563 }}
                                                    @else
                                                        {{ number_format($sub->num2563, 2) }}
                                                    @endif

                                                </td>
                                                <td align='center'>
                                                    @if ($sub->target2564 == null)
                                                        {{ $sub->target2564 }}
                                                    @else
                                                        {{ number_format($sub->target2564, 2) }}
                                                    @endif

                                                </td>
                                                <td align='center'>
                                                    <form action="{{ route('exp.destroy', $sub->exind_id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('exp.edit', $sub->exind_id) }}"
                                                            class="btn btn-primary ">แก้ไข</a>
                                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach

                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

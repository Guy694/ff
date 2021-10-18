@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">{{ __('ตารางคำรับรองตัวชี้วัด') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <table class="table" style="width: 100%" border="1">
                            <tr align='center'>
                                <th rowspan="2" style="vertical-align: middle;width: 50%">ตัวชี้วัด</th>
                                <th colspan="2" style="width: 20%">ผลการดำเนินงานย้อนหลัง</th>
                                <th rowspan="2" style="vertical-align: middle;width: 15%">ค่าเป้าหมาย 2564</th>
                                <th rowspan="2" style="vertical-align: middle;width: 15%">การจัดการ</th>

                            </tr>
                            <tr align='center'>
                                <th style="width: 10%">2562</th>
                                <th style="width: 10%">2563</th>
                            </tr>

                            @foreach ($relat as $row)

                                <tr>
                                    <td><a href="">{{ $row->ind_name }}</a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align='center'>

                                    </td>
                                </tr>
                                @foreach ($subrelat as $sub)
                                    @if ($row->ind_id == $sub->parent_id)
                                        <tr>
                                            <td><a
                                                    href="{{ route('exp.create', $sub->exind_id) }}">{{ $sub->exind_name }}</a>
                                            </td>
                                            <td align='center'>{{ $sub->value_type }} {{ $sub->num2562 }}</td>
                                            <td align='center'>{{ $sub->value_type }} {{ $sub->num2563 }}</td>
                                            <td align='center'>{{ $sub->value_type }} {{ $sub->target2564 }}</td>
                                            <td align='center'>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

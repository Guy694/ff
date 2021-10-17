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
                        <tr  align='center'>
                            <th  rowspan="2" style="vertical-align: middle;width: 55%">ตัวชี้วัด</th>
                            <th  colspan="2" style="width: 20%">ผลการดำเนินงานย้อนหลัง</th>
                            <th  rowspan="2" style="vertical-align: middle;width: 15%">ค่าเป้าหมาย 2564</th>
                            <th  rowspan="2" style="vertical-align: middle;width: 5%">แก้ไข</th>
                            <th  rowspan="2" style="vertical-align: middle;width: 5%">ลบ</th>
                        </tr>
                        <tr  align='center'>
                            <th  style="width: 10%">2562</th>
                            <th  style="width: 10%">2563</th>
                        </tr>
@php
    $alldata = $data
@endphp

                        @foreach ($data as $ind )

                          <tr>
                            <td>{{$ind['ind_name'] }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @php
                             $current_id = $ind->exind_id;
                        @endphp
                        @foreach ($alldata as $exp)

                         <tr>
                            <td>{{$exp['exind_name']}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        @endforeach

                        @endforeach
                      </table>










                </div>
            </div>
        </div>
    </div>
</div>
@endsection

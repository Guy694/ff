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
                    @if ($userdata == null)
                        <div class="card-header bg-primary text-white">{{ __('ไม่มีข้อมูล') }}</div>
                    @else
                        <div class="card-header text-white bg-primary d-flex justify-content-between">
                            {{ 'ตารางผู้ใช้งาน' }} <a href="{{ route('home.register') }}"
                                class=" text-white">{{ '+เพิ่มผู้ใช้' }}</a>
                        </div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($userdata != null)
                            <table class="table table-bordered" style="width: 100%">
                                <tr align='center'>
                                    <th style="vertical-align: middle;width: 10%">ที่</th>
                                    <th style="width: 30%">ชื่อผู้ใช้</th>
                                    <th style="vertical-align: middle;width: 40%">หน่วยงาน</th>
                                    <th style="vertical-align: middle;width: 20%">การจัดการ</th>

                                </tr>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($userdata as $row)

                                    <tr align='center'>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->username }}</td>
                                        <td>{{ $row->username }}</td>
                                        <td>
                                            <form action="{{ route('home.destroy', $row->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('home.edit', $row->id) }}"
                                                    class="btn btn-primary ">แก้ไข</a>
                                                <button type="submit" class="btn btn-danger">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

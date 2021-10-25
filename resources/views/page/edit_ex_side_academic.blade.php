@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                {{-- เช็คเออเร่อ --}}
                @if ($errors->any())
                    <div class=" alert alert-danger">
                        <strong>อุ๊ฟๆๆ</strong>
                        มีปัญหาในการบันทึกข้อมูล <br> <br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- เช็คเออเร่อ --}}
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        {{ __('แก้ไขรายการย่อย') }}{{ $datapost->ex_side_list_name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('exp.update_exside', $datapost->ex_side_list_id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">รายการย่อย</label>
                                        <input type="text" class="form-control" name="ex_side_list_name" placeholder=""
                                            value="{{ $datapost->ex_side_list_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2562</label><label for=""
                                        class=" text-danger">&nbsp(กรณีไม่มีใส่ N/a)</label>
                                    <input type="text" class="form-control" name="num2562"
                                        value="{{ $datapost->num2562 }}" placeholder="">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2563</label><label for=""
                                        class=" text-danger">&nbsp(กรณีไม่มีใส่ N/a)</label>
                                    <input type="text" class="form-control" name="num2563"
                                        value="{{ $datapost->num2563 }}" placeholder="">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">ค่าเป้าหมาย ปี 2564</label>
                                    <input type="text" class="form-control" name="target2564"
                                        value="{{ $datapost->target2564 }}" placeholder="">
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">แก้ไข</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

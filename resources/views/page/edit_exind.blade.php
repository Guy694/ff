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
                        {{ __('แก้ไขตัวชี้วัด') }} {{ $datapost->exind_num_name }} {{ $datapost->exind_name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('exp.update', $datapost->exind_id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="" class="form-label">ตัวชี้วัดที่</label>
                                        <input type="text" class="form-control" name="exind_num_name" placeholder="7.1-1"
                                            value="{{ $datapost->exind_num_name }}" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">ตัวชี้วัด</label>
                                        <input type="text" class="form-control" name="exind_name"
                                            placeholder="ด้านการจัดการศึกษา" value="{{ $datapost->exind_name }}" required>
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
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">หมายเหตุ</label>
                                    <select class="form-control" name="symbol_id" aria-label="Default select example"
                                        required>

                                        @foreach ($datasymbol as $symbol_item)
                                            <option value="{{ $symbol_item->symbol_id }}"
                                                {{ $datapost->symbol_id == $symbol_item->symbol_id ? 'selected="selected"' : '' }}>
                                                {{ $symbol_item->symbol_name }}</option>
                                        @endforeach
                                    </select>
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

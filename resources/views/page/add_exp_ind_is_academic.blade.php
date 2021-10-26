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
                        {{ __('ผลลัพธ์') }}{{ $dataexp->ind_name }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('exp.store_is') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label for="" class="form-label">ตัวชี้วัด</label>
                                    <select class="form-control" name="exind_name" aria-label="Default select example"
                                        required>
                                        <option selected value="">กรุณาเลือก</option>
                                        @foreach ($exind_list as $item)
                                            if()
                                            <option value="{{ $item->exindicator_list_name }}">
                                                {{ $item->exindicator_list_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2562</label><label for=""
                                        class=" text-danger">&nbsp(กรณีไม่มีใส่ N/A)</label>
                                    <input type="text" class="form-control" name="num2562" value="" placeholder="">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2563</label><label for=""
                                        class=" text-danger">&nbsp(กรณีไม่มีใส่ N/A)</label>
                                    <input type="text" class="form-control" name="num2563" value="" placeholder="">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">ค่าเป้าหมาย ปี 2564</label>
                                    <input type="text" class="form-control" name="target2564" value="" placeholder="">
                                </div>
                                <input type="number" name="parent_id" hidden value="{{ $dataexp->ind_id }}">
                            </div>




                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">บันทึก</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

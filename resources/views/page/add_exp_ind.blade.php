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
                        {{ __('ตัวชี้วัด ............................................') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('exp.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="" class="form-label">ตัวชี้วัดที่</label>
                                        <input type="text" class="form-control" name="exind_num_name" placeholder="7.1-1"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">ชื่อตัวชี้วัด</label>
                                        <input type="text" class="form-control" name="exind_name"
                                            placeholder="ด้านการจัดการศึกษา" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">หน่วย</label>
                                        <select class="form-control" name="value_type"
                                            aria-label="Default select example">
                                            <option selected>กรุณาเลือก</option>
                                            <option value="คะแนน">คะแนน</option>
                                            <option value="ร้อยละ">ร้อยละ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2562</label>
                                    <input type="text" class="form-control" name="num2562" value="" placeholder="">
                                </div>
                                <div class="col-3">
                                    <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2563</label>
                                    <input type="text" class="form-control" name="num2563" value="" placeholder="">
                                </div>
                                <div class="col-3">
                                    <label for="" class="form-label">ค่าเป้าหมาย ปี 2564</label>
                                    <input type="text" class="form-control" name="target2564" value="" placeholder="">
                                </div>
                                <input type="number" name="parent_id" hidden value="{{ $dataexp->ind_id }}">
                            </div>


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

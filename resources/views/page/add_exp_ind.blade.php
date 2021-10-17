@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('ตัวชี้วัด ............................................') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                      <div class="row">
                        <div class="col-3">
                            <label for="" class="form-label">ตัวชี้วัดที่</label>
                            <input type="text" class="form-control" id="num_indicator" name="num_indicator" placeholder="7.1-1">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">ชื่อตัวชี้วัด</label>
                            <input type="text" class="form-control" id="name_indicator" name="name_indicator" placeholder="ด้านการจัดการศึกษา">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                      <div class="mb-3">
                        <label for="" class="form-label">หน่วย</label>
                        <select class="form-control" aria-label="Default select example">
                            <option selected>กรุณาเลือก</option>
                            <option value="คะแนน">คะแนน</option>
                            <option value="ร้อยละ">ร้อยละ</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-3">
                        <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2562</label>
                        <input type="text" class="form-control" id="name_indicator" name="name_indicator" placeholder="">
                    </div>
                    <div class="col-3">
                        <label for="" class="form-label">ผลการดำเนินงานย้อนหลัง ปี 2563</label>
                        <input type="text" class="form-control" id="name_indicator" name="name_indicator" placeholder="">
                    </div>
                    <div class="col-3">
                        <label for="" class="form-label">ค่าเป้าหมาย</label>
                        <input type="text" class="form-control" id="name_indicator" name="name_indicator" placeholder="">
                    </div>
                </div>


                      <div class="row">
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                      </div></div>








                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('ผลลัพธ์') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <div class="row">
                        <div class="col-3">
                            <label for="" class="form-label">ผลลัพธ์</label>
                            <input type="text" class="form-control" id="num_result" name="num_result" placeholder="7.1">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">ด้าน</label>
                            <input type="text" class="form-control" id="name_result" name="name_result" placeholder="ด้านการจัดการศึกษา">
                        </div>
                      </div>
                      <br>
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

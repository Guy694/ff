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
                    <form action="{{ route('page.store')}}" method="post">
                        @csrf
                           <div class="row">
                        <div class="col-3">
                            <label for="" class="form-label">ผลลัพธ์</label>
                            <input type="text" class="form-control"  name="ind_num_name" placeholder="7.1">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">ด้าน</label>
                            <input type="text" class="form-control"  name="ind_name" placeholder="ด้านการจัดการศึกษา">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                      <div class="col-12">
                        <button type="submit"  class="btn btn-primary">บันทึก</button>
                      </div></div>
                    </form>









                </div>
            </div>
        </div>
    </div>
</div>
@endsection

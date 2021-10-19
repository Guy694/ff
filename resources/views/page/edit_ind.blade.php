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
                    <div class="card-header text-white bg-primary">{{ __('แกไขผลลัพธ์') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('page.update', $datapost->ind_id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <label for="" class="form-label">ผลลัพธ์</label>
                                    <input type="text" class="form-control" name="ind_num_name" placeholder="7.1"
                                        value="{{ $datapost->ind_num_name }}" required>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">ด้าน</label>
                                    <input type="text" class="form-control" name="ind_name"
                                        placeholder="ด้านการจัดการศึกษา" value="{{ $datapost->ind_name }}" required>
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

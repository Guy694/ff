@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                        {{ __('เพิ่มผู้ใช้งาน') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('home.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="col">
                                    <label for="" class="form-label">ชื่อผู้ใช้ : Uername</label>
                                    <input type="text" class="form-control" name="username" placeholder="">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-3">
                                <div class="col">
                                    <label for="" class="form-label">รหัสผ่าน : Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <div class="col">
                                    <label for="" class="form-label">หน่วยงาน</label>
                                    <select class="form-control" name="agency_id" aria-label="Default select example"
                                        required>
                                        <option selected value="">กรุณาเลือก</option>
                                        @foreach ($agency as $row)
                                            <option value="{{ $row->agency_id }}">{{ $row->agency_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">บันทึก</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

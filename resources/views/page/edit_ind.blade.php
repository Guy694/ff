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
                                        value="{{ $datapost->ind_num_name }}">
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">ด้าน</label>
                                    <select class="form-control" name="ind_name" aria-label="Default select example"
                                        required>

                                        @foreach ($ind_list as $item)
                                            <option value="{{ $item->indicator_list_id }}"
                                                {{ $drop_listed->ind_name == $item->indicator_list_id ? 'selected' : '' }}>
                                                {{ $item->indicator_list_name }}</option>
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




    <option {{ old('name') == $key ? 'selected' : '' }} value="{{ $value }}">






    @endsection

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
                        {{ __('ผลลัพธ์') }}@if ($dataexp->ind_name == '1')
                            {{ '7.1 ผลลัพธ์ด้านการเรียนรู้ของผู้เรียน และด้านกระบวนการ' }}
                        @elseif( $dataexp->ind_name == '2')
                            {{ '7.2 ผลลัพธ์ด้านการมุ่งเน้นลูกค้า' }}
                        @elseif( $dataexp->ind_name == '3')
                            {{ '7.3 ผลลัพธ์ด้านการมุ่งเน้นบุคลากร' }}
                        @elseif( $dataexp->ind_name == '4')
                            {{ '7.4 ผลลัพธ์ด้านการนำองค์การและการกำกับดูแล' }}
                        @else
                            {{ '7.5 ผลลัพธ์ด้านงบประมาณ การเงิน และตลาด' }}
                        @endif

                    </div>

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
                                        <input type="text" class="form-control" name="exind_num_name" required
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">ตัวชี้วัด</label>
                                        <input type="text" class="form-control" name="exind_name" placeholder="" required>
                                    </div>
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
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">หมายเหตุ</label>
                                    <select class="form-control" name="symbol_id" aria-label="Default select example">
                                        <option selected value="">กรุณาเลือก</option>
                                        @foreach ($symbol as $symbol_item)
                                            <option value="{{ $symbol_item->symbol_id }}">
                                                {{ $symbol_item->symbol_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<table border="1">
    <tr>
        <th>agency_id</th>
        <th>name</th>
    </tr>
    @foreach ($tsu_agencies as $tsu)
    <tr>
        <td>{{$tsu['agency_id']}}</td>
        <td>{{$tsu['agency_name']}}</td>
    </tr>

    @endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

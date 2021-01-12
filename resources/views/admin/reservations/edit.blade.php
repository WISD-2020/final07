@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯訂單 <small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 訂單管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.reservations.update', $reservations->id) }}" method="POST" role="form">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label> 實紀入住時間：</label>
                    <input name="checkin" class="form-control" value="{{ old('reservations', $reservations->checkin) }}">
                </div>

                <div class="form-group">
                    <label>實紀退房時間：</label>
                    <input name="checkout" class="form-control" value="{{ old('reservations', $reservations->checkout) }}">
                </div>

                <div class="form-group">
                    <label for="price">總額：</label>
                    <input name="price" class="form-control" value="{{ old('reservations', $reservations->cost) }}">
                </div>

                <div class="form-group">
                    <label for="states">狀態：</label>
                    <select id="states" name="states" class="form-control " >
                        <option value="已訂房" selected {{ old('states', $reservations->states) }}>已訂房</option>
                        <option value="已入住"{{ old('states', $reservations->states) }}>已入住</option>
                        <option value="已退房"{{ old('states', $reservations->states) }}>已退房</option>
                    </select>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">更新</button>
                </div>

            </form>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection

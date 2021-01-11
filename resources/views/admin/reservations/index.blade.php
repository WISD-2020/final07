@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                所有訂單 <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> 訂單管理
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="5%" style="text-align: center">訂單編號</th>
                            <th width="10%" style="text-align: center">使用者ID</th>
                            <th width="15%" style="text-align: center">預定日期</th>
                            <th width="15%" style="text-align: center">實際入住時間</th>
                            <th width="15%" style="text-align: center">預定退房日期</th>
                            <th width="15%" style="text-align: center">實際退房時間</th>
                            <th width="10%" style="text-align: center">總額</th>
                            <th width="10%" style="text-align: center">狀態</th>
                        </tr>
                        </thead>
                        @foreach($reservations as $reservations)
                            <tr>
                                <td>{{$reservation->id}}</td>
                                <td>{{$reservation->user_id}}</td>
                                <td>{{($reservation->reservation_in)}}</td>
                                <td>{{($reservation->checkin)}}</td>
                                <td>{{($reservation->reservation_out)}}</td>
                                <td>{{($reservation->checkout)}}</td>
                                <td>{{($reservation->cost)}}</td>
                                <td>{{($reservation->states)}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.reservations.edit', $reservation->id) }}">編輯</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
@endsection

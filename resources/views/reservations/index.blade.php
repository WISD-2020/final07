@extends('layouts.master')

@section('title', 'Blue Owl-Reservation List')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('public/images/room03.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>我的訂房記錄</h1>
                        <span class="subheading">Reservation List</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <h3>共 {{count($reservations)}} 筆訂房記錄</h3>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th nowrap class="text-left">訂單編號</th>
                <th nowrap class="text-center">訂單日期</th>
                <th nowrap class="text-right">訂單狀態</th>
            </tr>
            @forelse($reservations as $reservation)
                <tr>
                    <td class="text-left">
                        <a href="reservation/{{ $reservation->id }}"> 00{{ $reservation->id }}</a>
                    </td>
                    <td class="text-center">{{ $reservation->created_at}}</td>
                    <td class="text-right">
                        <span class="float-right">
                            @if($reservation->closed)
                                已完成
                            @else
                                處理中
                            @endif
                        </span>
                    </td>
                </tr>

            @empty
                <div class="alert alert-info">
                    <h2>尚無訂單</h2>
                </div>
            @endforelse
        </table>
    </div>
@endsection

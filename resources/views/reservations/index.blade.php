<!DOCTYPE HTML>
@extends('layouts.master')

@section('title', '線上訂房')

@section('content')

<html>
<body>

<!-- Header -->
@include('layouts.partials.header')

<!-- Nav -->
@include('layouts.partials.navigation')


<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <h2>線上訂房</h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2>選取房型</h2>
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="100" style="text-align: center">編號</th>
                                    <th width="100" style="text-align: center">房型</th>
                                    <th width="100" style="text-align: center">圖片</th>
                                    <th width="100" style="text-align: center">價錢</th>
                                    <th width="100" style="text-align: center">可住人數</th>
                                    <th width="100" style="text-align: center">備註</th>
                                    <th width="100" style="text-align: center">選擇</th>

                                </tr>
                                </thead>
                                <tbody id="rooms">
                                @foreach($a as $as)
                                    <tr>
                                        <td>{{$as -> id}}</td>
                                        <td>{{$as -> type}}</td>
                                        <td>{{$as -> pics}}</td>
                                        <td>{{$as -> people}}</td>
                                        <td>{{$as -> remark}}</td>
                                        <td>
                                            <button type="button" class="btnSelect btn btn-danger" data-toggle="modal" data-target="#exampleModal2" >
                                                選擇
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

<!-- Footer -->
@include('layouts.partials.footer')

<!-- Scripts -->
@include('layouts.partials.scripts')

</body>
</html>

@endsection



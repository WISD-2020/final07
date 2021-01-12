<?php

@extends('layouts.master')

@section('title', '曙晨民宿')

@section('content')
    <html lang="en">
    <body>
    <!-- Header -->
    @include('layouts.partials.header')

    <!-- Nav -->
    @include('layouts.partials.navigation')

    @php
        $total = 0;
        $error='';
    @endphp
    <form action="{{ route('carts.store') }}" method="post" id="reservation-form">
        @csrf
        @if(count(user()->cart()))
            <h2>請先選擇入住及退房日期</h2>
            <table class="table table-striped">
                <tr>
                    <th nowrap class="text-left">入住日期</th>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="col-sm-7">
                            <input type="date" class="form-control checkin" name="checkin" id="checkin"
                                   min="<?php echo date ("Y-m-d"); ?>"
                                   max="<?php echo date ("Y-m-d",strtotime("+1months")); ?>">
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table table-striped">
                <tr>
                    <th nowrap class="text-left">退房日期</th>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="col-sm-7">
                            <input type="date" class="form-control checkout" name="checkout" id="checkout"
                                   min="<?php echo date ("Y-m-d",strtotime("+1days")); ?>"
                                   max="<?php echo date ("Y-m-d",strtotime("+2months")); ?>">
                        </div>
                    </td>
                </tr>
            </table>
            <hr>
        @endif
        <h2>購物車內容</h2>
        <table class="table table-striped">
            <tr>
                <th colspan=2>房型</th>
                <th nowrap class="text-right">房間單價</th>
                <th nowrap class="text-center">預定房數</th>
                <th nowrap class="text-right">小計</th>
                <th>功能</th>
            </tr>
            @forelse($carts as $cart)
                <tr>
                    <td>
                        <a target="_blank" href="/room/{{ $cart->room_id }}">
                            <img src="{{ $cart->room->photo }}" class="img-thumbnail" style="width: 120px;">
                        </a>
                    </td>
                    <td>
                        <a target="_blank" href="/room/{{ $cart->room_id }}"><h5>{{ $cart->room->type }}</h5></a>
                        @if(!$cart->room->shelves)
                            <div class="warning">该商品已下架</div>
                        @endif
                    </td>
                    <td class="text-right">
                    <span id="price-{{ $cart->id }}">
                        {{ $cart->room->price }}
                    </span>
                    </td>
                    <td class="text-center">
                        @if($cart->room->shelves)
                            <input type="number" min="1" class="form-control text-center amount" name="amount[{{ $cart->room_id }}]" value="{{ $cart->amount }}" data-cartid="{{ $cart->id }}">
                        @else
                            <div class="warning">該商品已下架</div>
                        @endif
                    </td>
                    <td class="text-right">
                    <span class="sum" id="sum-{{ $cart->id }}">
                        {{ $cart->room->price * $cart->amount }}
                    </span>
                    </td>
                    <td><a href="#" class="btn btn-danger btn-sm btn-del-from-cart" data-id="{{ $cart->room_id }}">移除</a></td>
                </tr>
                @php
                    $total+= $cart->room->price * $cart->amount
                @endphp
            @empty
                <tr>
                    <td><h1>購物車空無一物</h1></td>
                </tr>
            @endforelse
            <tr>
                <th colspan=4 class="text-right">共計</th>
                <th nowrap class="text-right">
                    <span id="total">{{ $total }}</span>
                </th>
                <th>元</th>
            </tr>
        </table>
        @if(count(auth()->user()->cart))
            <hr>
            <h2>其它</h2>
            <table class="table table-striped">
                <tr>
                    <th nowrap class="text-left">需求：</th>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="need">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th nowrap class="text-left">優惠碼：</th>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="discount">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <th nowrap class="text-right">
                        <button type="submit" class="btn btn-primary">送出訂單</button>
                    </th>
                    </td>
                </tr>
            </table>
        @endif
    </form>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Scripts -->
    @include('layouts.partials.scripts');

    </body>
    </html>

@endsection

extends('layouts.master')

@section('title', '曙晨民宿')

@section('content')

    <!-- Page Header -->
    <header class="masthead")>
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>訂單編號：00{{ $reservations->id }}</h1>
                        <span class="subheading">Reservation</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <h3>訂單明細</h3>
    <div class="card-header text-white @if($reservations->closed) bg-secondary @else bg-info @endif">
        訂單日期：{{ $reservations->created_at}}
        <span class="float-right">
            訂單狀態：
            @if($reservations->closed)
                已完成
            @else
                處理中
            @endif
        </span>
        <br>
        入住日期：{{ $reservations->checkin}} / 退房日期：{{ $reservations->checkout}}
    </div>
    @foreach($details as $detail)
        @if($detail->reservation_id == $reservations->id)
            <div class="card @if($reservations->closed) border-secondary @else border-info @endif mb-3">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th colspan=2>房型</th>
                            <th nowrap class="text-right">房間單價</th>
                            <th nowrap class="text-center">預訂房數</th>
                            <th nowrap class="text-right">小計</th>
                        </tr>
                        @foreach($rooms as $room)
                            @if($detail->room_id == $room->id)
                                <tr>
                                    <td>
                                        <a target="_blank" href="/product/{{ $detail->room_id }}">
                                            <img src="{{ $detail->room->photo }}" class="img-thumbnail" style="width: 120px;">
                                        </a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="/product/{{ $detail->room_id }}">
                                            <h5>{{ $detail->room->type }}</h5>
                                        </a>
                                        @if(!$detail->room->shelves)
                                            <div class="warning">该商品已下架</div>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        {{ $detail->room->price }} 元
                                    </td>
                                    <td class="text-center">
                                        {{ $detail->amount }}
                                    </td>
                                    <td class="text-right">
                                        {{ $detail->room->price * $item->amount }} 元
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        @endif
    @endforeach
    <table align="right">
        <tr >
            <td>共計 {{ $reservations->total }} 元</td>
        </tr>
    </table>

@endsection

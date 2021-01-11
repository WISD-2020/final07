<<<<<<< HEAD

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                訂單管理 <small>所有訂單列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 訂單管理
                </li>
            </ol>
        </div>
    </div>

    <!-- 新增彈出按鈕 -->
    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                新增
            </button>
        </div>
    </div>

                </div>
                <form action="{{ route('reservation.create') }}" method="POST">
                    @method("GET")
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>訂單編號</label>
                        <input type="text" class="form-control" name="id" id="id" value=<?php echo $lastid+1 ;?> readonly="readonly" >
                        <label >房客ID</label>
                        <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="12" pattern="[0-9]*" title="請輸入房客ID編號" required>
                        <label >是否付款</label>
                        <select id="pay" name="pay" class="form-control ">
                            <option value="y" >是</option>
                            <option value="n" selected>否</option>
                        </select>
                        <label >預定的房間編號</label>
                        <select id="room_id" name="room_id" class="form-control ">
                            @foreach($room as $rooms)
                                <option value={{$rooms->id}}>{{$rooms->id}} 號房</option>
                            @endforeach
                        </select>
                        <p>
                        <p>
                            <label >預定入住時間</label>
                            <input type="datetime-local" name="in_room" >
                        <p>
                        <p>
                            <label >預定退房時間</label>
                            <input type="datetime-local" name="out_room" >

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">新增</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- /.資料表 -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="30" style="text-align: center">id</th>
                        <th width="120" style="text-align: center">房客姓名</th>
                        <th width="120" style="text-align: center">是否付款</th>
                        <th width="120" style="text-align: center">總金額</th>
                        <th width="120" style="text-align: center">訂金</th>
                        <th width="120" style="text-align: center">預定入住時間</th>
                        <th width="150" style="text-align: center">實際入住時間</th>
                        <th width="120" style="text-align: center">預定退房時間</th>
                        <th width="150" style="text-align: center">實際退房時間</th>
                        <th width="150" style="text-align: center">取消訂單時間</th>
                        <th width="80" style="text-align: center">備註</th>
                    </tr>
                    </thead>
                    <tbody id="Mytable">
                    @foreach($chgpage as $reservation)
                        <tr>
                            <td>{{$reservation->id}}</td>
                            <td>{{$reservation->customer->name}}</td>

                            @if($reservation->out_time=='')
                                @if($reservation->pay=='N' || $reservation->pay=='n')
                                    <td>
                                        <button type="button" class="paySelect btn btn-danger" data-toggle="modal" data-target="#exampleModal4" >
                                            尚未付款
                                        </button>
                                    </td>
                                @else
                                    <td>已付款 </td>
                                @endif
                            @else
                                @if($reservation->pay=='N' || $reservation->pay=='n')
                                    <td>尚未付款 </td>
                                @else
                                    <td>已付款 </td>
                                @endif
                            @endif

                            <td>{{$reservation->cost}}</td>
                            <td>{{$reservation->money}}</td>
                            <td>{{$reservation->resroom->in_room}}</td>
                            @if($reservation->check_in=='')
                                @if($reservation->out_time=='')
                                    <td>
                                        <button type="button" class="paySelect btn btn-primary" data-toggle="modal" data-target="#exampleModal5" >
                                            尚未入住
                                        </button>
                                    </td>
                                @else
                                    <td>{{$reservation->check_in}} </td>
                                @endif
                            @else
                                <td>{{$reservation->check_in}} </td>
                            @endif
                            <td>{{$reservation->resroom->out_room}}</td>
                            @if($reservation->check_out=='')
                                @if($reservation->out_time=='')
                                    <td>
                                        <button type="button" class="paySelect btn btn-primary" data-toggle="modal" data-target="#exampleModal6" >
                                            尚未退房
                                        </button>
                                    </td>
                                @else
                                    <td>{{$reservation->check_out}} </td>
                                @endif
                            @else
                                <td>{{$reservation->check_out}} </td>
                            @endif
                            @if($reservation->out_time=='')
                                <td>
                                    <button type="button" class="deleteSelect btn btn-danger" data-toggle="modal" data-target="#exampleModal3" >
                                        取消訂單
                                    </button>
                                </td>
                            @else
                                <td>{{$reservation->out_time}} </td>
                            @endif

                            <td>
                                <button type="button" class="btnSelect btn btn-primary" data-toggle="modal" data-target="#exampleModal2" >
                                    修改
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$chgpage->links()}}
            </div>
        </div>
    </div>


    <!--'修改'彈出視窗的內容 Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改訂單資料(重新修改)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('reservation.create') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>訂單編號</label>
                        <input type="text" class="form-control" name="update_id" id="update_id"  readonly="readonly" >
                        <label >是否付款</label>
                        <select id="update_pay" name="update_pay" class="form-control ">
                            <option value="y" >是</option>
                            <option value="n" selected>否</option>
                        </select>
                        <label >訂單是否取消</label>
                        <select id="update_pay" name="update_out_time" class="form-control ">
                            <option value="y" >是</option>
                            <option value="n" selected>否</option>
                        </select>
                        <label >預定的房間編號</label>
                        <select id="update_room_id" name="update_room_id" class="form-control ">
                            @foreach($room as $rooms)
                                <option value={{$rooms->id}}>{{$rooms->id}} 號房</option>
                            @endforeach
                        </select>
                        <p>
                        <p>
                            <label >預定入住時間</label>
                            <input type="datetime-local" name="update_in_room" id="update_in_room">
                        <p>
                        <p>
                            <label >預定退房時間</label>
                            <input type="datetime-local" name="update_out_room" id="update_out_room">
                        <p>
                        <p>
                            <label >實際入住時間</label>
                            <input type="datetime-local" name="update_check_in" id="update_check_in">
                        <p>
                        <p>
                            <label >實際退房時間</label>
                            <input type="datetime-local" name="update_check_out" id="update_check_out">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">修改</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection
=======
<form method="POST" action="{{ route('doctors.announcements.store') }}">
    @method('POST')
    @csrf

    <div>
        <x-jet-label for="title" value="{{ __('標題') }}" />
        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" required />
    </div>

    <div class="mt-4">
        <x-jet-label for="content" value="{{ __('內容') }}" />
        <x-jet-input id="content" class="block mt-1 w-full" type="textarea" name="content" maxlength="500" required />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-jet-button class="ml-4">
            {{ __('新增') }}
        </x-jet-button>
    </div>
</form>
>>>>>>> edbfa714d08e9ab642977bc5e41c53048f6241ba

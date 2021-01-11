@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                房間管理 <small></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                新增
            </button>
        </div>
    </div>

    <!--'新增'彈出視窗的內容 Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增房間資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.rooms.store') }}" method="POST" role="form">
                    @method('POST')
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>房間編號</label>
                        <input type="text" class="form-control" name="id" id="id" value='' readonly="readonly" >
                        <label >房型</label>
                        <select id="type" name="type" class="form-control ">
                            <option value="套房" selected>套房</option>
                            <option value="雅房">雅房</option>
                        </select>
                        <label >幾人房</label>
                        <select id="people" name="people" class="form-control">
                            <option value="一人房" selected>一人房</option>
                            <option value="二人房">二人房</option>
                            <option value="三人房">三人房</option>
                            <option value="四人房">四人房</option>
                            <option value="五人房">五人房</option>
                            <option value="六人房">六人房</option>
                        </select>
                        <label >價錢</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="1234" pattern="[0-9]*" title="請輸入數字" required>

                        <label >備註</label>
                        <input type="text" class="form-control" name="remark" id="remark" title="輸入備註" required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">新增</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="10%" style="text-align: center">id</th>
                            <th width="20%" style="text-align: center">房型</th>
                            <th width="20%" style="text-align: center">價錢</th>
                            <th width="20%" style="text-align: center">價錢</th>
                            <th width="20%" style="text-align: center">備註</th>
                        </tr>
                        </thead>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{$room->id}}</td>
                                <td>{{$room->type}}</td>
                                <td>{{($room->price)}}</td>
                                <td>{{($room->people)}}</td>
                                <td>{{($room->remark)}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.rooms.edit', $room->id) }}">編輯</a>
                                    /
                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
@endsection

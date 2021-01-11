@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                所有房間 <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> 房間管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

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

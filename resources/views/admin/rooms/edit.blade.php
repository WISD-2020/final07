@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯房間 <small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 房間管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" role="form">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="type">房型：</label>
                    <select id="type" name="type" class="form-control " value="{{ old('room', $room->type) }}">
                        <option value="套房" selected{{ old('room', $room->type) }}>套房</option>
                        <option value="雅房"{{ old('room', $room->type) }}>雅房</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="people">幾人房：</label>
                    <select id="people" name="people" class="form-control " >
                        <option value="一人房" selected {{ old('people', $room->people) }}>一人房</option>
                        <option value="二人房"{{ old('people', $room->people) }}>二人房</option>
                        <option value="三人房"{{ old('people', $room->people) }}>三人房</option>
                        <option value="四人房"{{ old('people', $room->people) }}>四人房</option>
                        <option value="五人房"{{ old('people', $room->people) }}>五人房</option>
                        <option value="六人房"{{ old('people', $room->people) }}>六人房</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">價錢：</label>
                    <input name="price" class="form-control" value="{{ old('price', $room->price) }}">
                </div>

                <div class="form-group">
                    <label for="remark">備註：</label>
                    <input name="remark" class="form-control" value="{{ old('remark', $room->remark) }}">
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success">更新</button>
                </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection

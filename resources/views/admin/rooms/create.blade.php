<<<<<<< HEAD
@extends('admin.layouts.master')

@section('title', '房間管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                房間管理 <small>所有房間列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 房間管理
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
                <form action="{{ route('admin.rooms.create') }}" method="get">
                    @method('POST')
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>房間編號</label>
                        <input type="text" class="form-control" name="id" id="id" value='' readonly="readonly" >
                        <label >房型</label>
                        <select id="type" name="type" class="form-control ">
                            <option value="1" selected>套房</option>
                            <option value="2">雅房</option>
                        </select>
                        <label >幾人房</label>
                        <select id="people" name="people" class="form-control ">
                            <option value="1" selected>一人房</option>
                            <option value="2">二人房</option>
                            <option value="3">三人房</option>
                            <option value="4">四人房</option>
                            <option value="5">五人房</option>
                            <option value="6">六人房</option>
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


@endsection
=======


>>>>>>> edbfa714d08e9ab642977bc5e41c53048f6241ba

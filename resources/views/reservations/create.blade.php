<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            編輯訂單 <small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 訂單管理
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
        <form action="{{ route('reservations.store', $reservations->id) }}" method="POST" role="form">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label> for="checkin">預定時間：</label>
                <input name="reservation_in" class="form-control" value="{{ old('reservations', $reservations->reservation_in) }}">
            </div>

            <div class="form-group">
                <label> for="checkout">預定退房時間：</label>
                <input name="reservation_in" class="form-control" value="{{ old('reservations', $reservations->reservation_in) }}">
            </div>

            <div class="form-group">
                <label for="cost">總額：</label>
                <input name="cost" class="form-control" value="{{ old('reservations', $reservations->cost) }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">新增</button>
            </div>



        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->

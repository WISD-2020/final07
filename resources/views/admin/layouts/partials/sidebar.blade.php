<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.reservations.index') }}">管理後台</a>
    </div>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li >
                <a href="{{ route('admin.reservations.index') }}"><i class="fa fa-fw fa-dashboard"></i> 訂單管理</a>
            </li>
            <li>
                <a href="{{ route('admin.rooms.index') }}"><i class="fa fa-fw fa-edit"></i> 房間管理</a>
            </li>
            <li>
                <a href="/"><i class="fa fa-fw fa-edit"></i> 回前端</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

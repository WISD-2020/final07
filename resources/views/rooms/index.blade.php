@extends('layouts.master')

@section('title', '曙晨民宿')

@section('content')

    <!-- Header -->
    @include('layouts.partials.header')

    <!-- Nav -->
    @include('layouts.partials.navigation')

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Rooms</p>
						<h2>房型一覽</h2>
					</header>
				</div>
			</section>

    <div class="card-deck">
        @foreach($rooms as $room)
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>房型</th>
                        <th>照片</th>
                        <th>人數</th>
                        <th>價錢</th>
                        <th>備註</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{ $room->type }}
                        </td>
                        <td width=300pt>
                            <a href="{{ $room->pics }}">
                            <span class="image fit"> <img STYLE="width: 300pt" src={{$room->pics}}></span>
                        </td>
                        <td>
                            {{ $room->people }}
                        </td>
                        <td>
                            <div class="card-footer text-center">
                                ${{ $room->price }}
                            </div>
                        </td>
                        <td>
                            {{ $room->remark }}
                        </td>
                        <td>

                            <form action="reservations/create" method="GET">
                                {{ csrf_field() }}
                                <input type = "hidden" id = "delete_id" name = "id" value = "">

                                <button type="submit" class="btn btn-danger">預約</button>
                            </form>
                        </td>

                    </tr>
            </table>
            </div>



        @endforeach
    </div>




    <!-- Scripts -->
    @include('layouts.partials.scripts')

    @endsection




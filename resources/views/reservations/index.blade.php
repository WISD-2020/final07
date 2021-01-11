<!DOCTYPE HTML>
@extends('layouts.master')

@section('title', '線上訂房')

@section('content')

<html>
<body>

<!-- Header -->
@include('layouts.partials.header')

<!-- Nav -->
@include('layouts.partials.navigation')


<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <h2>線上訂房</h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2>選取房型</h2>
                </header>

            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@include('layouts.partials.footer')

<!-- Scripts -->
@include('layouts.partials.scripts')

</body>
</html>

@endsection



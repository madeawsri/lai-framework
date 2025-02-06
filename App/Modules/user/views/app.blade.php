@extends('layouts.app')

@section('content')
    <h1 class="text-center">MY APP: {{$_SERVER['REQUEST_URI']}} !</h1>
    <p class="text-center">นี่คือหน้าแรกที่ใช้ Blade Template Engine ใน Module Home.</p>
@endsection

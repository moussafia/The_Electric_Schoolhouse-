@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')
<!---cards articles-->
<div class="calander" style="margin: 30px;display:flex;justify-content:space-around;align-items:center">
    <span style="font-family: 'Courier New', Courier, monospace;font-size:30px">👋Welcome back
        <strong>{{$user->last_name}}</strong>!</span>
    <div class="hidden md:inline">
        @php
        $calanderHtml=(new App\Http\Controllers\CalenderController\CalenderController())->calendar();
        echo $calanderHtml;
        @endphp
    </div>
 </div>
 <div class=" bg-white shadow-md" id="cards-dash" style="margin-top: 90px">
    <h1 class="font-bold bg-white shadow-sm py-4 uppercase tracking-wide logo-color" style="padding-left: 30px;
    font-size:28px;text-align:center;marging-buttom:30px">New Articles</h1>
    <div>
        <main class="page-content" id="blogsDashboard" data-url="{{route('indexBlog')}}">
        </main>
    </div>
 </div>
 @include('layoutAuth.footer')
@push('scripts')
<script src="{{asset('assets/js/dashboard/dashboard.js')}}"></script>
@endpush
 @endsection

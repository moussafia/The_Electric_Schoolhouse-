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
        <main class="page-content">
            <div class="card rounded-md"
                style="background-image: url(https://images.unsplash.com/photo-1517021897933-0e0319cfbc28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
                <div class="content">
                    <h2 class="title">Mountain View</h2>
                    <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed
                        it, the mountains</p>
                    <button class="btn">View Trips</button>
                </div>
            </div>
            <div class="card rounded-md"
                style="background-image: url(https://images.unsplash.com/photo-1533903345306-15d1c30952de?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
                <div class="content">
                    <h2 class="title">To The Beach</h2>
                    <p class="copy">Plan your next beach trip with these fabulous destinations</p>
                    <button class="btn">View Trips</button>
                </div>
            </div>
            <div class="card rounded-md"
                style="background-image: url(https://images.unsplash.com/photo-1545243424-0ce743321e11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
                <div class="content">
                    <h2 class="title">Desert Destinations</h2>
                    <p class="copy">It's the desert you've always dreamed of</p>
                    <button class="btn">Book Now</button>
                </div>
            </div>
            <div class="card rounded-md"
                style="background-image: url(https://images.unsplash.com/photo-1531306728370-e2ebd9d7bb99?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
                <div class="content">
                    <h2 class="title">Explore The Galaxy</h2>
                    <p class="copy">Seriously, straight up, just blast off into outer space today</p>
                    <button class="btn">Book Now</button>
                </div>
            </div>
        </main>
    </div>
 </div>
 @include('layoutAuth.footer')

 @endsection

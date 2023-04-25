@extends('layout.layout')
@section('title','Quizz')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')

<div>
    <div class="h-auto bg-white shadow-lg border-0 border-b-2 border-t-2 rounded-md p-3 m-5">
        <div class="flex justify-center items-center px-10 mb-7 bg-white shadow-sm py-4">
            <div class="ml-6 font-bold uppercase tracking-wide logo-color" style="font-size:30px;text-align:center"><span>
                ALL QUIZZES</span>
            </div>
        </div>
        <main class="page-content" >
            <div class="card rounded-md"
                style="background-image: url(https://images.unsplash.com/photo-1517021897933-0e0319cfbc28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
                <div class="content">
                    <h2 class="title"></h2>
                    <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed
                        it, the mountains</p>
                    <button class="btn">Passer</button>
                </div>
            </div>
            <div class="card rounded-md"
                style="background-image: url(https://images.unsplash.com/photo-1533903345306-15d1c30952de?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
                <div class="content">
                    <h2 class="title">To The Beach</h2>
                    <p class="copy">Plan your next beach trip with these fabulous destinations</p>
                    <button class="btn">passer</button>
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
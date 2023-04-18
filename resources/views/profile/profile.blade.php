@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')
<div class="h-64 bg-white shadow-lg border-0 border-b-2 border-t-2 rounded-md p-3 m-5">
    <div class="profile">
        <div class="relative">
            <div class="relative " style="height: 100px;width:auto;overflow:hidden">
                <img src="{{asset('assets/image/user/'.$user->cover)}}"
                    style="width:100%;height:100%;object-fit: cover;">
            </div>
            <div class="absolute z-10 ml-3 border-2"
                style="height: 80px; width:80px; overflow:hidden; border-radius:50%;margin-left:20px;left:5%;bottom:-30%; transform: translateX(-50%);">
                <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
            </div>
            <div class="absolute btn rounded-lg w-16  text-white" style="top: 5px; right: 20px;"
                data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                <button class="flex items-center gap-2 w-full" type="button"><span
                        class="uppercase hidden md:inline">edit</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white ms-4" fill="currentColor"
                        viewBox="0 0 512 512">
                        <path
                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="mt-8 ml-2">
            <span class="self-center text-lg font-semibold whitespace-nowrap py-3 text-gray-900 dark:text-white"><span
                    class=" logo-color">@</span>{{$user->last_name.' '.$user->first_name}}</span><br>
            <span
                class="self-center text-sm font-semibold whitespace-nowrap px-5 py-3 text-gray-900 dark:text-white">{{$user->email}}</span>
        </div>
    </div>
</div>
<div class="h-auto bg-white shadow-lg border-0 border-b-2 border-t-2 rounded-md p-3 m-5">
    <div class="flex justify-between items-center px-10 mb-7 bg-white shadow-sm py-4">
        <div class="ml-6 font-bold uppercase tracking-wide logo-color" style="font-size:20px;text-align:center"><span>My
                Blogs</span></div>
        <div class="btn rounded-lg text-white flex justify-end mr-6" style="width: 90px"
        data-modal-target="modalAddArticles" data-modal-toggle="modalAddArticles">
            <button class="flex items-center gap-2 w-full"><span class="uppercase hidden md:inline">Add</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="currentColor"
                    viewBox="0 0 512 512">
                    <path
                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                </svg>
            </button>
        </div>
    </div>
    <main class="page-content" id="cardBlogs" data-url="{{route('showBlogs')}}"> 
          <!-- cars blogs -->
    </main>
</div>
<div class="h-auto bg-white shadow-lg border-0 border-b-2 border-t-2 rounded-md p-3 m-5">
    <div class="flex justify-between items-center px-10 mb-7 bg-white shadow-sm py-4">
        <div class="ml-6 font-bold uppercase tracking-wide logo-color" style="font-size:20px;text-align:center"><span>My
                QUIZZ</span></div>
        <div class="btn rounded-lg text-white flex justify-end mr-6" style="width: 90px">
            <button class="flex items-center gap-2 w-full"><span class="uppercase hidden md:inline">Add</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="currentColor"
                    viewBox="0 0 512 512">
                    <path
                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                </svg>
            </button>
        </div>
    </div>
    <main class="page-content" >
        <div class="card rounded-md"
            style="background-image: url(https://images.unsplash.com/photo-1517021897933-0e0319cfbc28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
            <div class="content">
                <h2 class="title"></h2>
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
@if(session('success'))
<div id="success-message" class="p-4 mb-4 fixed bottom-2 right-2  text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success!</span>{{ session('success') }}
  </div>
@endif

{{-- @include('Forms.blogs.blogsEditRemove') --}}

@include('Forms.user.formUpdateDelete')

@include('Forms.blogs.blogsForm')

@include('layoutAuth.footer')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0/dist/js.cookie.min.js"></script>
<script src="{{asset('assets/js/profile/profile.js')}}"></script>
@endpush

@endsection

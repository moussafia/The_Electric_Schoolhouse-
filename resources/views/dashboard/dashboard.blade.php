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
<div class=" bg-white shadow-sm"  style="margin-top: 90px;">
    <h1 class="font-bold bg-white shadow-sm py-4 uppercase tracking-wide logo-color" style="padding-left: 30px;
    font-size:28px;text-align:center;marging-buttom:30px">Statistic</h1>
    <div class="flex m-5" style="justify-content: space-around;padding:40px;flex-wrap:wrap" >
        <div class="containerCards rounded-lg" id="statisticBlogs" data-url="{{route('statisticBlogs')}}">
            <div class="cardsSatistique flex flex-wrap p-3 items-center rounded-lg" 
            style="color: rgb(88, 86, 86)">
                <div class="flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-16 h-16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                      </svg>                                        
                    <span class="uppercase hidden md:inline" style="font-size:16px;
                    font-weight:bold">Nombre des blogs</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <p class="fixed"  style="color: rgb(88, 86, 86);
                    font-size:40px;
                    font-weight:bold;
                    right:20px;
                    top:50px" id="affichageNombreBlogs"></p>
                    <p class="fixed" style="color: rgb(88, 86, 86);
                    font-size:20px;
                    font-weight:bold;
                    right:20px;
                    top:102px">Blogs</p>
                </div>
            </div>
        </div>
        <div class="containerCards rounded-lg">
            <div class="cardsSatistique flex flex-wrap p-3 items-center rounded-lg" 
            style="color: rgb(88, 86, 86)" id="statisticUsers" data-url="statisticUsers">
                <div class="flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                    class="w-16 h-16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                      </svg>                  
                    <span class="uppercase hidden md:inline" style="font-size:16px;
                    font-weight:bold">Nombre des users</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <p class="fixed"  style="color: rgb(88, 86, 86);
                    font-size:40px;
                    font-weight:bold;
                    right:20px;
                    top:50px" id="affichageNombreUsers"></p>
                    <p class="fixed" style="color: rgb(88, 86, 86);
                    font-size:20px;
                    font-weight:bold;
                    right:20px;
                    top:102px">Users</p>
                </div>
            </div>
        </div>
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
@push('styles')
<style>
.containerCards{
   transform: rotate(5deg);
   background:linear-gradient(to right,#02a1dbda,#a8cf45ce) !important;
   margin: 20px

}

.cardsSatistique{
    transform: rotate(-5deg);
    background-color: #f3e9e9ee;
    border-radius: 4px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    padding: 16px;
 
    min-height: 35vh;
    min-width: 48vh;
}
.cardsSatistique::after {
    content: '';
}
</style>
@endpush
@push('scripts')
<script src="{{asset('assets/js/statistic/statistic.js')}}"></script>
@endpush
@endsection
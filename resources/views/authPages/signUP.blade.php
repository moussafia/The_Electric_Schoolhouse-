@extends('layout.header')
@section('title','Sign UP')
<style>
    body{
    font-family: 'Nunito', sans-serif;
    background-image:url('{{ asset("assets/image/pexels-pixabay-236089.jpg") }}');
    background-size: cover;
    background-position: center;
    position: relative;
}
body::before{
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: -1;
    filter: brightness(80%) contrast(80%); 
}
.logo img{
    height: 150px;
} */
</style>
<body id="signUP-page" class="flex flex-col justify-center items-center">
        <a href="{{route('welcome')}}" class="logo">
            <img src="{{asset('assets/image/logo-white-removebg-preview.png')}}" alt="" srcset="">
        </a>
        <form method="post" action="{{route('signUP')}}" class="bg-white rounded-lg shadow-md flex flex-col" style="padding: 30px;width:350px">
            @csrf
            <span class="flex justify-center pt-2 tracking-widest font-bold signUP" >Sign UP</span>
            <input type="text"  name="first_name" value="{{old('first_name')}}" style="width: 100%" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="First name">
            @error('first_name')
                <span class="text-red-500 ml-2" style="font-size:12px;font-family: system-ui;">{{$message}}</span>                
            @enderror
            <input type="text" name="last_name" value="{{old('last_name')}}" style="width: 100%" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="Last name">

            @error('last_name')
            <span class="text-red-500 ml-2" style="font-size:12px;font-family: system-ui;">{{$message}}</span>    
            @enderror         
               <input type="email" name="email" value="{{old('email')}}" style="width: 100%" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="Email">
            @error('email')
                <span class="text-red-500 ml-2" style="font-size:12px;font-family: system-ui;">{{$message}}</span>        
            @enderror  
            <input type="password"  name="password" value="{{old('password')}}" style="width: 100%" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="password">
                        @error('password')
                        <span class="text-red-500 ml-2" style="font-size:12px;font-family: system-ui;">{{$message}}</span>     
                        @enderror
            <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" style="width: 100%" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="confirm password">
            <button type="submit" class="flex justify-center bg-linear-brand my-2 w-fit text-white py-1.5 rounded-md">registrer</button>
            <a href="{{route('authPages.logIN')}}" class="flex justify-center text-linear-brand w-fit text-white py-1.5 rounded-md pt-2">Se connecter</a>
        </form>
    
@extends('layout.footer')
@extends('layout.header')
@section('title','forget password')
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
<body id="LogIN-page" class="flex flex-col justify-center items-center">
        <a href="{{route('welcome')}}" class="logo">
            <img src="{{asset('assets/image/logo-white-removebg-preview.png')}}" alt="" srcset="">
        </a>
        <form method="post" action="{{route('password.update')}}" class="bg-white flex flex-col rounded-lg shadow-md" style="padding: 30px;width:350px">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <span class="flex justify-center pt-2 tracking-widest font-bold signUP" >forget password</span>
            <input id="email" type="email" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="email" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" name="password" value="{{old('password')}}" style="width: 100%" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="password">
            @error('password')
            <span class="text-red-500 ml-2" style="font-size:12px;font-family: system-ui;">{{$message}}</span>     
            @enderror
            <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" style="width: 100%" class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500" placeholder="confirm password">
            <button type="submit" class="flex justify-center bg-linear-brand my-3 w-fit text-white py-1.5 rounded-md">Send</button>
            <a href="{{route('authPages.logIN')}}" class="flex justify-center text-linear-brand w-fit text-white py-1.5 rounded-md pt-2">Se connecter</a>
        </form>
    
@extends('layout.footer')
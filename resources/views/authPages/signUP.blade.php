@extends('layout.layout')
@section('title','Sign UP')
@section('content')
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
            @if ($errors->has('error'))
            <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ $errors->first('error') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
              </div> 
            @endif
        </form>
    
@endsection
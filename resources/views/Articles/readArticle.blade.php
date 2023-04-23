@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')
@push('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@php
$blogsObject = json_decode(json_encode($blogsArray[0]));
@endphp
<div class="bg-white shadow-sm border-0 border-b-2 border-gray-400 m-3 overflow-hidden">
    <h2 class="title text-center p-6 font-extrabold" style="margin-top:30px;font-size:30px">{{$blogsObject->title}}</h2>
    <div class="flex justify-center">
        <div style="width:  800px;height:400px;margin:10px">
            <img src="{{asset('assets/image/Blogs/'.$blogsObject->image)}}" class="rounded-lg mx-3" style="height: 100%;width:100%; object-fit: cover;
                  object-position: center;">
        </div>
    </div>
    <div class="tags flex justify-center m-3 text-end ">
        <div class="responsible-tags-category">
            <div class="w-full">
                @foreach ($blogsObject->tags as $tag)
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium
                            text-center " style="font-family: Cursive"><span>#</span>{{$tag->tag}}</span>
                @endforeach
            </div>
        </div>
    </div>
    <div class="paragraphs p-8">
        @foreach ($blogsObject->paragraphs as $paragraph)
        <p class="1" style="font-family:sans-serif;font-size:18px;font-weight:400;
        text-indent: 3em; padding:15px">
            {{$paragraph->paragraph}}</p>
        @endforeach
    </div>
    <div class="category flex justify-start items-end text-end ml-4">
        <div class="responsible-tags-category">
            <div class="w-full">
                @foreach ($blogsObject->categories as $category)
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium 
                text-center" style="font-family: Cursive;">{{$category->category}}</span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex justify-center items-end  flex-col" style="margin: 30px;padding-right:10px">
        <p class="author" style="font-family: Arial, sans-serif;
        font-size: 1rem;font-weight: bold;color: #333; margin-bottom: 0.5rem;">
            {{$blogsObject->user[1].' '.$blogsObject->user[2]}}</p>
        <p class="date text-center pr-4" style="font-family: Arial, sans-serif;
        font-size: 1rem;font-weight: bold;text-align: center;
        padding-right: 1.5rem;">{{$blogsObject->dateAjoute}}</p>
    </div>
</div>
<div class="comment border-t-2 bg-white p-4" style="border-top:20px;">
    <div class="p-5 m-5 ">
        <form id="CreateCommaintaire" method="post" action="{{route('commantaire.store')}}">
            <input type="hidden" name="_token" value='<?php echo csrf_token(); ?>'>
            <label for="chat" class="sr-only">Your message</label>
            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                <textarea id="commantaireInp" rows="1" name="commantaireInp"
                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your comment..."></textarea>
                <button type="submit"
                    class="inline-flex justify-center p-2 text-green-500 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                    <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                        </path>
                    </svg>
                    <span class="sr-only">Send comment</span>
                </button>
            </div>
        </form>
    </div>
    <div id="commentEnv" data-url="{{route('commantaire.show',$blogsObject->blogId)}}"
    class="comment flex flex-col items-center justify-center overflow-y-scroll m-0 md:m-2"
     style="max-width:100%">
        {{-- <div class="comment-repondre" style="border-redius:30px;background-color:#fcf9ed">
            <div class="border-b-2">
                <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px;margin-top:40px">
                    <div style="height: 40px; width:40px; overflow:hidden; border-radius:50%;">
                        <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                    </div>
                    <span>
                        <span class="font-medium ">Mohammed moussafia</span><br>
                        <span class="text-end pl-3" style="font-family: cursive;font-size:10px">2020-02-13</span>
                    </span>
                </div>
                <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">Lorem ipsum .</p>
                <div class="flex flex-col items-end justify-end">
                    <div>
                        <button type="button" class="" style=" font-size: 0.9rem;
                        font-weight: 500;
                        color: #333;
                        text-decoration: none;
                        padding: 0.5rem 1rem;
                        transition: all 0.3s ease;">
                               <span class="hover:underline">Supprimer</span> </button>
                           <button type="button" style=" font-size: 0.9rem;
                        font-weight: 500;
                        color: #333;
                        text-decoration: none;
                        padding: 0.5rem 1rem;
                        transition: all 0.3s ease;" id="repondre">
                               <span class="hover:underline">Repondre</span></button>
                    </div>
                    <div id="repondreComment" class="w-full px-3 py-3">
                        <!---repondre input here -->
                        <form id="CreateRepondre" method="post" action="">
                            <input type="hidden" name="_token" value='<?php echo csrf_token(); ?>'>
                            <input type="hidden" name="commentId" value="">
                            <label for="chat" class="sr-only">Your message</label>
                            <div class="flex items-center px-3 py-2 rounded-lg  dark:bg-gray-700">
                                <textarea rows="1" name="RepndreInp"
                                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white 
                                    rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500
                                     dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                      dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your reponse..."></textarea>
                                <button type="submit"
                                    class="inline-flex justify-center p-2 text-green-500 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                        </path>
                                    </svg>
                                    <span class="sr-only">Send repondre</span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="rep overflow-y-scroll" style="height: 28vh">
                <div class="repondre border-t-2" style="padding-left:80px;padding-top:20px">
                    <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px">
                        <div style="height: 35px; width:35px; overflow:hidden; border-radius:50%;">
                            <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                        </div>
                        <span>
                            <span class="font-medium ">Mohammed moussafia</span><br>
                            <span class="text-end pl-3" style="font-family: cursive;font-size:10px">2020-02-13</span>
                        </span>
                    </div>
                    <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">Lorem ipsum </p>
                </div>
                <div class="repondre border-t-2" style="padding-left:80px;padding-top:20px">
                    <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px">
                        <div style="height: 35px; width:35px; overflow:hidden; border-radius:50%;">
                            <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                        </div>
                        <span>
                            <span class="font-medium ">Mohammed moussafia</span><br>
                            <span class="text-end pl-3" style="font-family: cursive;font-size:10px">2020-02-13</span>
                        </span>
                    </div>
                    <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">Lorem ipsum </p>
                </div>
            </div>

        </div> --}}
    </div>
</div>




@push('styles')
<style>
.responsible-tags-category {
    display: grid;
    grid-template-columns: 12fr;
    grid-template-rows: auto;
    grid-gap: 10px;
    grid-row-gap: 20px;
}

@media screen(min-width:768px) {

    .responsible-tags-category {
        display: grid;
        grid-template-columns: 4fr 4fr 4fr;
        grid-template-rows: auto;
        grid-gap: 10px;
    }
}
</style>
@endpush

@push('scripts')
<script src="{{asset('assets/js/commantaire/commantaireCreate.js')}}"></script>
<script src="{{asset('assets/js/commantaire/getAllCommantaires.js')}}"></script>

@endpush



@endsection
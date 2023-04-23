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
     style="max-width:100%;">
        <!--comment here with heir response-->
    </div>
</div>
<!--modal delete Comment-->
<button id="deleteComment" type="hidden"
data-modal-target='modaleRemoveComment'
 data-modal-toggle='modaleRemoveComment'></button>
<div id="modaleRemoveComment" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modaleRemoveComment">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="" method="post" id="formDeleteComment">
                @csrf
                @method('DELETE')
                <div class="p-6 text-center flex items-center flex-col">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this comment?</h3>
                <div>
                    <button data-modal-hide="modaleRemoveComment" data-method="DELETE" 
                    id="delete-blog" type="submit" class="text-white bg-red-700
                     hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300
                      dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex 
                      items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="modaleRemoveComment" type="button" 
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 
                    focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 
                    text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700
                     dark:text-gray-300 dark:border-gray-500 dark:hover:text-white 
                     dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--modala delte reponse --->
<button id="deleteReponse" type="hidden"
data-modal-target='modaleRemoveReponse'
 data-modal-toggle='modaleRemoveReponse'></button>
<div id="modaleRemoveReponse" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modaleRemoveReponse">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="" method="post" id="formDeleteReponse">
                @csrf
                @method('DELETE')
                <div class="p-6 text-center flex items-center flex-col">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Reponse?</h3>
                <div>
                    <button data-modal-hide="modaleRemoveReponse" data-method="DELETE" 
                    id="delete-blog" type="submit" class="text-white bg-red-700
                     hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300
                      dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex 
                      items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="modaleRemoveReponse" type="button" 
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 
                    focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 
                    text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700
                     dark:text-gray-300 dark:border-gray-500 dark:hover:text-white 
                     dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
                </div>
            </form>
        </div>
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
<script src="{{asset('assets/js/commantaire/deleteComment.js')}}"></script>
<script src="{{asset('assets/js/commantaire/deleteReponse.js')}}"></script>

@endpush



@endsection
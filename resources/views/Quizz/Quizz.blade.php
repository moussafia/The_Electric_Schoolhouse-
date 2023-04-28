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
        <main class="page-content"  id="allQuizz" data-url="{{route('quizz.index')}}">
        
        </main>
    </div>
</div>





@include('layoutAuth.footer')
@push('scripts')
<script src="{{asset('assets/js/quizz/AllQuizzes.js')}}"></script>
@endpush
@endsection
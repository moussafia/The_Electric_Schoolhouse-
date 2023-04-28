@extends('layout.layout')
@section('title','Quizz')
@section('content')
@include('layoutAuth.navbar')
@push('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
<div id="passageQuizz" class="flex flex-col justify-center items-center">
    <div id="QuizzData" data-quizz="{{$quizz}}"></div>
    <div class="flex flex-col justify-center items-center relative" id="countoerDown">
        <div id="rules" class="flex flex-col items-center justify-center">
            <div class="rulesText rounded-lg shadow-lg flex flex-col justify-center items-center" style="padding: 30px;
            height:100%;width:100%">
            <p class="text-white uppercase underline"
            style="font-size: 26px;font-weight:600">Some Rules HERE:</p><br>
                <ul class="numbered-list">
                    <li class="text-white" 
                    style="font-size: 20px;font-weight:500">Vous n'avez qu'une seule chance pour passer ce quizz.</li>
                    <li class="text-white" 
                    style="font-size: 20px;font-weight:500">Une fois que vous avez quitté la partie, vous n'avez pas le droit de repasser.</li>
                    <li class="text-white" 
                    style="font-size: 20px;font-weight:500">Bonne chance !</li>
                </ul>
            </div>
            <div class="flex justify-center">
                <button class="w-96 h-12 px-10 btn text-white border-primary md:border-2 hover:bg-primary 
                hover:text-blue-400 transition ease-out duration-500 uppercase rounded-lg"
                onclick="startQuizz()">Get started</button>
            </div>
        </div>
        <p class="timer" id="timer"></p>
        <audio id="audio" src="{{asset('assets/audioQuizz/quiz.mp3')}}"></audio>
    </div>
    <div class="hidden" id="passageQuizzDiv">
        <div class=" pageQuizz flex flex-col justify-center items-center">
            <div class="question flex justify-center items-center shadow-lg rounded-lg tetx-center" style="margin-top:20px">
                <p id="questionArea" class="text-white text-center indent-4" style="font-size: 17px;
            font-weight:500;
            font-family:Arial, Helvetica, sans-serif;"></p>
            </div>
            <div id="answers" class="answers">
                
               
                
               
            </div>
            <div class="fixed bottom-0 justify-end px-10 " style="margin-top: 10px;right:20px">
                <button class="absolute bottom-0 right-0 inline-flex items-center justify-center p-0.5 mb-2 mr-2 
                overflow-hidden text-sm font-medium text-slate-400 rounded-lg group bg-gradient-to-br 
                from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600
                 hover:text-white" id="nextQuestion" onclick="nextQuestion()"> 
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-primary dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Next</span></button>
            </div>
        </div>
        <div id="resultat">
            
        </div>
    </div>
</div>











@push('styles')
<style>
#passageQuizz {
    min-height: 100vh;
    width: 100%;
    background-color: #382a4b !important;

}

.question {
    width: 80%;
    height: 37vh;
    margin: 10px;
    background-color: #462c69;
    padding: 30px;
}
#answers {
    row-gap: 30px;
    column-gap:60px;
    margin-top: 30px;
    display: grid;
    grid-template-columns: repeat(12,1fr);
} 
.answer {
    background-color: #462c69;
    padding: 30px;
    height: 100%;
    width: 100%;
    grid-column: span 6;
}



.checkBox {
    color: #462c69;
}

.checkBox:focus {
    outline: 2px solid #462c69;
    outline-offset: 2px;
}
.rulesText{
    background-color: #462c69;
    display: flex;
    justify-content: center;
}

@media only screen and (max-width:768px) {}

.timer {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 300px;
    font-weight: 600;
    color: white;
}
  /* Define a counter for the list items */
  .numbered-list {
    counter-reset: my-counter;
  }

  /* Style the list items with numbered bullets */
  .numbered-list li::before {
    counter-increment: my-counter;
    content: counter(my-counter) ". ";
  }
.start-effect {
    background: -webkit-linear-gradient(#02a1db9e, #a8cf45a8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 150px;
}
</style>
@endpush
@push('scripts')
<script src="{{asset('assets/js/quizz/passageQuizz.js')}}"></script>
@endpush

@endsection
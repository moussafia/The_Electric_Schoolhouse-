@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')

<div class="bg-white shadow-sm border-0 border-b-2 border-gray-400 mt-3">
    <h2 class="title text-center p-6 font-extrabold" style="margin-top:30px;font-size:30px">Lorem ipsum dolor sit amet
        consectetur.</h2>
    <div style="height:300px;margin:30px">
        <img src="{{asset('assets/image/tec-solaire2.jpg')}}" class="rounded-lg"
            style="height: 100%;width:100%; object-fit: cover;  object-position: center;">
    </div>
    <div>
        <div class="tags flex justify-start pl-4 gap-4">
            <div class="grid grid-cols-7 gap-1"> 
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium
                text-center col-span-3 sm:col-span-1" style="font-family: Cursive"><span>#</span> Lorem.</span>
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium
                text-center col-span-3 sm:col-span-1" style="font-family: Cursive"><span>#</span> Lorem ipsum</span>
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium
                text-center col-span-3 sm:col-span-1" style="font-family: Cursive"><span>#</span> Lorem ipsum.</span>
            </div>  
        </div>
        <div class="category flex justify-end items-end mt-3 gap-4">
            <div class="grid grid-cols-7 gap-1"> 
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium
                text-center col-span-3 sm:col-span-1" style="font-family: Cursive">Lorem.</span>
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium
                text-center col-span-3 sm:col-span-1" style="font-family: Cursive">Lorem ipsum</span>
                <span class="shadow-md bg-gray-400 text-white rounded-md py-0.5 px-2 font-medium
                text-center col-span-3 sm:col-span-1" style="font-family: Cursive">Lorem ipsum.</span>
            </div>  
        </div>
    </div>
    <div class="paragraphs p-8">
        <p class="1" style="font-family:sans-serif;font-size:18px;font-weight:400;
        text-indent: 4em; padding:15px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum
            reprehenderit dolore saepe aliquid consectetur, sed nihil deserunt perferendis
            voluptate hic, laudantium incidunt, quisquam deleniti eius ducimus. Veritatis,
            recusandae! Quos, ab.Magni maxime, vero doloremque laborum eius harum dolore dolor
            quibusdam dolorem? Voluptates labore, aliquid temporibus laborum quidem, aspernatur
            quod tempora, dolores voluptatum hic modi veritatis nemo cum? Culpa, dolorem dolor?</p>
        <p class="2" style="font-family:sans-serif;font-size:18px;font-weight:400;
        text-indent: 4em; padding:15px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum
            reprehenderit dolore saepe aliquid consectetur, sed nihil deserunt perferendis
            voluptate hic, laudantium incidunt, quisquam deleniti eius ducimus. Veritatis,
            recusandae! Quos, ab.Magni maxime, vero doloremque laborum eius harum dolore dolor
            quibusdam dolorem? Voluptates labore, aliquid temporibus laborum quidem, aspernatur
            quod tempora, dolores voluptatum hic modi veritatis nemo cum? Culpa, dolorem dolor?</p>
        <p class="3" style="font-family:sans-serif;font-size:18px;font-weight:400;
        text-indent: 4em; padding:15px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum
            reprehenderit dolore saepe aliquid consectetur, sed nihil deserunt perferendis
            voluptate hic, laudantium incidunt, quisquam deleniti eius ducimus. Veritatis,
            recusandae! Quos, ab.Magni maxime, vero doloremque laborum eius harum dolore dolor
            quibusdam dolorem? Voluptates labore, aliquid temporibus laborum quidem, aspernatur
            quod tempora, dolores voluptatum hic modi veritatis nemo cum? Culpa, dolorem dolor?</p>
    </div>
    <div class="flex justify-center items-end  flex-col" style="margin: 30px;padding-right:10px">
        <p class="author" style="font-family: Arial, sans-serif;
        font-size: 1rem;font-weight: bold;color: #333; margin-bottom: 0.5rem;">Lorem ipsum dolor.</p>
        <p class="date text-center pr-4" style="font-family: Arial, sans-serif;
        font-size: 1rem;font-weight: bold;text-align: center;
        padding-right: 1.5rem;">2014-05-14</p>
    </div>

</div>
<div class="comment border-t-2 bg-white p-4" style="border-top:20px;">
    <div class="p-5 m-5 ">
        <form>
            <label for="chat" class="sr-only">Your message</label>
            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                <button type="button"
                    class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <span class="sr-only">Add emoji</span>
                </button>
                <textarea id="chat" rows="1"
                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your comment..."></textarea>
                <button type="button"
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
    <div class="comment flex flex-col items-center justify-center overflow-y-scroll m-0 md:m-2" style="height: 60vh;">
        <div class="comment-repondre" style="border-redius:30px;background-color:#fcf9ed">
            <div class="border-b-2">
                <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px">
                    <div style="height: 40px; width:40px; overflow:hidden; border-radius:50%;">
                        <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                    </div>
                    <span class="font-medium ">Mohammed moussafia</span>
                </div>
                <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Ipsa, reprehenderit.</p>
                <div class="flex justify-end">
                    <button type="button" style=" font-size: 0.9rem;
                 font-weight: 500;
                 color: #333;
                 text-decoration: none;
                 padding: 0.5rem 1rem;
                 transition: all 0.3s ease;">Rependre</button>
                 <div id="repondreComment">
                    <!---repondre input here -->
                 </div>
                </div>
            </div>
            <div class="rep overflow-y-scroll" style="height: 28vh">
                <div class="repondre border-t-2" style="padding-left:80px;padding-top:20px">
                    <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px">
                        <div style="height: 30px; width:30px; overflow:hidden; border-radius:50%;">
                            <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                        </div>
                        <span class="font-medium">Mohammed moussafia</span>
                    </div>
                    <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Ipsa, reprehenderit.</p>
                </div>
                <div class="repondre border-t-2" style="padding-left:80px;padding-top:20px">
                    <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px">
                        <div style="height: 30px; width:30px; overflow:hidden; border-radius:50%;">
                            <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                        </div>
                        <span class="font-medium">Mohammed moussafia</span>
                    </div>
                    <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Ipsa, reprehenderit.</p>
                </div>
            </div>
           
        </div>
    </div>
</div>




@push('styles')
<style>
@media screen(min-width:768px){
    .comment-repondre{
        margin: 20px;
        padding:30px;
        width:700px;}
}
  
</style>

@endpush






@endsection
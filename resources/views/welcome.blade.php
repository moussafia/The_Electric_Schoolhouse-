@extends('layout.layout')
@section('title','Electrical SchoolHouse')  
@section('content')
<body id="welcome-page">  
    {{-- navBar --}}
    <nav class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4">
    <a href="#" class="flex items-center">
        <img src="{{URL::asset('/assets/image/esh-logo.png')}}" class="h-24 mr-3" alt="Flowbite Logo">
        <span class="self-center hidden md:inline text-2xl font-semibold whitespace-nowrap dark:text-white logo-color">E.S.H</span>
    </a>
    <div class="flex justify-between items-center md:order-2">
        {{-- log in button  --}}
        <a href="{{route('authPages.signUP')}}" class="text-linear-brand
                                    focus:outline-none 
                                    focus:ring-4 
                                    focus:ring-gray-200 
                                    font-medium 
                                    rounded-full 
                                    text-sm 
                                    px-5 py-1.5 
                                    mr-2 mb-2 
                                    dark:border-gray-600 
                                    dark:hover:bg-gray-700 
                                    dark:hover:border-gray-600 
                                    dark:focus:ring-gray-700">
         Sign UP</a>
         <a href="{{route('authPages.logIN')}}" class="text-white
         bg-linear-brand
         focus:outline-none 
         focus:ring-4 
         focus:ring-gray-200 
         font-medium 
         rounded-full 
         text-sm 
         px-5 py-1.5 
         mr-2 mb-2 
         dark:bg-gray-800 
         dark:text-white 
         dark:border-gray-600 
         dark:hover:bg-gray-700 
         dark:hover:border-gray-600 
         dark:focus:ring-gray-700">
        Log IN</a>

        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded md:bg-transparent md:text-dark-700 md:p-0 md:dark:text-dark hover-text" >Home</a>
        </li>
        <li>
            <a href="#partenariat" class="block py-2 pl-3 pr-4 text-gray-900 rounded md:bg-transparent md:text-dark-700 md:p-0 md:dark:text-dark hover-text"  onclick="scrollToDiv()">Partenariats</a>
        </li>
        <li>
            <a href="#about" class="block py-2 pl-3 pr-4 text-gray-900 rounded md:bg-transparent md:text-dark-700 md:p-0 md:dark:text-dark hover-text" onclick="scrollToDiv()">About</a>
        </li>
      
        <li>
            <a href="#contact" class="block py-2 pl-3 pr-4 text-gray-900 rounded md:bg-transparent md:text-dark-700 md:p-0 md:dark:text-dark hover-text" onclick="scrollToDiv()">Contact</a>
        </li>
        </ul>
    </div>
    </div>
    </nav>
<!-- Slider main container -->
    <div id="default-carousel" class="relative w-full z-10" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{URL::asset('/assets/image/pexels-george-becker-117609.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{URL::asset('/assets/image/pexels-miguel-á-padriñán-230518.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{URL::asset('/assets/image/pexels-pixabay-236089.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{URL::asset('/assets/image/pexels-pok-rie-189524.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    {{-- partenariat --}}
<div class="h-30" id="partenariat" style="height:35vh;box-shadow:0 0 8px #eedfdf; ">
    <div class="h-40 py-8" style="height:40%;padding-left:10%">
        <span class="text-center text-teal-600 uppercase text-2xl font-mono font-bold">Notre Partenariat</span>
    </div>
    <div class="flex items-center w-100 h-60 px-10 overflow-x-auto md:overflow-x-hidden scrol" style="height:60%;display:flex;justify-content:space-around;">
            <img style="height:80%;" src="{{URL::asset('/assets/image/lydeec.webp')}}">
            <img style="height:80%;" src="{{URL::asset('/assets/image/oncef.png')}}">
            <img style="height:80%;" src="{{URL::asset('/assets/image/onee.jpg')}}">
            <img style="height:50%;" src="{{URL::asset('/assets/image/siemens.png')}}">
            <img style="height:50%;" src="{{URL::asset('/assets/image/um6p.png')}}">
            <img style="height:80%;" src="{{URL::asset('/assets/image/greenPark.jpg')}}">
    </div>
</div>
{{-- about us --}}
<div class="px-24" id="about" style="height:60vh;box-shadow:0 0 8px #eedfdf; ">
    <div class="h-40 py-8" style="height:20%;padding-left:10%">
        <span class="text-center text-teal-600 uppercase text-2xl font-mono font-bold">About US</span>
    </div>
    <div class="flex items-center" style="height:60%;display:flex;justify-content:space-around;width:auto;margin:30px">
        <div class="pl-5">
            <div class="rounded-full ml-4" style="height: 150px;width:150px;border-radius:50%;overflow:hidden;">
                <img src="{{asset('/assets/image/tec-solaire.jpg')}}"  style="height:100%">
            </div>
        </div>
        <div class="container mx-auto p-4" style="display:flex;justify-content:space-around;;width:70%">
            <p class="whitespace-pre-wrap overflow-scroll text-wrap" 
            style="text-indent: 2em.
            font-family: monospace;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;">Notre site web permet aux utilisateurs de partager et d'améliorer 
                leurs connaissances en génie électrique grâce à des quiz et des actualités du domaine. Les utilisateurs
                 peuvent également gagner des points qui peuvent être convertis en monnaie à la fin de chaque activité. 
                 Une fois inscrits, les utilisateurs peuvent accéder à toutes les fonctionnalités et commencer à partager
                  et à apprendre avec d'autres membres</p>
        </div>
    </div>
</div>
{{-- footer --}}
<footer class="bg-white dark:bg-gray-900 z-10" style="box-shadow:0 0 8px #eedfdf; ">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="#" class="flex items-center justify-center">
                <img src="{{URL::asset('/assets/image/esh-logo.png')}}" class="h-48 mr-2" alt="Flowbite Logo">
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 mr-4">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                  <ul class="text-gray-600 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://www.ieee.org/" class="hover:underline">IEEE</a>
                      </li>
                      <li>
                          <a href="https://www.insa-lyon.fr/fr/formation/ingenieur/electronique-et-genie-electrique" class="hover:underline">INSA</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                  <ul class="text-gray-600 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="#gt" class="hover:underline">Github</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Discord</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                  <ul class="text-gray-600 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">Electrical schoolHouse™</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0 mr-4" id="contact">
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                  <span class="sr-only">Instagram page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                  <span class="sr-only">GitHub account</span>
              </a>
          </div>
      </div>
    </div>
</footer>

@endsection
           
           
            

<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4 w-max">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="#" class="flex items-center mb-4 sm:mb-0">
                <div style="height: 80px; width:80px; overflow:hidden;">
                    <img src="{{asset('assets/image/esh-logo.png')}}" class=""
                        style="height:100%;width:100%">
                </div>
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white logo-color hidden md:inline">E.SchoolHouse</span>
            </a>
            <ul
                class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">À propos</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6"> Politique de confidentialité</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Licence</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contactez-nous</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#"
                class="hover:underline">The-Electric-SchoolHouse™</a>. All Rights Reserved.</span>
    </div>
</footer>
</div>

@extends('layout.footer')
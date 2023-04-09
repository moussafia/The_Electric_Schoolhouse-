<nav class="bg-white shadow-md w-screen h-12 px-2 flex justify-between items-center">
    <div style="height: 60px; width:60px; overflow:hidden;">
        <img src="{{asset('assets/image/esh-logo.png')}}" class="" style="height:100%;width:100%">
    </div>
    <!--drop down --->
    <div class="rounded-full h-75" style="margin-right:40px;cursor:pointer" id="dropdownInformationButton"
        data-dropdown-toggle="dropdownInformation">
        <div style="height: 25px; width:25px; overflow:hidden; border-radius:50%;">
            <img src="{{asset('assets/image/tec-solaire2.jpg')}}" style="width:100%;">
        </div>
        <img src="{{asset('assets/image/dropDown.png')}}" class="ml-1.5" style="height:10px">
    </div>

    <!-- Dropdown menu -->
    <div id="dropdownInformation"
        class="z-10 hidden bg-white my-3 divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div>Bonnie Green</div>
            <div class="font-medium truncate">name@flowbite.com</div>
        </div>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownInformationButton">
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">profile</a>
            </li>
        </ul>
        <div class="py-2">
            <a href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                out</a>
        </div>
    </div>
</nav>
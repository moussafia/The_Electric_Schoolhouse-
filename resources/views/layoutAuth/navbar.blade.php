<nav class="bg-white shadow-md w-full h-12 px-2  flex justify-between items-center sticky z-10 top-0">
    <a href="{{route('dashboardView')}}">
        <div style="height: 60px; width:60px; overflow:hidden;">
            <img src="{{asset('assets/image/esh-logo.png')}}" class="" style="height:100%;width:100%">
        </div>
    </a>
    <!--drop down --->
    <div class="rounded-full h-75" style="margin-right:40px;cursor:pointer" id="dropdownInformationButton"
        data-dropdown-toggle="dropdownInformation">
        <div style="height: 25px; width:25px; overflow:hidden; border-radius:50%;">
            @auth
            <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
            @endauth
        </div>
        <img src="{{asset('assets/image/dropDown.png')}}" class="ml-1.5" style="height:10px">
    </div>

    <!-- Dropdown menu -->
    <div id="dropdownInformation"
        class="z-10 hidden bg-white my-3 divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div class="text-center">{{$user->first_name.' '.$user->last_name}}</div>
            <div class="font-medium truncate text-center">{{$user->email}}</div>
        </div>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownInformationButton">
            <li>
                <a href="{{route('profileView')}}"
                    class="block text-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">profile</a>
            </li>
        </ul>
            <form  method="post" action="{{route('user.logout')}}" class="py-2">
                @csrf
                <button type="submit"
                class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                out</button>
            </form>
    </div>
</nav>
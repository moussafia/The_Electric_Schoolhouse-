<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar"
aria-controls="separator-sidebar" type="button"
class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 md:hidden rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
<span class="sr-only">Open sidebar</span>
<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
    xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd"
        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
    </path>
</svg>
</button>
<aside id="separator-sidebar"
class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
aria-label="Sidebar">
<div class="h-full py-4 overflow-y-auto shadow-sm bg-gray-100 dark:bg-gray-800">
    <div
        class="pb-4 mb-4 flex flex-col items-center font-medium border-b border-gray-200 dark:border-gray-700">
        <div class="rounded-full h-75">
            <div style="height: 60px; width:60px; overflow:hidden; border-radius:50%;">
                <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
            </div>
        </div>
        <span class="py-2 tracking-wide font-mono">{{$user->first_name.' '.$user->last_name}}</span>
    </div>
    <ul class="space-y-2 font-medium">
        <li class="{{request()->is('dashboard')? 'navigation-decore' : ''}}">
            <a href="{{route('dashboardView')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                <svg aria-hidden="true"
                    class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                </svg>
                <span class="ml-3">Dashboard</span>
            </a>
        </li>
        <li class="{{request()->is('profile')? 'navigation-decore' : ''}}">
            <a href="{{route('profileView')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 448 512">
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
                <span class="ml-3">Profile</span>
            </a>
        </li>
        <li class="{{request()->is('articles')|| request()->is('readArticle') ? 'navigation-decore' : ''}}">
            <a href="{{route('ArticlesView')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 512 512">
                    <path
                        d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Articles</span>
            </a>
        </li>
        <li class="{{request()->is('users')? 'navigation-decore' : ''}}">
            <a href="{{route('users.view')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 640 512">
                    <path
                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
        </li>
        <li class="{{request()->is('Quizz')? 'navigation-decore' : ''}}">
            <a href="{{route('Quizz.view')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 320 512">
                    <path
                        d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Quizz</span>
            </a>
        </li>
    </ul>
    <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li class="{{request()->is('help')? 'navigation-decore' : ''}}">
            <a href="{{route('helpView')}}"
                class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg dark:hover:bg-gray-700 dark:text-white group">
                <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="ml-3">Help</span>
            </a>
        </li>
    </ul>
</div>
</aside>

<div class="sm:ml-64 flex flex-col">

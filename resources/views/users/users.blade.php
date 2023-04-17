@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')

<div>
    <div class="search p-8 m-8 bg-white shadow-lg rounded-lg" style="margin: 30px">
        <form >   
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              </div>
              <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search users..." required>
              <button type="button" class="text-white absolute right-2.5 bottom-2 btn rounded-lg">Search</button>
          </div>
      </form>
    </div>
        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg" style="margin: 30px;height:80vh">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 relative" >
                <thead class="text-xs text-gray-700 uppercase
                 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Photo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            first name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            last name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Etat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium 
                        text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="ml-3 border-2"
                            style="height: 40px; width:40px; overflow:hidden; border-radius:50%;margin-left:20px;left:5%;bottom:-30%; transform: translateX(-50%);">
                            <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            Mohammed
                        </td>
                        <td class="px-6 py-4">
                            MOUSSAFIA
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
</div>








@include('layoutAuth.footer')

@endsection
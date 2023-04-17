@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')

<div class="search p-8 m-8 bg-white shadow-lg rounded-lg" style="margin: 30px">
  <form >   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
        <button type="submit" class="text-white absolute right-2.5 bottom-2 btn rounded-lg">Sear<span class="hidden md:inline">ch</span></button>
    </div>
</form>
<div class="flex justify-center gap-3">
    <div class="flex items-center justify-center p-4">
        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
          class="text-white btn  font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
          type="button">
          <span class="hidden md:inline">Filter by </span>&nbsp;category
          <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
      
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
          <h6 class="mb-3 text-sm font-bold text-gray-900 dark:text-white text-center">
            Category
          </h6>
          <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
            <li class="flex items-center">
              <input id="apple" type="checkbox" value=""
                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
      
              <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                Apple (56)
              </label>
            </li>
          </ul>
        </div>
    </div>
    <div class="flex items-center justify-center p-4">
        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
          class="text-white btn font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
          type="button">
          <span class="hidden md:inline">Filter by</span>&nbsp;tags
          <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
      
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
          <h6 class="mb-3 text-sm font-bold text-gray-900 dark:text-white text-center">
            Category
          </h6>
          <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
            <li class="flex items-center">
              <input id="apple" type="checkbox" value=""
                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
      
              <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                Apple (56)
              </label>
            </li>
          </ul>
        </div>
      
    </div>
</div>
</div> 
  <main class="page-content" class=" p-8 bg-white shadow-lg rounded-lg" style="margin: 30px">
    <div class="card rounded-md"
        style="background-image: url(https://images.unsplash.com/photo-1517021897933-0e0319cfbc28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
        <div class="content">
            <h2 class="title"></h2>
            <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed
                it, the mountains</p>
            <a href="{{route('readArticle')}}" class="btn rounded-lg">View Articels</a>
        </div>
    </div>
</main>

@include('layoutAuth.footer')

@endsection


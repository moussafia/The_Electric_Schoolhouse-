@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')

<div>
    <div class="search p-8 m-8 bg-white shadow-lg rounded-lg" style="margin: 30px">
        <form method="get" action="" id="barSearchUsers">   
                <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
              <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                          stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                      </svg>
                  </div>
                  <input type="hidden" name="idUser" id="idUser">
                  <input type="search" id="default-search"
                      class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Search Users..." required>
                  <button type="submit" class="text-white absolute right-2.5 bottom-2 btn rounded-lg">Sear<span
                          class="hidden md:inline">ch</span></button>
              </div>
          <div id="searchResults" class="absolute bg-white shadow-md rounded-lg z-50"
          style=" max-height: 40vh;overflow-y: scroll;">           
          </div>
      </form>
      <div class="flex items-center justify-center p-4">
        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
          class="text-white btn  font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
          type="button">
          <span class="hidden md:inline">Filter by </span>&nbsp;Role
          <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
      
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
          <h6 class="mb-3 text-sm font-bold text-gray-900 dark:text-white text-center">
            Roles
          </h6>
          <div class="overflow-y-scroll" style="height: 12vh">
            <ul class="space-y-2 text-sm" aria-labelledby="rolesDropDownDefault">
                @foreach ($roles as $role)
                <li class="flex items-center">
                    <input id="rolesCheckBox" type="checkbox" value="{{$role->name}}" name="RolesCheck[]"
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{$role->name}}
                    </label>
                </li>
                @endforeach
            </ul>
        </div>
        </div>
    </div>
    </div>
    <div class="h-auto bg-white shadow-md border-0 border-b-2 rounded-lg"  style="margin: 30px"> 
      <div class="flex justify-between items-center px-10 bg-white shadow-sm py-4">
          <div class="ml-6 font-bold uppercase tracking-wide logo-color" style="font-size:20px;text-align:center"><span>Create Roles</span></div>
          <div class="btn rounded-lg text-white flex justify-end mr-6" style="width: 90px"
              data-modal-target="modalCreateRoles" data-modal-toggle="modalCreateRoles">
              <button class="flex items-center gap-2 w-full"><span class="uppercase hidden md:inline">Create</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="currentColor"
                      viewBox="0 0 512 512">
                      <path
                          d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                  </svg>
              </button>
          </div>
      </div>
    </div>
        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg" id="UsersDiv"
        style="margin: 30px;height:80vh" data-url={{route('indexUsers')}}>
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
                            point
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Etat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="overflow-scroll" style="40vh" id="tableUsers">
                    {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium 
                        text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="ml-3 border-2"
                            style="height: 40px; width:40px; overflow:hidden; border-radius:50%;margin-left:20px;left:5%;bottom:-30%; transform: translateX(-50%);">
                            <img src="{{asset('assets/image/user/'.$user->photo)}}" style="width:100%;">
                            </div>
                        </th>
                        <td class="px-6 py-4 uppercase">
                            Mohammed
                        </td>
                        <td class="px-6 py-4 uppercase">
                            MOUSSAFIA
                        </td>
                        <td class="px-6 py-4 uppercase">
                            ***
                        </td>
                        <td class="px-6 py-4 uppercase">
                            Admin
                        </td>
                        <td class="px-6 py-4 text-right flex gap-1 justify-end items-center">
                            <button class="editUser rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>                                  
                            </button>
                            <a href="" class="removeUser rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                  </svg>                                  
                            </a>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
        
</div>

<button id="btnEditRolesForUsers" data-modal-target='modalEditRoles'
type="hidden" data-modal-toggle='modalEditRoles'  ></button>
<button id="btnRemoveUsers" data-modal-target='modalDeleteUsers'
type="hidden" data-modal-toggle='modalDeleteUsers'></button>
<button id="searchBtn2" type="hidden"></button>

@include('Forms.Admins.createRoles')
@include('Forms.Admins.formEditRolesUser')
@include('Forms.Admins.formsdeleteUsers')


@include('layoutAuth.footer')
@push('styles')
<style>
.editUser {
  cursor: pointer;
  margin-top: 1rem;
  padding: 0.5rem 1rem;
  font-size: 0.65rem;
  font-weight: bold;
  letter-spacing: 0.025rem;
  text-transform: uppercase;
  color: white;
  background: linear-gradient(to right,#02a1db89,#a8cf459c);
  border: none;
}
.editUser:hover {
  background-color: #0d0d0d;
}
.editUser:focus {
  outline: 1px dashed yellow;
  outline-offset: 3px;
}

.removeUser {
  cursor: pointer;
  margin-top: 1rem;
  padding: 0.5rem 1rem;
  font-size: 0.65rem;
  font-weight: bold;
  letter-spacing: 0.025rem;
  text-transform: uppercase;
  color: white;
  background: linear-gradient(to right,#db028f89,#cf45459c);
  border: none;
}
.removeUser:hover {
  background-color: #0d0d0d;
}
.removeUser:focus {
  outline: 1px dashed rgb(255, 0, 179);
  outline-offset: 3px;
}
#searchResults div:hover {
    background-color: #e9e9ea
}
</style>

@endpush
@push('scripts')
<script src="{{asset('assets/js/users/getAllusers.js')}}"></script>
<script src="{{asset('assets/js/users/EditRolesUsers.js')}}"></script>
<script src="{{asset('assets/js/users/removesUsers.js')}}"></script>
<script src="{{asset('assets/js/users/searchUsers.js')}}"></script>
<script src="{{asset('assets/js/users/filterByRoles.js')}}"></script>
<script src="{{asset('assets/js/users/CreateRoles.js')}}"></script>

@endpush

@endsection
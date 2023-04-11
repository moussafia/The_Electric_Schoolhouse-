<!-- USER modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl h-full max-h-full overflow-y-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Profile
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form  id="my-form" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="userID">
                    <div>
                        <div class="col-span-full">
                                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Cover photo (Optionnel)</label>      
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="cover" type="file" class="hidden" />
                                </label>
                            </div> 
                      </div>
                        <div class="col-span-full mt-3">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo (Optionnel)</label>
                            <div class="mt-2 flex items-center gap-x-3">
                              <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                              </svg>
                              <input name="photo" type="file" class="block w-0 ml-3 text-xs text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size">
                            </div>
                        </div>     
                    </div>
                    <input type="text" name="first_name" value="{{$user->first_name}}" style="width: 100%"
                        class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                        placeholder="First name (Optionnel)">
                    <input type="text" name="last_name" value="{{$user->last_name}}" style="width: 100%"
                        class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                        placeholder="Last name (Optionnel)">
                        <div class="flex items-center p-4 border-b rounded-t dark:border-gray-600">
                            <input type="checkbox" id="CheckboxEmail" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  />
                            <label class="ml-2 block text-sm font-medium leading-6 text-gray-900">Email</label>
                        </div>
                        <div id="emailChange" style="display:none;">
                            <input type="email" name="email" value="{{$user->email}}" style="width: 100%"
                            class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                            placeholder="Email">
                            <input type="password" name="password_email"
                            style="width: 100%"
                            class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                            placeholder="Password *">
                        </div>
                        <div class="flex items-center p-4 border-b rounded-t dark:border-gray-600">
                            <input type="checkbox" id="CheckboxPassword" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  />
                            <label class="ml-2 block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                    <div id="input-password" style="display:none;">
                        <input type="password" name="old_password" style="width: 100%"
                        class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                        placeholder="Old password *">
                    <input type="password" name="password" style="width: 100%"
                        class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                        placeholder="password">
                    <input type="password" name="password_confirmation"
                        style="width: 100%"
                        class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                        placeholder="confirm password">
                    </div>
                    <div
                        class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="defaultModal" type="submit" data-method="PUT"
                            class="flex justify-center bg-linear-brand my-2 px-6 w-fit text-white py-1.5 rounded-md" id="update-button">update</button>
                            <button  type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="flex justify-center bg-linear-delete my-2 px-6 w-fit text-white py-1.5 rounded-md">delete</button>
                        </button>

                        <!---confirmation delete profile -->
                            <div id="popup-modal" tabindex="-2" class="fixed top-0 left-0  right-0 z-200 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-5rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                            <input type="password" name="password_delete" style="width: 100%"
                        class="my-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 peer focus:border-green-500"
                        placeholder="Your password">
                                            <button data-modal-hide="popup-modal" data-method="DELETE" id="delete-button" type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>





<!---style--->
@push('styles')
<style>
.bg-linear-delete{
    background: linear-gradient(to right,#db020289,#cf45a89c) !important;

}
.bg-linear-delete:hover{
    background: linear-gradient(to right,#db0202e2,#cf45a8e4) !important;
    
}
#popup-modal::before {
  content: "";
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(46, 44, 44, 0.377);
  z-index: -1;
}
</style>
@endpush
@push('scripts')
<script>
    const form = document.getElementById('my-form');
    const updateButton = document.getElementById('update-button');
    const deleteButton = document.getElementById('delete-button');
      updateButton.addEventListener('click', function(event) {
      event.preventDefault();
      form.action = "{{ route('user.update') }}";
      form.submit();
    });
      deleteButton.addEventListener('click', function(event) {
      event.preventDefault();
      form.action = "{{ route('user.delete') }}";
      form.submit();
    });

    const CheckboxPassword=document.getElementById("CheckboxPassword");
    const divPassword=document.getElementById('input-password');
    CheckboxPassword.addEventListener('click',function(){
        if(this.checked){
            divPassword.style.display = "block";
        }else{
            divPassword.style.display = "none";
        }

    })

const emailINP=document.getElementById('emailChange');
const CheckboxEmail=document.getElementById('CheckboxEmail');
CheckboxEmail.addEventListener('click',function(){
        if(this.checked){
            emailINP.style.display = "block";
        }else{
            emailINP.style.display = "none";
        }

    })

  </script>
@endpush
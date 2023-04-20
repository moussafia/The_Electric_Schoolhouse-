@push('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

<!-- Blog modal -->
<div id="modalEditDeleteBlogs" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden
     overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" data-modal="modal">
    <div class="relative w-full max-w-2xl h-full max-h-full overflow-y-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                   Edit your blog
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modalEditDeleteBlogs">
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
                <form  id="formUpdateBlogs" method="POST" action="" enctype="multipart/form-data">
                   @method('PUT')
                    <input type = "hidden" name = "_token" value = '<?php echo csrf_token(); ?>'>
                    <input type="hidden" id="blogId">
                    <div>
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="titleEdit" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="py-6" id="pargraphFormsEdit">
                        {{-- textarea Here --}}
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="font-medium text-sm text-gray-900 dark:text-white">Add paragraph</label>
                        <button class="flex rounded-lg  text-white items-center justify-center addParagr" type="button" onclick="add_paragEdit();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                              </svg>                              
                    </button>
                    </div>
                    <div class="py-4">
                        <label class="block mb-2 font-medium text-gray-900 dark:text-white" style="font-size: 15px" for="multiple_files">Choisir un cover pour votre blogs</label>
                        <input name="image" id="imageUpdate" class="block w-full text-sm text-gray-900 border
                         border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 
                         focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                          type="file" accept="image/jpeg, image/png, image/gif">
                    </div>
              <div class="py-2">
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="categorySelectEdit" name="categories[]" multiple="multiple" class="border border-gray-300 rounded-lg bg-gray-50"
                style="width: 100%">
                @foreach ($categories as $id=>$value)
                     <option value="{{$id}}">{{$value}}</option>
                @endforeach
                  </select>
              </div>
                     <div class="py-2">
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                        <select id="tagSelectEdit" name="tag" multiple="multiple" class="border border-gray-300 rounded-lg bg-gray-50"
                        style="width: 100%">
                        @foreach ($tags as $id=>$value)
                             <option value="{{$id}}">{{$value}}</option>
                         @endforeach
                          </select>
                     </div>
                  <div
                        class="flex items-center justify-between p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="modalEditDeleteBlogs" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancel</button>
                        <button data-modal-hide="modalEditDeleteBlogs" type="submit" id="UpdateBlog"
                            class="flex justify-center bg-linear-brand my-2 px-6 w-fit text-white py-1.5 rounded-md" id="update-button">Update</button>
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
.addParagr{
    cursor: pointer;
    padding: 0.2rem 0.5rem;
    font-size: 0.65rem;
    font-weight: bold;
    background: linear-gradient(to right,#02a1db89,#a8cf459c);
    border: none;
}
.addParagr:hover{
    background-color: #0d0d0d;
}
.deleteparg{
    cursor: pointer;
    padding: 0.2rem 0.5rem;
    font-size: 0.65rem;
    font-weight: bold;
    background: linear-gradient(to right,#db023f89,#cf45919c);
    border: none;
}
.deleteparg:hover{
    background: linear-gradient(to right,#db023fdb,#cf4591e3);

}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0/dist/js.cookie.min.js"></script>
<script src="{{asset('assets/js/profile/blogsEditRemove.js')}}"></script>
@endpush
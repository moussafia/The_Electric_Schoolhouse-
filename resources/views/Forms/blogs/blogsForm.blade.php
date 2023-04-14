<!-- Blog modal -->
<div id="modalAddArticles" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl h-full max-h-full overflow-y-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                   Add your Blog
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modalAddArticles">
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
                <form  id="formBlogs" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="py-6" id="pargraphForms">
                        <div id="row1">
                            <label for="small-input" class="block mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">pargaraph 1</label>
                           <textarea name="paragraph[]" class="paragraphs w-full block rounded-lg h-56 overflow-x-hidden overflow-y-auto border border-gray-300 bg-gray-50">
                            </textarea>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="font-medium text-sm text-gray-900 dark:text-white">Add paragraph</label>
                        <button class="flex rounded-lg  text-white items-center justify-center addParagr" type="button" onclick="add_parag();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                              </svg>                              
                    </button>
                    </div>
                    <div class="py-4">
                        <label class="block mb-2 font-medium text-gray-900 dark:text-white" style="font-size: 15px" for="multiple_files">Choisir un cover pour votre blogs</label>
                        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
                    </div>
              <div class="py-2">
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="categorySelect" name="categories[]" multiple="multiple" class="border border-gray-300 rounded-lg bg-gray-50"
                style="width: 100%">
                @foreach ($categories as $id=>$value)
                     <option value="{{$id}}">{{$value}}</option>
                @endforeach
                  </select>
              </div>
                     <div class="py-2">
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                        <select id="tagSelect" multiple="multiple" class="border border-gray-300 rounded-lg bg-gray-50"
                        style="width: 100%">
                        @foreach ($tags as $id=>$value)
                             <option value="{{$id}}">{{$value}}</option>
                         @endforeach
                          </select>
                     </div>
                  <div
                        class="flex items-center justify-between p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="modalAddArticles" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancel</button>
                        <button data-modal-hide="modalAddArticles" type="submit"
                            class="flex justify-center bg-linear-brand my-2 px-6 w-fit text-white py-1.5 rounded-md" id="update-button">ADD</button>
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
<script>
    $("#categorySelect").select2({
      width: 'resolve' ,
      tags:true,
    tokenSeparators:[','],
    createTag: function(params) {
        var term = $.trim(params.term);
        if (term === '') {
            return null;
        }
        return {
            id: 'new:' + term,
            text: term + ' (new category)',
            newOption: true
        }
    }
})


$("#tagSelect").select2({
      width: 'resolve' ,
      tags:true,
    tokenSeparators:[',']
})
function add_parag(){
    $inp=$('#pargraphForms div').length;
    $inp++;
    console.log($inp);
    $lastInput=$('#pargraphForms div:last')

    $sectionParagraph=`<div id="row`+$inp+`"> 
        <u class="flex justify-between items-center py-4 no-underline font-medium text-gray-900"
         <span for="small-input" class=" mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">pargaraph `
         +$inp+`</span>
        <button type="button" class="flex rounded-lg text-white  items-center justify-center deleteparg w-7 h-7"
        onclick="delete_parag('row`+$inp+`')">
          <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="" stroke="currentColor" class="w-4 h-4">
           <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>                                      
         </button></u>
        <textarea name="paragraph[]" class="paragraphs w-full block rounded-lg h-56 overflow-x-hidden
         overflow-y-auto order border-gray-300 bg-gray-50"></textarea>`

    $lastInput.after($sectionParagraph)
}

function delete_parag(idPragraph){
        $('#'+idPragraph).remove();
}
$(document).ready(function(){
    $('#formBlogs').on('submit',function(e){        
        e.preventDefault();
        var formData = new FormData(this);
        var jwt_token=Cookies.get('jwt_token');
        // var csrf_token=$('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: 'POST',
            url: '/blogStore',
            data: formData,
            headers: {
                'Authorization': 'Bearer ' + jwt_token,
                // 'X-CSRF-TOKEN':csrf_token,
            },
            contentType: false, //application/x-www-form-urlencoded URL-encoded form.
            processData: false,
            success: function(response) {
                console.log('succes'+response);
                // $('#formBlogs')[0].reset();
            },
            error: function(xhr,sta,txt) {
                console.log(xhr,sta,txt)
            }
        })
    })
})

//submit form add blog
// $(function(){
//     $('#formBlogs').submit(function(event){      
//         event.preventDefault();
//         var formData=$(this).serialize();
//         $.ajax({
//             url:$(this).attr('action'),
//             type: 'POST',
//             data:'formData',
//             dataType:'json',
//             succes: function(response){
//                 console.log(response.data);
//                 console.log($('#formBlogs')[0]);
//                 $('#formBlogs')[0].reset();
//                 //update page with data
//             },
//             error: function(xhr,status,error){
//                 console.log(xhr.responseText);
//             }
//         })
        
//     })
// })

  </script>
@endpush
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
  tokenSeparators:[','],
  createTag: function(params) {
    var term = $.trim(params.term);
    if (term === '') {
        return null;
    }
    return {
        id: 'new:' + term,
        text: term + ' (new tag)',
        newOption: true
    }
  }
  })
function add_parag(){
  $inp=$('#pargraphForms div').length;
  
  $inp++;
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
// submit form add blog
$(function(){
  $('#formBlogs').on('submit',function(event){      
      event.preventDefault();
     
      var formData = new FormData();
      formData.append('title', $('#title').val());
  formData.append("image", document.getElementById("image").files[0]);

    $('textarea[name="paragraph[]"]').map(function(){
          formData.append('paragraph[]',$(this).val().trim());
      })
   formData.append('categories',$('#categorySelect').val()); 
   formData.append('tag',$('#tagSelect').val());   

      var jwt_token=Cookies.get('jwt_token');
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          url: $(this).attr('action'),
          type: 'POST',
          dataType:'json',
          contentType: false,
          cache: false,
          processData: false,
          data: formData,
          headers: {
              'X-CSRF-TOKEN': csrf_token,
              'Authorization': 'Bearer ' + jwt_token,
              Accept: 'application/json'
          },
          success: function(response){
            var blog=response.blog;
              $('#formBlogs')[0].reset();
              const categoryIds=blog.categories.map(cat=>cat.categoryId).join(',');
              const TagsIds=blog.tags.map(tag=>tag.tagId).join(',');
              const paragraphs=blog.paragraphs.map(para=>para.paragraph).join(',|-split-|,');
              const para="`"+paragraphs+"`";
              var baseUrl = window.location.origin;
              var readArticleRoute = baseUrl + '/readArticle/';
              //update page with data
              html=`<div class="card rounded-md" 
              style="background-image: url('assets/image/Blogs/${blog.image}');
              background-size: cover; background-position: center;">
                <div class="content">
                <a href="${readArticleRoute}${blog.blogId}" class="pointer-cursor hover:underline">
               <h2 class="title">${blog.title.slice(0,20)}</h2></a>
             <p class="copy">${blog.paragraphs[0].paragraph.slice(0,100)+'...'}</p>
             <button type="button" class="btn rounded-lg btnEditBlog"
               onclick="document.getElementById('modalEditBlog').setAttribute('data-blog-id', '${blog.blogId}');
               document.getElementById('modalEditBlog').setAttribute('data-categories', '${categoryIds}');
               document.getElementById('modalEditBlog').setAttribute('data-tags', '${TagsIds}');
               document.getElementById('modalEditBlog').setAttribute('data-title', '${blog.title}');
               document.getElementById('modalEditBlog').setAttribute('data-paragraphs',${para});
               document.getElementById('modalEditBlog').click();">Edit</button>
               <button  type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
               class="flex justify-center bg-linear-delete my-2 px-3 text-white py-2 rounded-md"
               onclick="document.getElementById('modalRemoveBlog').setAttribute('data-blog-id', '${blog.blogId}');
               document.getElementById('modalRemoveBlog').click();">delete</button>
              </button>
               </div> </div>`;
             $('#cardBlogs').prepend(html);
             $('#score').html(blog.score);
             $('#categorySelect').val(null).trigger('change');
             $("#tagSelect").val(null).trigger('change');
             leadAllCategoryAndTags()
          },
          error: function(xhr,status,error){
              console.log(xhr.responseText);
          },
      })
      
  })
})

function leadAllCategoryAndTags(){
  $.get("/getAllCategory",function (category) {
    $('#categorySelect').empty();
    $('#categorySelectEdit').empty();
    $.each(category, function (index, category) {console.log(category.type);
      $('#categorySelect').append('<option value="' + category.id + '">' + category.type + '</option>');
      $('#categorySelectEdit').append('<option value="' + category.id + '">' + category.type + '</option>');
    });
    });
  $.get("/getAllTags", function (tags) {
    $('#tagSelect').empty();
    $('#tagSelectEdit').empty();
    $.each(tags, function (index, tags) {
      $('#tagSelect').append('<option value="' + tags.id + '">' + tags.tag + '</option>');
      $('#tagSelectEdit').append('<option value="' + tags.id + '">' + tags.tag + '</option>');

    });
    });
}
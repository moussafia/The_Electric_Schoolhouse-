

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
setTimeout(function() {
    $('#success-message').fadeOut();
  }, 2000);

//get Blogs

$(document).ready(function(){
    var url=$('#cardBlogs').data('url');
    $.ajax({
        url: url,
        type:"GET",
        success:function(response){
            var blogs=response.blogs;
            console.log(blogs);
            var html="";
            for(i=0;i<blogs.length;i++){
                html+=`<div class="card rounded-md"
                style="background-image: url('assets/image/Blogs/${blogs[i].image}');
                background-size: cover; background-position: center;">
                  <div class="content">
                 <h2 class="title">${blogs[i].title.slice(0,20)}</h2>
               <p class="copy">${blogs[i].paragraphs[0].paragraph.slice(0,100)+'...'}</p>
               <button type="button" class="btn rounded-lg btnEditBlog" 
               data-modal-target='modalEditDeleteBlogs'
               data-modal-toggle='modalEditDeleteBlogs'>Edit</button>
               </div> </div>`;
            };
            $('#cardBlogs').html(html);
        },
        complete: function(){
         
          $('.btnEditBlog');     
$('.btnEditBlog').attr('data-modal-target','modalEditDeleteBlogs')
.attr('data-modal-toggle','modalEditDeleteBlogs')
        }
    })
})

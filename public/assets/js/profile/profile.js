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
            var html="";
            for(i=0;i<blogs.length;i++){
              const categoryIds=blogs[i].categories.map(cat=>cat.categoryId).join(',');
              const TagsIds=blogs[i].tags.map(tag=>tag.tagId).join(',');
              const paragraphs=blogs[i].paragraphs.map(para=>para.paragraph).join(',|-split-|,');
              var baseUrl = window.location.origin;
              var readArticleRoute = baseUrl + '/readArticle/';
              const para="`"+paragraphs+"`"
                html+=`<div class="card rounded-md" data-blog-id='${blogs[i].blogId}'
                style="background-image: url('assets/image/Blogs/${blogs[i].image}');
                background-size: cover; background-position: center;">
                  <div class="content">
                  <a href="${readArticleRoute}${blogs[i].blogId}" class="pointer-cursor hover:underline">
                 <h2 class="title">${blogs[i].title.slice(0,20)}</h2>
                 <a>
               <p class="copy">${blogs[i].paragraphs[0].paragraph.slice(0,100)+'...'}</p>
              
               <button type="button" class="btn rounded-lg btnEditBlog"
               onclick="document.getElementById('modalEditBlog').setAttribute('data-blog-id', '${blogs[i].blogId}');
               document.getElementById('modalEditBlog').setAttribute('data-categories', '${categoryIds}');
               document.getElementById('modalEditBlog').setAttribute('data-tags', '${TagsIds}');
               document.getElementById('modalEditBlog').setAttribute('data-title', '${blogs[i].title}');
               document.getElementById('modalEditBlog').setAttribute('data-paragraphs',${para});
               document.getElementById('modalEditBlog').click();">Edit</button>
               <div class="flex justify-center items-center">
               <button  type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
               class=" bg-linear-delete my-2 px-3 text-white py-2 rounded-md"
               onclick="document.getElementById('modalRemoveBlog').setAttribute('data-blog-id', '${blogs[i].blogId}');
               document.getElementById('modalRemoveBlog').click();">delete</button>
              </button>
              </div></div> </div>`; 
            }
            $('#cardBlogs').html(html);
            $('#score').html(response.score)  
        }
    })
})


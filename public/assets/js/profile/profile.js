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
              const categoryIds=blogs[i].categories.map(cat=>cat.categoryId).join(',');
              const TagsIds=blogs[i].tags.map(tag=>tag.tagId).join(',');
              const paragraphs=blogs[i].paragraphs.map(para=>para.paragraph).join(',|-split-|,');
              const para="`"+paragraphs+"`"
                html+=`<div class="card rounded-md" data-blog-id='${blogs[i].blogId}'
                style="background-image: url('assets/image/Blogs/${blogs[i].image}');
                background-size: cover; background-position: center;">
                  <div class="content">
                 <h2 class="title">${blogs[i].title.slice(0,20)}</h2>
               <p class="copy">${blogs[i].paragraphs[0].paragraph.slice(0,100)+'...'}</p>
              
               <button type="button" class="btn rounded-lg btnEditBlog"
               onclick="document.getElementById('modalEditBlog').setAttribute('data-blog-id', '${blogs[i].blogId}');
               document.getElementById('modalEditBlog').setAttribute('data-categories', '${categoryIds}');
               document.getElementById('modalEditBlog').setAttribute('data-tags', '${TagsIds}');
               document.getElementById('modalEditBlog').setAttribute('data-title', '${blogs[i].title}');
               document.getElementById('modalEditBlog').setAttribute('data-paragraphs',${para});
               document.getElementById('modalEditBlog').click();">Edit</button>
               </div> </div>`; 
            }
            $('#cardBlogs').html(html);  
        }
    })
})


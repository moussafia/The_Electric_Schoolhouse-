$(document).ready(function(){
    var url=$('#allBlogs').data('url');
    $.ajax({
        url: url,
        type:"GET",
        success:function(response){
            var blogs=response.blogs;
            console.log(blogs);
            var html="";
            var baseUrl = window.location.origin;
            var readArticleRoute = baseUrl + '/readArticle/';
            for(i=0;i<blogs.length;i++){
                html+=`<div class="card rounded-md" data-blog-id='${blogs[i].blogId}'
                style="background-image: url('assets/image/Blogs/${blogs[i].image}');
                background-size: cover; background-position: center;">
                  <div class="content">
                 <h2 class="title">${blogs[i].title.slice(0,20)}</h2>
               <p class="copy">${blogs[i].paragraphs[0].paragraph.slice(0,100)+'...'}</p>
               <a href="${readArticleRoute}${blogs[i].blogId}" class="btn rounded-lg">View Articels</a>
               </div> </div>`; 
            }
            $('#allBlogs').html(html);  
        }
    })
})


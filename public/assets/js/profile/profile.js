
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
                 <h2 class="title">${blogs[i].title.slice(0,20)+'...'}</h2>
               <p class="copy">${blogs[i].paragraphs[0].paragraph.slice(0,100)+'...'}</p>
               <button class="btn rounded-lg">Edit</button>
               </div> </div>`;
            };
            console.log(html);
            $('#cardBlogs').html(html);
        }
    })
})
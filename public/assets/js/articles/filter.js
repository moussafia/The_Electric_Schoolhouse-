$(document).ready(function () {
    var categoryCheckBox=$('input[name="categoryCheck[]"]');
    var tagCheckBox=$('input[name="tagCheck[]"]');
    var categoryChecked=[];
    var tagChecked=[];
    categoryCheckBox.on('change',function(){
     categoryChecked=categoryCheckBox.filter(':checked').map(function(){
            return $(this).val();
        }).get();
        filterBlogs(categoryChecked,tagChecked)
    })
    tagCheckBox.on('change',function(){
      tagChecked=tagCheckBox.filter(':checked').map(function(){
            return $(this).val();
        }).get();
        filterBlogs(categoryChecked,tagChecked)
    })
        
    function filterBlogs(category,tag){
        $.ajax({
            type: "GET",
            url: "/filterBlog",
            data: {
                category:category,
                tag:tag
            },
            dataType: "json",
            cache: false,
            success: function (response) {
                var html="";
                if(response.blogs.length>0){
                    var baseUrl = window.location.origin;
                    var readArticleRoute = baseUrl + '/readArticle/';
                    $.each(response.blogs, function (index, blogs) {
                        html+=`<div class="card rounded-md" data-blog-id='${blogs.id}'
                        style="background-image: url('assets/image/Blogs/${blogs.image}');
                        background-size: cover; background-position: center;">
                          <div class="content">
                         <h2 class="title">${blogs.title.slice(0,20)}</h2>
                       <p class="copy">${blogs.paragraph[0].paragraph.slice(0,100)+'...'}</p>
                       <a href="${readArticleRoute}${blogs.id}" class="btn rounded-lg">View Articels</a>
                       </div> </div>`; 
                    });
                }else{
                    html+=`
                    <div class="h-80 rounded-lg w-full flex justify-center items-center">
                    <span style="font-family: Arial, Helvetica, sans-serif;
                    font-size:20px;font-weight:bold;
                    text-shadow: 0.8px 0.8px 0.8px #000000;">404 Not found...</span>
                    </div>`
                }
                $('#allBlogs').html(html); 
            }
        });
    }
});
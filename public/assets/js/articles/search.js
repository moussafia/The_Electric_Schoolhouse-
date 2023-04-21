$(document).ready(function(){ 
    $('#default-search').on('input',function(){
        var query=$(this).val().trim();
        if(query===''){
            $('#searchResults').empty();
            return;
        }
        $.ajax({
            type:"GET",
            url: '/searchBlogs',
            data: {
                query:query
            },
            dataType: "dataType",
            dataType:'json',
            cache: false,
            success: function (response) {
                var html="";
                $.each(response.blog, function (index, blogs) {
                    html+=`<div class="px-3 py-2 cursor-pointer rounded-lg" style="border-bottom-width: 1px;">
                                <div class="flex items-center gap-2" onclick="
                                document.getElementById('searchBtn2').setAttribute('data-title', '${blogs.title}');
                                document.getElementById('searchBtn2').click();">
                                        <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        <span class="font-bold text-md">${blogs.title}</span>
                                </div>
                                <span class="text-sm pl-5" style="font-family: cursive">${blogs.user.first_name} 
                                ${blogs.user.last_name}</span>
                            </div> `;
                     $('#searchResults').html(html);
                });
            },
            error: function(response) {
                console.log('Error:', response);
            }
        });
    })
})
$(document).ready(function() {
    var searchWidth = $('#default-search').width();
  $('#searchResults').css('width', searchWidth+55 + 'px');
$(window).on('resize', function() {
    var searchWidth = $('#default-search').width();
    $('#searchResults').css('width', searchWidth+55 + 'px');
})
});
$('#searchBtn2').on('click',function(){
    var blogsTitle=$('#searchBtn2').attr('data-title');
    $('#default-search').val(blogsTitle);
    $('#searchResults').empty();
    
})
$(document).ready(function() {
    $('#barSearchBlogs').on('submit',function(e){
        e.preventDefault();
        var query=$('#default-search').val().trim();
        if(query===''){
            return;
        }
        $.ajax({
            type:"GET",
            url: '/barSearchBlogs',
            data: {
                query:query
            },
            dataType: "dataType",
            dataType:'json',
            success: function (response) { $('#searchResults').empty();
                var html="";
                var baseUrl = window.location.origin;
                var readArticleRoute = baseUrl + '/readArticle/';
                $.each(response.blog, function (index, blogs) {console.log(blogs);
                    html+=`<div class="card rounded-md" data-blog-id='${blogs.id}'
                    style="background-image: url('assets/image/Blogs/${blogs.image}');
                    background-size: cover; background-position: center;">
                      <div class="content">
                     <h2 class="title">${blogs.title.slice(0,20)}</h2>
                   <p class="copy">${blogs.paragraph[0].paragraph.slice(0,100)+'...'}</p>
                   <a href="${readArticleRoute}${blogs.id}" class="btn rounded-lg">View Articels</a>
                   </div> </div>`; 
                });
                $('#allBlogs').html(html); 
            },
    })
})
});

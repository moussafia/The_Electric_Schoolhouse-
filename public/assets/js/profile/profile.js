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
            $('#cardBlogs').html(response);
            console.log(response)
        }
    })
})
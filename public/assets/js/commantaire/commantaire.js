$(function(){
    $('#CreateCommaintaire').on('submit',function(e){ 
        e.preventDefault();
        var url=window.location.href;
        var id=url.match(/\/(\d+)(\?.*)?$/);
        var formData=new FormData();
        formData.append('commantaire',$('textarea[name=commantaireInp]').val());
        formData.append('blog_id',id[1]);
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
            success: function (response) {
                
            }
        });
    })
})
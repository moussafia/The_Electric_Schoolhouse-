$(document).ready(function () {
    $('#formDeleteComment').on('submit',function(e){
        e.preventDefault();
        const idComment=$('#deleteRepondre').data('idComment');console.log(idComment);
        var formData = new FormData();
        var jwt_token=Cookies.get('jwt_token');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var url='/deleteComment/'+idComment;
        $(this).attr('action',url);
        $.ajax({
            url: url,
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
                if(response.success){
                $('#commentEnv').find(`[data-id-comment="${idComment}"]`).remove();
            }
                } 
            })
            
        })
        
    })
   
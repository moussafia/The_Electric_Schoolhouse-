$(document).ready(function () {
    $("#formDeleteReponse").on('submit',function(e){
        e.preventDefault();
        var  idRep=$('#deleteReponse').data('idreponse');
        var  idComment=$('#deleteReponse').data('idComment');
        var formData = new FormData();
        formData.append('idUserCreteResponse',$('#deleteReponse').data('idUser'))
        var jwt_token=Cookies.get('jwt_token');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var url='/deleteRep/'+idRep;
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
                $('#rep'+idComment).find(`[data-id-rep="${idRep}"]`).remove();
            }
                } 
            })
            
        })
    })

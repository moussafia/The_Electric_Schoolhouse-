$(document).ready(function () {
    $('#btnRemoveUsers').on('click',function(){
        $('#UserNameDeleted').text($('#btnRemoveUsers').data('UserName'))
        $('#idUserRemoved').val($('#btnRemoveUsers').data('idUser'))

    })

    $('#formDeleteUser').submit(function(event){      
        event.preventDefault();
        var formData = new FormData();
        formData.append('passwordAdmin', $('#passwordAdmin').val());
        var id=$('#idUserRemoved').val()
        formData.append('userId',id );
        var jwt_token=Cookies.get('jwt_token');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/removeUser',
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
                $('#tableUsers').find(`[data-user-id="${id}"]`).remove();
              } 
            },
        })
        
    })
});
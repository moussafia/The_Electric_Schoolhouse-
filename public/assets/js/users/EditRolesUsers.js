$("#RolesUserSelect").select2({ 
    width: 'resolve' ,
    tags:false,
    tokenSeparators:[','],
});
$(document).ready(function () {
    $('#btnEditRolesForUsers').on('click',function(){
        const rolesName=$('#btnEditRolesForUsers').data('RolesName').split('|');
        const userId=$('#btnEditRolesForUsers').data('idUser');
        const userName=$('#btnEditRolesForUsers').data('UserName');
        $('#nameUser').text(userName);
        $("#RolesUserSelect").val(rolesName).trigger('change');
        $('#userId').val(userId);
    })
    $('#formEditRolesUsers').on('submit',function(e){
        e.preventDefault();
        var formData=new FormData();
        var userId=$('#userId').val()
        formData.append('userId',userId)
        formData.append('RolesUser', $("#RolesUserSelect").val())
        var jwt_token=Cookies.get('jwt_token');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: "/updateRolesUser",
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
                console.log(response.rolesUser);
                $('#roles'+userId).empty();
                html=response.rolesUser.map(role => role.name).join('<br>')
                $('#roles'+userId).html(html);
            }
        });
    })
});

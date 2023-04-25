$("#Permissions").select2({ 
    width: 'resolve' ,
    tags:false,
    tokenSeparators:[','],
});
$(document).ready(function () {

    $('#formCreateRoles').on('submit',function(e){
        e.preventDefault();
        var formData=new FormData();console.log($('#newRoleName').val());console.log($("#Permissions").val());
        formData.append('RoleName', $('#newRoleName').val())
        formData.append('permissions', $("#Permissions").val())
        var jwt_token=Cookies.get('jwt_token');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: "/CreateRoles",
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
                var roleName=response.role.name;
                $('#Permissions').val(null).trigger('change');
                $('#newRoleName').val(null);
                $('#RolesUserSelect').append('<option value="' + roleName + '">' +roleName + '</option>');
            }
        });
    })
});
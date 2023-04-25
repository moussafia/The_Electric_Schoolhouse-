$(document).ready(function () {
    var userCheckBox=$('input[name="RolesCheck[]"]');
    var userChecked=[];
    userCheckBox.on('change',function(){
        userChecked=userCheckBox.filter(':checked').map(function(){
            return $(this).val();
        }).get();
        filterBlogs(userChecked)
    })
      
    function filterBlogs(role){
        $.ajax({
            type: "GET",
            url: "/filterUsers",
            data: {
                role:role
            },
            dataType: "json",
            cache: false,
            success: function (response) {console.log(response.users);
                var html="";
                if(response.users.length>0){
                var baseUrl=window.location.origin+'/assets/image/user/';
                $.each(response.users, function (index, users) {console.log(users);
                    var rolesName=users.roles.map(role => role.name).join('|');
                    html+=`
                    <tr class="bg-white border-b dark:bg-gray-800
                    dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    data-user-id="${users.id}">
                          <th scope="row" class="px-6 py-4 font-medium 
                          text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="ml-3 border-2"
                              style="height: 40px; width:40px; overflow:hidden; border-radius:50%;margin-left:20px;left:5%;bottom:-30%; transform: translateX(-50%);">
                              <img src="${baseUrl}${users.photo}" style="width:100%;">
                              </div>
                          </th>
                          <td class="px-6 py-4 uppercase">
                              ${users.first_name}
                          </td>
                          <td class="px-6 py-4 uppercase"> 
                              ${users.last_name}
                          </td>
                          <td class="px-6 py-4 uppercase">
                              ${users.score.score}
                          </td>
                          <td class="px-6 py-4 uppercase" id="roles${users.id}">
                          ${users.roles.map(role => role.name).join('<br>')}
                          </td>
                          <td class="px-6 py-4 text-right flex gap-1 justify-end items-center">
                              <button class="editUser rounded-lg" "
                              onclick="$('#btnEditRolesForUsers').data('idUser','${users.id}');
                              $('#btnEditRolesForUsers').data('UserName','${users.last_name}');
                              $('#btnEditRolesForUsers').data('RolesName','${rolesName}');
                              $('#btnEditRolesForUsers').click()">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>                                  
                              </button>
                              <buton  class="removeUser rounded-lg"
                              onclick="$('#btnRemoveUsers').data('idUser','${users.id}');
                              $('#btnRemoveUsers').data('UserName','${users.last_name}');
                              $('#btnRemoveUsers').click();">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                                  
                              </button>
                          </td>
                      </tr>`; 
                });
                }else{
                html+=`
                <div class="h-80 rounded-lg w-full flex justify-center items-center">
                <span style="font-family: Arial, Helvetica, sans-serif;
                font-size:20px;font-weight:bold;
                text-shadow: 0.8px 0.8px 0.8px #000000;">404 Not found...</span>
                </div>`
                }
                $('#tableUsers').html(html);
            }
        });
    }
});
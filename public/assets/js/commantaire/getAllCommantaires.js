$(document).ready(function () {
    var baseUrl=window.location.href;
    var id=baseUrl.match(/\/(\d+)(\?.*)?$/);
    var url=$('#commentEnv').data('url')
    $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
            var html='';
            var urlimg=window.location.origin+'/assets/image/user/';
            $.each(response.comments,function(index,comment){
                html+=`<div class="comment-repondre rounded-lg" data-id-comment="${comment.id}" 
                style="border-redius:30px;background-color:#fcf9ed;width:90%;margin:2px;padding:10px">
                <div class="border-b-2">
                    <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px;margin-top:6px">
                        <div style="height: 40px; width:40px; overflow:hidden; border-radius:50%;">
                            <img src="${urlimg}${comment.user.photo}" style="width:100%;">
                        </div>
                        <span>
                            <span class="font-medium ">${comment.user.first_name} ${comment.user.last_name}</span><br>
                            <span class="text-end pl-3" style="font-family: cursive;font-size:10px">${comment.created_at.substring(0,10)}</span>
                        </span>
                    </div>
                    <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">${comment.commantaire}</p>
                    <div class="flex flex-col items-end justify-end">
                        <div>
                        ${comment.user.id===response.userAuth?`
                            <button type="button" class="" style=" font-size: 0.9rem;
                            font-weight: 500;
                            color: #333;
                            text-decoration: none;
                            padding: 0.5rem 1rem;
                            transition: all 0.3s ease;">
                                   <span class="hover:underline"
                                   onclick="$('#deleteComment').data('idUser','${comment.user.id}');
                                    $('#deleteComment').data('idComment','${comment.id}');
                                   $('#deleteComment').click();">Supprimer</span> </button>`:``}
                               <button type="button" style=" font-size: 0.9rem;
                            font-weight: 500;
                            color: #333;
                            text-decoration: none;
                            padding: 0.5rem 1rem;
                            transition: all 0.3s ease;" id="repondre${comment.id}">
                                   <span class="hover:underline">Repondre</span></button>
                                    </div>
                        <div id="repondreComment${comment.id}" class="w-full px-3 py-3">
                            <!---repondre input here -->
                            <form id="CreateRepondre${comment.id}" method="post" action="">
                                <input type="hidden" name="_token" value='<?php echo csrf_token(); ?>'>
                                <input type="hidden" name="commentId" id="commentId${comment.id}" value="${comment.id}">
                                <label for="chat" class="sr-only">Your message</label>
                                <div class="flex items-center px-3 py-2 rounded-lg  dark:bg-gray-700">
                                    <textarea rows="1" name="RepndreInp"
                                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Your reponse..."></textarea>
                                    <button type="submit"
                                        class="inline-flex justify-center p-2 text-green-500 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                        <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                            </path>
                                        </svg>
                                        <span class="sr-only">Send repondre</span>
                                    </button>
                                </div>
                            </form>
    
                        </div>
                    </div>
                </div>
                <div class="rep overflow-y-scroll" id="rep${comment.id}" style="max-height: 28vh">`
                $.each(comment.repondre, function (index, rep) { 
                    html+=`
                       <div class="repondre border-t-2" style="padding-left:80px;padding-top:20px"
                       data-id-rep="${rep.id}">
                        <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px">
                                   <div style="height: 35px; width:35px; overflow:hidden; border-radius:50%;">
                                       <img src="${urlimg}${rep.user.photo}" style="width:100%;">
                                   </div>
                           <span>
                           <span class="font-medium ">${rep.user.first_name} ${rep.user.last_name}</span><br>
                           <span class="text-end pl-3" style="font-family: cursive;font-size:10px">${rep.created_at.substring(0,10)}</span>
                           </span>
                       </div>
                       <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">${rep.reponse}</p>
                       <div class="flex justify-end pl-3">
                       ${rep.user.id===response.userAuth?`
                            <button type="button"  style=" font-size: 0.9rem;
                            font-weight: 500;
                            color: #333;
                            text-decoration: none;
                            padding: 0.5rem 1rem;
                            transition: all 0.3s ease;"
                            onclick="$('#deleteReponse').data('idreponse','${rep.id}');
                            $('#deleteReponse').data('idUser','${rep.user.id}');
                            $('#deleteReponse').data('idComment','${comment.id}');
                                    $('#deleteReponse').click();">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                    style=":hover{fill:red}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                    onmouseover="this.style.fill='red';" onmouseout="this.style.fill='';" />
                                    </svg>
                            </button>`:``}
                         </div>
                   </div>
                    `
               });     
               html+=` </div>
            </div>`;
            $(document).ready(function () {
                $('#CreateRepondre'+comment.id).hide();
                $(document).on('click','#repondre'+comment.id,function(){
                $('#CreateRepondre'+comment.id).slideToggle(300);
                })
            });
            //repondre POST
            $(document).ready(function () {
                $('#CreateRepondre'+comment.id).on('submit',function(e){
                    e.preventDefault();
                    var formData=new FormData();
                    formData.append('repondre',$('textarea[name=RepndreInp]').val());
                    formData.append('comment_id',$('#commentId'+comment.id).val());
                    var jwt_token=Cookies.get('jwt_token');
                    var csrf_token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "POST",
                        url: "/createRepondre",
                        data: formData,
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
                            var rep=response.rep;
                            var html2=`<div class="repondre border-t-2" style="padding-left:80px;padding-top:20px"
                            data-id-rep="${rep.id}">
                                <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px">
                                            <div style="height: 35px; width:35px; overflow:hidden; border-radius:50%;">
                                                <img src="${urlimg}${rep.user.photo}" style="width:100%;">
                                            </div>
                                    <span>
                                    <span class="font-medium ">${rep.user.first_name} ${rep.user.last_name}</span><br>
                                    <span class="text-end pl-3" style="font-family: cursive;font-size:10px">${rep.created_at.substring(0,10)}</span>
                                    </span>
                                </div>
                                <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">${rep.reponse}</p>
                                <div class="flex justify-end pl-3">
                                        <button type="button"  style=" font-size: 0.9rem;
                                    font-weight: 500;
                                    color: #333;
                                    text-decoration: none;
                                    padding: 0.5rem 1rem;
                                    transition: all 0.3s ease;"
                                    onclick="$('#deleteReponse').data('idreponse','${rep.id}');
                                    $('#deleteReponse').data('idUser','${rep.user.id}');
                                    $('#deleteReponse').data('idComment','${comment.id}');
                                            $('#deleteReponse').click();">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                            style=":hover{fill:red}">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                            onmouseover="this.style.fill='red';" onmouseout="this.style.fill='';" />
                                            </svg>
                                    </button>
                            </div>
                            </div>
                            `
                            $('#rep'+comment.id).prepend(html2);
                            $('textarea[name=RepndreInp]').val('');
                        }

                    });
                })
            });
         
        })
            $('#commentEnv').html(html);
        },
        complete:function(){
  
        }
    });
});
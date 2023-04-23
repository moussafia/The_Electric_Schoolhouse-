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
                var comment=response.comment;
                var baseUrl=window.location.origin;
                var url=baseUrl+'/assets/image/user/'
                var html=`<div class="comment-repondre rounded-lg" data-id-comment="${comment.id}"
                style="border-redius:30px;background-color:#fcf9ed;width:90%;margin:2px;padding:10px">
                <div class="border-b-2">
                    <div class="flex items-center gap-4 border-b-2 p-3" style="width: 300px;margin-top:6px">
                        <div style="height: 40px; width:40px; overflow:hidden; border-radius:50%;">
                            <img src="${url}${comment.user.photo}" style="width:100%;">
                        </div>
                        <span>
                            <span class="font-medium ">${comment.user.first_name} ${comment.user.last_name}</span><br>
                            <span class="text-end pl-3" style="font-family: cursive;font-size:10px">${comment.created_at.substring(0,10)}</span>
                        </span>
                    </div>
                    <p class="p-4 indent-4" style="font-family: sans-serif;font-size:15px">${comment.commantaire}</p>
                    <div class="flex flex-col items-end justify-end">
                        <div>
                            <button type="button" class="" style=" font-size: 0.9rem;
                            font-weight: 500;
                            color: #333;
                            text-decoration: none;
                            padding: 0.5rem 1rem;
                            transition: all 0.3s ease;">
                                   <span class="hover:underline"
                                   onclick="$('#deleteRepondre').data('idComment','${comment.id}');
                                   $('#deleteRepondre').click();">Supprimer</span> </button>
                               <button type="button" style=" font-size: 0.9rem;
                            font-weight: 500;
                            color: #333;
                            text-decoration: none;
                            padding: 0.5rem 1rem;
                            transition: all 0.3s ease;" id="repondre${comment.id}">
                                   <span class="hover:underline">Repondre</span></button>
                        </div>
                        <div id="repondreComment" class="w-full px-3 py-3">
                            <!---repondre input here -->
                            <form id="CreateRepondre${comment.id}" method="post" action="">
                                <input type="hidden" name="_token" value='<?php echo csrf_token(); ?>'>
                                <label for="chat" class="sr-only">Your message</label>
                                <div class="flex items-center px-3 py-2 rounded-lg  dark:bg-gray-700">
                                    <textarea rows="1" name="RepndreInp"
                                        class="block mx-4 p-2.5 w-full text-sm text-gray-900
                                         bg-white rounded-lg border border-gray-300 
                                         focus:ring-green-500 focus:border-green-500
                                          dark:bg-gray-800 dark:border-gray-600 
                                          dark:placeholder-gray-400 dark:text-white 
                                          dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                <div class="rep overflow-y-scroll" id="repondreComment${comment.id}" style="max-height: 28vh">
                   
                </div>
            </div>
                `
                $('#commentEnv').prepend(html);
                $(document).ready(function () {
                    $('#CreateRepondre'+comment.id).hide();
                    $(document).on('click','#repondre'+comment.id,function(){
                    $('#CreateRepondre'+comment.id).slideToggle(300);
                    })
                });
                //send repondre request
                $(document).ready(function () {
                    $('#CreateRepondre'+comment.id).on('submit',function(e){
                        e.preventDefault();
                        var formData=new FormData();
                        formData.append('repondre',$('textarea[name=RepndreInp]').val());
                        formData.append('comment_id',comment.id);
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
                                var urlimg=window.location.origin+'/assets/image/user/';
                                var html2=`<div class="repondre border-t-2" style="padding-left:80px;padding-top:20px">
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
                                </div>
                                `
                                $('#repondreComment'+comment.id).prepend(html2);
                             $('textarea[name=RepndreInp]').val('');
                            }
                        });
                    })
                });
                $('textarea[name=commantaireInp]').val('');
            }
        });
    })
})

$(document).ready(function () {
    $('#CreateRepondre').hide();
    $(document).on('click','#repondre',function(){
    $('#CreateRepondre').slideToggle(300);
    })
});

$(document).ready(function(){
    var url=$('#myQuizzCreted').data('url');
    $.ajax({
        url: url,
        type:"GET",
        success:function(response){
            let quizz=response.quizz;
            let html=``;
            $.each(quizz, function (index, quizz) { 
                 html+=`
                 <div class="card rounded-md"
                    style="background-image: url('assets/image/Quizz/${quizz.image}');
                    background-size: cover; background-position: center;"">
                    <div class="content">
                        <h2 class="title">${quizz.name.slice(0,22)+'...'}</h2>
                        <p class="copy">${quizz.created_at}<br>
                        ${quizz.user.first_name} ${quizz.user.last_name}</p>
                           
                    </div>
                </div>`
            });
            $('#myQuizzCreted').html(html);
            }
           
        })
    })

$(document).ready(function(){
   var url=$('#allQuizz').data('url');
    $.ajax({
    type: "GET",
    url: url,
    success: function (response) {
        let quizz=response.data;
        console.log(quizz);
        let html=``;
        var baseUrl = window.location.origin;
        var passageQuizz=baseUrl+'/passageQuizz/'
        $.each(quizz, function (index, quizz) { 
             html+=`
             <div class="card rounded-md"
                style="background-image: url('assets/image/Quizz/${quizz.image}');
                background-size: cover; background-position: center;"">
                <div class="content">
                    <h2 class="title">${quizz.name.slice(0,22)+'...'}</h2>
                    <p class="copy">${quizz.created_at}<br>
                    ${quizz.user.first_name} ${quizz.user.last_name}</p>
                        <a href="${passageQuizz}${quizz.id}"}">
                            <button class="btn rounded-lg">Passer</button>
                        </a>
                </div>
            </div>`
        });
        $('#allQuizz').append(html);
    }
   });
});
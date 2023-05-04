$(document).ready(function () {
    $('#submitAll').on('click',function(){
        const forms=$('#modalCreateQuizz form');
        const Quizz=[];
        Quizz.push({Quizz:forms.eq(0).find('input[name=nameQuizz]').val().trim()})
        forms.slice(1).each(function(index){
            let question = $(this).find('textarea').val().trim();
            let answers = [];
            $(this).find('input[name=answer\\[\\]]').each(function(){
                let answer = $(this).val().trim();
                let trueAnswer = $(this).parent().next().find('input[name=trueAnswer\\[\\]]').prop('checked');
                answers.push({ Answer: answer, trueAnswer: trueAnswer });
            });
            Quizz.push({ question: question, answers: answers });
        });
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/InsertQuizz",
            type: "POST",
            data: {quizzData: JSON.stringify(Quizz)},
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            success: function(response) {
              let quizz=response.quizz;       
                let   html=`
                   <div class="card rounded-md"
                      style="background-image: url('assets/image/Quizz/${quizz.image}');
                      background-size: cover; background-position: center;"">
                      <div class="content">
                          <h2 class="title">${quizz.name.slice(0,22)+'...'}</h2>
                          <p class="copy">${quizz.created_at}<br>
                          ${quizz.user.first_name} ${quizz.user.last_name}</p>
                      </div>
                  </div>`
              $('#myQuizzCreted').prepend(html);
              $('#score').html(response.score)
            },
            error: function(xhr) {
              console.log(xhr.responseText);
            }
          });
    });
});
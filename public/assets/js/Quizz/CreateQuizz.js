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
        console.log(Quizz); 
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/InsertQuizz",
            type: "POST",
            data: {quizzData: JSON.stringify(Quizz)},
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            success: function(response) {
              console.log(response);
            },
            error: function(xhr) {
              console.log(xhr.responseText);
            }
          });
    });
});
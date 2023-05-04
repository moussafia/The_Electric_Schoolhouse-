const timer = document.getElementById('timer');
const audio = document.getElementById('audio');
const rules=document.getElementById('rules');
const passageQuizz=document.getElementById('passageQuizzDiv')
const countoerDown=document.getElementById('countoerDown')
const BtnnextQuestion=document.getElementById('nextQuestion');
const resultatAnswerUser=document.getElementById('pageResult');

let count = 2;
let interval = 1000;
function startQuizz(){
  rules.classList.add('hidden');
  // wait for audio file to be ready before playing it
  audio.play();
  timer.innerText = 3;
  function startCountdown() {
    // set initial timer text
    timer.innerText = count;
    // start countdown interval
    const timerInterval = setInterval(() => {
      count--;
  
      // update timer text
      if (count === 0) {
        timer.innerText = "Start";
        timer.classList.add("start-effect");
        clearInterval(timerInterval);
        setTimeout(() => {
          countoerDown.classList.add('hidden');
        }, 1000);

        // add a delay of 1 second before showing the passageQuizz element
        setTimeout(() => {
          passageQuizz.classList.remove('hidden');
        }, 1015);
        const data=$('#QuizzData').data('quizz')
      } else {
        timer.classList.remove("start-effect");
        timer.innerText = count;
      }
    }, interval);
  }
  
  // add a delay of 1 second before starting the countdown
  setTimeout(startCountdown, 1000);
}
const data = $('#QuizzData').data('quizz');

let answerUser = [];
answerUser.push({idQuizz:data[0].id})
answerUser.push({idQuestion:[],idAnswers:[]})
const question = data[0].question;//question array answers and questions
let questionArea = document.getElementById('questionArea');
questionArea.innerHTML = question[0].question;
let html = '';
for (let i = 0; i < question[0].answer.length; i++) {
  html += `
    <div class="answer rounded-lg flex gap-2 items-center" style="
      font-weight:500;justify-content:space-around
      font-family:Arial, Helvetica, sans-serif;">
      <input type="checkbox" class="w-5 h-5 bg-gray-100 rounded checkBox"
        data-answerid="${question[0].answer[i].id}">
      <p class="text-white text-center indent-4">
        ${question[0].answer[i].answers}
      </p>
    </div>`;
}
$('#answers').html(html);

$('.checkBox').on('change', function() {
  const answerId = $(this).data('answerid');
  const isChecked = $(this).prop('checked');
  const questionId=question[0].id

  const userAnswerIndex=answerUser.findIndex(answer=>answer.idQuestion===questionId)

  if(isChecked){
    if(userAnswerIndex!==-1){
      answerUser[userAnswerIndex].idAnswers.push(answerId);
    }else{
      answerUser.push({idQuestion:questionId,idAnswers:[answerId]})
    }
  }else{
    const answerIndex = answerUser[userAnswerIndex].idAnswers.findIndex(id => id === answerId);
    if (answerIndex !== -1) {
      answerUser[userAnswerIndex].idAnswers.splice(answerIndex, 1);
    }
  }
console.log(answerUser);
  const hasAnswer = answerUser.some(answer => answer.idQuestion === questionId  && answer.idAnswers.length > 0 );
  
  if (hasAnswer) {
    BtnnextQuestion.classList.remove('hidden');
  } else {
    BtnnextQuestion.classList.add('hidden');
  }
})
let index = 0;

function nextQuestion() {
  BtnnextQuestion.classList.add('hidden');
  index++;
  if (index < question.length) {
    questionArea.innerHTML = question[index].question;
    let html = '';
    for (let i = 0; i < question[index].answer.length; i++) {
      html += `
        <div class="answer rounded-lg flex gap-2 items-center" style="
          font-weight:500;justify-content:space-around
          font-family:Arial, Helvetica, sans-serif;">
          <input type="checkbox" class="w-5 h-5 bg-gray-100 rounded checkBox"
            data-answerid="${question[index].answer[i].id}">
          <p class="text-white text-center indent-4">
            ${question[index].answer[i].answers}
          </p>
        </div>`;
    }
    $('#answers').html(html);
    $('.checkBox').on('change', function() {
      const answerId = $(this).data('answerid');
      const isChecked = $(this).prop('checked');
      const questionId=question[index].id
    
      const userAnswerIndex=answerUser.findIndex(answer=>answer.idQuestion===questionId)
    
      if(isChecked){
        if(userAnswerIndex!==-1){
          answerUser[userAnswerIndex].idAnswers.push(answerId);
        }else{
          answerUser.push({idQuestion:questionId,idAnswers:[answerId]})
        }
      }else{
        const answerIndex = answerUser[userAnswerIndex].idAnswers.findIndex(id => id === answerId);
        if (answerIndex !== -1) {
          answerUser[userAnswerIndex].idAnswers.splice(answerIndex, 1);
        }
      }
    console.log(answerUser);
      const hasAnswer = answerUser.some(answer => answer.idQuestion === questionId  && answer.idAnswers.length > 0 );
      
      if (hasAnswer) {
        BtnnextQuestion.classList.remove('hidden');
      } else {
        BtnnextQuestion.classList.add('hidden');
      }
    })
  }else{
    sendData();
    resultatAnswerUser.classList.remove('hidden');
    passageQuizz.classList.add('hidden');
  }

}

function sendData() {
  // Serialize the answerUser array as JSON
  const answerData = JSON.stringify(answerUser);
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
$.ajax({
  type: "POST",
  url: "/sendreponseUser",
  data: {
    data:answerData
  },
  headers: {
    'X-CSRF-TOKEN': csrf_token
  },
  success: function (response) {
    $('#scoreUser').text(`${response.score}/${answerUser.length-2}`);
  }
});

}
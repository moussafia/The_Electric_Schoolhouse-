let answerCount = 1;
let formCount=1;
function add_answer(e){
  var button = e.currentTarget;
  var div = button.parentNode.previousElementSibling;

  const newDiv = document.createElement("div");
  answerCount++;
  newDiv.setAttribute("id", "row"+answerCount);
  newDiv.innerHTML = `
    <div class="flex flex-col" >
      <div class="flex justify-between items-center py-4 no-underline font-medium text-gray-900">
          <p 
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer</p>
            <button type="button" class="flex rounded-lg text-white  items-center justify-center deleteparg w-7 h-7"
          onclick="delete_answer('row${answerCount}')">
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
              </svg>                                      
          </button>
       </div>
      <input type="text" name="answer[]"
        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="flex items-center mb-4">
      <input type="checkbox" name="trueAnswer[]"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
      <label for="default-checkbox"
        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">True Answer</label>
    </div>
  `;
  div.appendChild(newDiv);


  }
  
  function delete_answer(idPragraph){
        $('#'+idPragraph).remove();
  }


  function add_question(e){
    var button=e.currentTarget
  var div = button.parentNode.previousElementSibling;

  const newDiv = document.createElement("form");
  newDiv.setAttribute("method", "POST");
  formCount++;
  newDiv.setAttribute("id", "form"+formCount);
  newDiv.innerHTML = `
  <form id="formQuestionAndAnswers${formCount}" action="">
  <div class="border-b-2" style="padding-bottom: 10px">
      <div class="py-6">
          <div>
              <label for="small-input"
                  class="block mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">Qusetion
                  ${formCount}</label>
              <textarea name="QuestionCreate"
                  class="paragraphs w-full block rounded-lg h-40 overflow-x-hidden overflow-y-auto border border-gray-300 bg-gray-50">
              </textarea>
          </div>
      </div>
      <div >
          <div>
              <div>
                  <label for="small-input"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer</label>
                  <input type="text" name="answer[]"
                      class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
              <div class="flex items-center mb-4">
                  <input type="checkbox" name="trueAnswer[]"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="default-checkbox"
                      class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">True 
                      Answer</label>
              </div>
          </div>
          
      </div>
      <div class="addAnswer">
      </div>
      <div class="flex items-center gap-2 py-3 my-7">
          <label class="font-medium text-sm text-gray-900 dark:text-white">Add Answer</label>
          <button class="flex rounded-lg  text-white items-center justify-center addParagr"
              type="button" onclick="add_answer(event);">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
          </button>
      </div>
  </div>
</form>
  `;
  div.appendChild(newDiv);
  }
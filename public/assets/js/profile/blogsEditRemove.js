$("#categorySelectEdit").select2({ 
    width: 'resolve' ,
    tags:true,
    tokenSeparators:[','],
    createTag: function(params) {
      var term = $.trim(params.term);
      if (term === '') {
          return null;
      }
      return {
          id: 'new:' + term,
          text: term + ' (new category)',
          newOption: true
      }
    }
    })
    
  $("#tagSelectEdit").select2({
    width: 'resolve' ,
    tags:true,
    tokenSeparators:[','],
    createTag: function(params) {
      var term = $.trim(params.term);
      if (term === '') {
          return null;
      }
      return {
          id: 'new:' + term,
          text: term + ' (new tag)',
          newOption: true
      }
    }
    })
  function add_paragEdit(){
    $inp=$('#pargraphFormsEdit div').length;
    console.log($('#pargraphFormsEdit').val());
    
    $inp++;
    const textarea=$('#pargraphFormsEdit');
    const sectionParagraph=`<div id="rowEditCretae`+$inp+`"> 
        <u class="flex justify-between items-center py-4 no-underline font-medium text-gray-900"
         <span for="small-input" class=" mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">pargaraph `
         +$inp+`</span>
        <button type="button" class="flex rounded-lg text-white  items-center justify-center deleteparg w-7 h-7"
        onclick="delete_paragEdit('rowEditCretae`+$inp+`')">
          <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="" stroke="currentColor" class="w-4 h-4">
           <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 
           1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 
           0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114
            1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964
             0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>                                      
         </button></u>
        <textarea name="paragraph[]" class="paragraphs w-full block rounded-lg h-56 overflow-x-hidden
         overflow-y-auto order border-gray-300 bg-gray-50"></textarea>`
         textarea.append(sectionParagraph)
  }
  
  function delete_paragEdit(idPragraph){
        $('#'+idPragraph).remove();
  }
  
//remplir form Edit
  function RemplirForm(){
    const btnEdit=$('#modalEditBlog');
    const title=btnEdit.attr('data-title');
    const blogId=btnEdit.attr('data-blog-id');
    const categories=btnEdit.attr('data-categories').split(',');
    const tags=btnEdit.attr('data-tags').split(',');
    const paragraphs=btnEdit.attr('data-paragraphs').split(',|-split-|,');
    $('#blogId').val(blogId);
    $('#titleEdit').val(title);
    $('#categorySelectEdit').val(categories).trigger('change.select2');
    $('#tagSelectEdit').val(tags).trigger('change.select2');
    let textarea=$('#pargraphFormsEdit');
    textarea.empty();
    paragraphs.forEach(function(paragraph,index){
      index++;
    const sectionParagraph=`<div id="rowEdit`+index+`"> 
        <u class="flex justify-between items-center py-4 no-underline font-medium text-gray-900"
         <span for="small-input" class=" mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">pargaraph `
         +index+`</span>
        <button type="button" class="flex rounded-lg text-white  items-center justify-center deleteparg w-7 h-7"
        onclick="delete_paragEdit('rowEdit`+index+`')">
          <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="" stroke="currentColor" class="w-4 h-4">
           <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 
           1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 
           0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114
            1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964
             0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>                                      
         </button></u>
        <textarea name="paragraph[]" class="paragraphs w-full block rounded-lg h-56 overflow-x-hidden
         overflow-y-auto order border-gray-300 bg-gray-50">${paragraph}</textarea>`
   
         textarea.append(sectionParagraph)
    })
  }
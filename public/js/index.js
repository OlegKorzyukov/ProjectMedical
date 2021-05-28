
$(document).ready(function () {
   initChangeType();
   getCategoryList();
   showEditButton();
});

function initChangeType(){
   
   $('.supplies_type').on('change', function() {
      let html = '';
      removeOldInput(['input_field.optional','select_wrapper.optional','select_wrapper.optional']);
      switch(this.value){
         case 'manufacturer':
            html = `<input class="supplies_name input_field optional" name="supplies_link" type="url" placeholder="Ссылка на сайт">`;
         break;
         case 'medicine':
            html = `
            <input class="supplies_price input_field optional" 
            name="supplies_price" type="number" placeholder="Цена">
            <div class="group_medicine">
            <div class="select_wrapper optional">
            <select class="supplies_substance" name="supplies_substance">
               <option value="substance" selected>Действующее вещество</option>
            </select>
            </div>
            <div class="select_wrapper optional">
            <select class="supplies_manufacturer" name="supplies_manufacturer">
               <option value="substance" selected>Производитель</option>
            </select>
            </div>
            </div>
            `;
         sendRequest('/supplies');
         
         break;
      }
      $('.input__wrapper').append(html);
    });
}

function removeOldInput ([...removeClass]) { 
   for (const value of removeClass) {
         $('.' + value).remove();
   }
 }

 function getCategoryList(){
   $('.category').on('click', function(e){
      const cardAttr = $(e.target).data('card-name');
      $('.content__card').removeClass('active');
      $(e.target).addClass('active');
      
      $('.content__table').addClass('hidden');
      $('#' + cardAttr + ' .content__table').toggleClass('hidden');
      
   });
 }

  function sendRequest(url){
   let token = document.querySelector('input[name=_token]').getAttribute('value');
   fetch(url, {
      headers: {
          "Content-Type": "application/json",
          "Accept": "application/json, text-plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token
          },
      method: 'post',
      credentials: "same-origin",
  })
  .then((response) => {
      return response.json();
  })
  .then((data) => {
   insertResponseData(data);
 })
  .catch(function(error) {
     return error;
  });
 }

function showEditButton(){
   $('.content__table--value').hover(function(e){
      $(this).find('.table-edit-value').toggleClass('hidden');
   });
}

function insertResponseData(data){
   for(let key in data){
      for(let value of data[key]){
         if(key === 'substance'){
            $('.supplies_substance').append(`<option value="${value.id}">${value.name}</option>`);
         }
         if(key === 'manufacturer'){
            $('.supplies_manufacturer').append(`<option value="${value.id}">${value.name}</option>`);
         }
       }
   }
}
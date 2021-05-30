
$(document).ready(function () {
   initChangeType();
   getCategoryList();
   showEditButton();
   clickEditButton();
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
        sendRequest('/supplies', null ,'POST').then((data) => {
            insertResponseData(data);
        });
         
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

 async function sendRequest(url, body = null, method){
   let token = document.querySelector('input[name=_token]').getAttribute('value');
   let result = fetch(url, {
      headers: {
          "Content-Type": "application/json",
          "Accept": "application/json, text-plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token
          },
      method: method,
      credentials: "same-origin",
      body: JSON.stringify(body)
  })
  .then((response) => {
    return response.json();
  })
  .catch(function(error) {
     return error;
  });
  return result;
 }

function showEditButton(){
   $('.content__table--value').hover(function(e){
      $(this).find('.table-edit-value').toggleClass('hidden');
   });
}

function clickEditButton(){
   $('.table-edit-value').click(function(e){
      if($(this).hasClass('save')){
         clickSaveButton($(this));
      }else{
         $(this).text('Сохранить').addClass('save');
         $(this).siblings('.content__table-edit-text').attr('contenteditable', 'true').addClass('bordered');
         if($(this).siblings('.content__table--substance')){
            $(this).siblings('.content__table--substance').removeAttr('disabled');
         }
         if($(this).siblings('.content__table--manufacturer')){
            $(this).siblings('.content__table--manufacturer').removeAttr('disabled');
         }
      }
   });
}

function clickSaveButton(obj){
      $(obj).text('Изменить').removeClass('save');
      $(obj).siblings('.content__table-edit-text').attr('contenteditable', 'false').removeClass('bordered');
      $(obj).siblings('.content__table--manufacturer').attr('disabled','');
      $(obj).siblings('.content__table--substance').attr('disabled','');
      let url = '';
      
      let dataType = $(obj).closest('.content__table--row').attr('data-type');
      let dataId = $(obj).closest('.content__table--row').attr('data-id');
      let body = {
         'id': dataId,
      };
      let name = $(obj).siblings('.content__table-edit-text.name').text();
      let link = $(obj).siblings('.content__table-edit-text.link').text();
      let price = $(obj).siblings('.content__table-edit-text.price').text();
      let substance_id = $(obj).siblings('.content__table--substance').val();
      let manufacturer_id = $(obj).siblings('.content__table--manufacturer').val();
      let data = {name, link, price, substance_id, manufacturer_id};
      for(let value in data){
         if(data[value] !== null && data[value] !== '' && typeof(data[value]) !== 'undefined'){
            body[value] = data[value];
         }
      }
      switch(dataType){
         case 'substance':
            url = '/substance/update';
         break;
         case 'manufacturer':
            url = '/manufacture/update';
         break;
         case 'medicine':
            url = '/medicine/update';
         break;
      }
      sendRequest(url, body, 'PUT').then((data)=>{
         console.log(data);
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
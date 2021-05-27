$(document).ready(function () {
   $('.supplies_type').on('change', function() {
      let html = '';
      removeOldInput(['input_field.optional','select_wrapper.optional','select_wrapper.optional']);
      switch(this.value){
         case 'manufacturer':
            html = `<input class="supplies_name input_field optional" name="supplies_link" type="url" placeholder="Ссылка на сайт">`;
            $('.input__wrapper').append(html);
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
            $('.input__wrapper').append(html);
         break;
      }
    });
});

function removeOldInput ([...removeClass]) { 
   for (const value of removeClass) {
         $('.' + value).remove();
   }
 }

 function getCategoryList(){
   $('.category').on('click', function(){
         
   });
 }
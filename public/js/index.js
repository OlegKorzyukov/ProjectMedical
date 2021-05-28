$(document).ready(function () {
   initChangeType();
   getCategoryList();
});

function initChangeType(){
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
}

function removeOldInput ([...removeClass]) { 
   for (const value of removeClass) {
         $('.' + value).remove();
   }
 }

 function getCategoryList(){
   $('.category').on('click', function(e){
      const cardAttr = $(e.target).data('card-name');
      
   });
 }

 function sendRequest(){
   const url = '/departments/all/users'; 
   fetch(url, {
      headers: {
          "Content-Type": "application/json",
          "Accept": "application/json, text-plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token
          },
      method: 'post',
      credentials: "same-origin",
      body: JSON.stringify({
          req: typeData,
      })
  })
  .then((response) => {
      return response.json();
  })
  .then((data) => {
      console.log(data);
      const menuWrapper = document.querySelector('#menu-wrapper');
      menuWrapper.classList.toggle('show');

      /* if(typeData === 'getDepartmentInfo'){
          showDepartmentTask(menuWrapper, data);
       }else */ if(typeData === 'getMenuInfo'){
          showMenuTargetTask(menuWrapper, data);
       }else if(typeData === 'getUserList'){
          showDepartmentUserListTask(menuWrapper, data);
       }
       menuWrapper.addEventListener('click', function taskDataEvent(e){
          let target = e.target;
          let child = e.target.childElementCount;
          let offsetChild = target.offsetParent.firstChild;
          
          if(offsetChild.className === 'task-menu-site'){
              showSubMenu(target, child);
          }
          if(offsetChild.className === 'department-task-list' || offsetChild.className === 'department-user-list'){
              selectDepartmentTask(target);
          }
          clickActionCloseOpenTask(targetTask,target, this, taskDataEvent);
       });
 })
  .catch(function(error) {
      console.log(error);
  });
 }
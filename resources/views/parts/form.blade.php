<form action="{{ route('store-med') }}" method="POST" name="new_supplies">
   <div class="input__wrapper">
      @csrf
      <input class="supplies_name input_field" name="supplies_name" type="text" placeholder="Название" min="30" max="100">
      <select class="supplies_type" name="supplies_list">
         <option value="substance" selected>Действующее вещество</option>
         <option value="manufacturer">Производитель</option>
         <option value="medicine">Лекарственное средство</option>
      </select>
   </div>
   <div class="button__wrapper">
      <input class="form__send" type="submit">
   </div>
</form>
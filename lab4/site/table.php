<!-- Область основного контента -->
<form>
  <label>Количество колонок: </label>
  <br>
  <input name='cols' type='text' value=''>
  <br>
  <label>Количество строк: </label>
  <br>
  <input name='rows' type='text' value=''>
  <br>
  <label>Цвет: </label>
  <br>
  <input name='color' type='color' value='#ff0000' list="listColors">
  <datalist id="listColors">
    <option>#ff0000</option>/>
    <option>#00ff00</option>
    <option>#0000ff</option>
  </datalist>
  <br>
  <br>
  <input type='submit' value='Создать'>
</form>
<br>
<!-- Таблица -->
<table>
  <?php
  getTable((int) $cols, (int) $rows, $color);
  ?>
</table>
<!-- Таблица -->
<!-- Область основного контента -->
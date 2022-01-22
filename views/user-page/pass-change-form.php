<form action="/pass-change.php" method="post">
  <ul>
    <li>
      <label for="name">Текущий пинкод (не более 4 цифр):</label>
      <input type="password" name="pin" maxlength="4" pattern="[0-9]{4}">
    </li>
    <li>
      <label for="mail">Новый пинкод (не более 4 цифр):</label>
      <input type="password" name="new_pin" maxlength="4" pattern="[0-9]{4}">
    </li>
    <p><button type="submit">Изменить</button></p>
  </ul>
</form>
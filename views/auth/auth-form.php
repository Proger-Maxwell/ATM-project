<form action="/auth.php" method="post">
  <ul>
    <li>
      <label for="name">Номер счета:</label>
      <input type="text" id="bill-number" name="bill_number" maxlength="16" pattern="[0-9]{16}">
    </li>
    <li>
      <label for="mail">Пинкод:</label>
      <input type="password" id="pin" name="pin" maxlength="4" pattern="[0-9]{4}">
    </li>
    <p><button type="submit">Войти</button></p>
  </ul>
</form>
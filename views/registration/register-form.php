<form action="/registration.php" method="post">
  <ul>
    <li>
      <label for="name">Имя (латинские буквы, без пробелов, только символы, не мение 4 - ех):</label>
      <input type="text" id="user-name" name="name" pattern="^[a-zA-Z]{4,}">
    </li>
    <li>
      <label for="name">Фамилия (латинские буквы, без пробелов, только символы, не мение 4 - ех):</label>
      <input type="text" id="user-sur" name="surname" pattern="^[a-zA-Z]{4,}">
    </li>
    <li>
      <label for="name">Номер счета (16 цифр, без символов):</label>
      <input type="text" id="bill-number" name="bill_number" maxlength="16" pattern="[0-9]{16}">
    </li>
    <li>
      <label for="mail">Пинкод из 4 цифр (не более 4 цифр):</label>
      <input type="password" id="pin" name="pin" maxlength="4" maxlength="4" pattern="[0-9]{4}">
    </li>
    <p><button type="submit">Зарегестрироваться</button></p>
  </ul>
</form>
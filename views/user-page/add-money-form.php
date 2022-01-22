<form action="/add-money.php" method="post">
  <ul>
    <li>
      <label for="name">Введите сумму пополнения:</label>
      <input type="text" name="money" pattern="^[0-9]+$">
    </li>
    <p><button type="submit">Пополнить</button></p>
  </ul>
</form>
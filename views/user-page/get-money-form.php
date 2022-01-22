<form action="/get-money.php" method="post">
  <ul>
    <li>
      <label for="name">Введите сумму снятия:</label>
      <input type="text" name="money" pattern="^[0-9]+$">
    </li>
    <p><button type="submit">Снять средства</button></p>
  </ul>
</form>
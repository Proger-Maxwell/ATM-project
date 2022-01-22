<form action="/send-money.php" method="post">
  <ul>
    <li>
      <label for="name">Введите Номер счета получателя (16 цифр):</label>
      <input type="text" id="bill-number" name="target_bill_number" maxlength="16" pattern="[0-9]{16}">
    </li>
    <li>
      <label for="name">Введите целую сумму в ГРН перевода:</label>
      <input type="text" name="money" pattern="^[0-9]+$">
    </li>
    <p><button type="submit">Перевести средства</button></p>
  </ul>
</form>
let mesage=document.querySelector('.notification_message').innerText;
let showMesage;
switch (mesage) {
  case '__false_pass':
    showMesage="Неверно введены данные. Повторите вход.";
    break;
    case '__register_success':
    showMesage="Вы успешно зарегестрированы!";
    break;
    case '__register_bill_number_already_registered':
    showMesage="Такой номер счета уже зарегестрирован, введите данные повторно.";
    break;
    case '__miss_data':
    showMesage="Заполните все данные";
    break;
    case '__false_login_data':
    showMesage="Данные для входя неверны. Попробуйте еще раз.";
    break;
    case '__false_pin_data':
    showMesage="Неправильно введен текущий пароль. Попробуйте еще раз.";
    break;
    case '__pass_change_success':
    showMesage="Пароль изменен успешно!";
    break;
    case '__add_money_success':
    showMesage="Счет пополнен успешно!";
    break;
    case '__bank_troubles':
    showMesage="Проблемы на стороне банка. Пожалуйста обратитеь на гарячую линию. ";
    break;
    case '__send_money_success':
    showMesage="Средства отправлены успешно!";
    break;
    case '__lack_funds':
    showMesage="Недостаточно средств";
    break;
    case '__get_money_success':
    showMesage="Средства сняты успешно. Пересчитайте полученые деньги.";
    break;
    case '__card_not_found':
    showMesage="Данный счет не зарегестрирован.";
    break;
}

document.querySelector('.notification_message').innerText=showMesage;
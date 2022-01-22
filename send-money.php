<?php
session_start();
if(isset($_SESSION['isLogin'])){
    header('Content-Type: text/html; charset=utf-8');

    require_once ('app/db.class.php');
    require_once ('app/view.class.php');
    require_once ('app/user.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $db = new DB;
        $user = new User($db);

        $money = $_POST['money'];
        $target_bill_numder = $_POST['target_bill_number'];

        $user_data=$user->sendMoney($_SESSION['bill_number'], $target_bill_numder, $money);
        
        if(!isset($user_data['error'])){
            

            header("Location: /user-page.php?notification=__send_money_success");
            exit();

        }else{
            header("Location: /send-money.php?notification=".$user_data['error']);
            exit();
        }
    }else{
        $view = new View('views/common/template.php');
        $view->title = 'ATM Банкинг';
        $view->text = 'ATM Банкинг / Перевод средств';
        $view->description = 'Спасибо что используете наш банк!';
       
        $data_menu = array(
            'block_name' => 'Меню',
            'links' => array(
                'user-page.php' => 'Страница пользователя',
                'add-money.php' => 'Пополнить счет',
                'get-money.php' => 'Снять средства',
                'send-money.php' => 'Перевести',
                'pass-change.php' => 'Изменить пинкод',
                'index.php' => 'Закончить работу'
            )
        );
        $view->main_data = $view->block('views/user-page/send-money-form.php');
        $view->block_menu = $view->block('views/common/menu.php', $data_menu);
        $view->display();
    }
}else{
    header("Location: /index.php");
    exit();
}
?>
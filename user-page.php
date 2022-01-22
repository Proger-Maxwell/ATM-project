<?php
session_start();
if(isset($_SESSION['isLogin'])){
    header('Content-Type: text/html; charset=utf-8');

    require_once ('app/db.class.php');
    require_once ('app/view.class.php');
    require_once ('app/user.class.php');


    $db = new DB;
    $user = new User($db);

    $user_data=$user->getUserData($_SESSION['bill_number']);
    

    $view = new View('views/common/template.php');
    $view->title = 'ATM Банкинг';
    $view->text = 'ATM Банкинг вас приветствует!';
    $view->description = 'Спасибо что используете наш банк!';

    $user_data = array(
        'name' => $user_data['name'],
        'surmmane' => $user_data['surname'],
        'bill_number' => $user_data['bill_number'],
        'balance' => $user_data['balance'],
    );
    
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
    $view->main_data = $view->block('views/user-page/user-data.php', $user_data);
    $view->block_menu = $view->block('views/common/menu.php', $data_menu);
    $view->display();

}else{
    header("Location: /index.php");
    exit();
}
?>
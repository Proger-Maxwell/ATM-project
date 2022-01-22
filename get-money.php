<?php session_start();

if(isset($_SESSION['isLogin'])) {
    header('Content-Type: text/html; charset=utf-8');

    require_once ('app/db.class.php');
    require_once ('app/view.class.php');
    require_once ('app/user.class.php');

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $db=new DB;
        $user=new User($db);

        $money=$_POST['money'];

        $user_data=$user->getMoney($_SESSION['bill_number'], $money);

        if( !isset($user_data['error'])) {


            header("Location: /user-page.php?notification=__get_money_success");
            exit();

        }

        else {
            header("Location: /get-money.php?notification=".$user_data['error']);
            exit();
        }
    }

    else {
        $view=new View('views/common/template.php');
        $view->title='ATM Банкинг';
        $view->text='ATM Банкинг / Снятие средств';
        $view->description='Спасибо что используете наш банк!';

        $data_menu=array('block_name'=> 'Меню',
            'links'=> array('user-page.php'=> 'Страница пользователя',
                'add-money.php'=> 'Пополнить счет',
                'get-money.php'=> 'Снять средства',
                'send-money.php'=> 'Перевести',
                'pass-change.php'=> 'Изменить пинкод',
                'index.php'=> 'Закончить работу'
            ));
        $view->main_data=$view->block('views/user-page/get-money-form.php');
        $view->block_menu=$view->block('views/common/menu.php', $data_menu);
        $view->display();
    }
}

else {
    header("Location: /index.php");
    exit();
}

?>
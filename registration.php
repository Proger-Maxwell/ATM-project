<?PHP header('Content-Type: text/html; charset=utf-8');

require_once ('app/db.class.php');
require_once ('app/view.class.php');
require_once ('app/user.class.php');



if($_SERVER['REQUEST_METHOD']=='POST') {
    if( !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['bill_number']) && !empty($_POST['pin'])) {
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $bill_number=$_POST['bill_number'];
        $pin=$_POST['pin'];

        $db=new DB;
        $user=new User($db);

        $register_user_data=$user->register($name, $surname, $bill_number, $pin);

        if(isset($register_user_data['id'])) {
            header("Location: /auth.php?notification=__register_success");
            exit();
        }

        else {
            header("Location: /registration.php?notification=__register_bill_number_already_registered");
            exit();
        }
    }

    else {
        header("Location: /registration.php?notification=__miss_data");
        exit();
    }
}

else {
    $view=new View('views/common/template.php');

    $view->title='Регистрация ATM Банкинг';
    $view->text='Регистрация ATM Банкинг';
    $view->description=' Пожалуйста зарегестрируйтесь в системе';

    $data_menu=array('block_name'=> 'Меню',
        'links'=> array('index.php'=> 'Главная',
            'auth.php'=> 'Авторизация',
        ));

    $view->block_menu=$view->block('views/common/menu.php', $data_menu);

    $view->main_data=$view->block('views/registration/register-form.php');

    $view->display();
}

?>
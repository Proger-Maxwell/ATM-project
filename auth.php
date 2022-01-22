<?PHP
header('Content-Type: text/html; charset=utf-8');

require_once ('app/db.class.php');
require_once ('app/view.class.php');
require_once ('app/user.class.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['bill_number']) && !empty($_POST['pin'])){
        $bill_number = $_POST['bill_number'];
        $pin = $_POST['pin'];

        $db = new DB;
        $user = new User($db);

        $user_data=$user->login($bill_number, $pin);
            

        if(!isset($user_data['error'])){
            session_start();
            $_SESSION['isLogin'] = true;
            $_SESSION['bill_number'] = $bill_number;

            header("Location: /user-page.php");
            exit();

        }else{
            header("Location: /auth.php?notification=".$user_data['error']);
            exit();
        }
    }else{
        header("Location: /registration.php?notification=__miss_data");
        exit();
    }
    
}else{
    $view = new View('views/common/template.php');

    $view->title = 'Авторизация ATM Банкинг';
    $view->text = 'Авторизация ATM Банкинг';
    $view->description = 'Пожалуйста войдите в систему';

    $data_menu = array(
        'block_name' => 'Меню',
        'links' => array(
            'index.php' => 'Главная',
            'registration.php' => 'Регистрация',
        )
    );

    $view->block_menu = $view->block('views/common/menu.php', $data_menu);
    $view->main_data = $view->block('views/auth/auth-form.php');
    $view->display();
}





?>
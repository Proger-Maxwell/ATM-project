<?PHP header('Content-Type: text/html; charset=utf-8');

require_once ('app/view.class.php');
$view=new View('views/common/template.php');

$view->title='ATM Банкинг';
$view->text='ATM Банкинг';
$view->description=' Пожалуйста войдите в систему или зарегестрируйтесь.';

$data_menu=array('block_name'=> 'Меню',
    'links'=> array('auth.php'=> 'Авторизация',
        'registration.php'=> 'Регистрация',
    ));


$view->block_menu=$view->block('views/common/menu.php', $data_menu);
$view->main_data=$view->block('views/common/dev-data.php', $data_menu);

$view->display();
?>
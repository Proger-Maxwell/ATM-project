<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1><?=$text?></h1>
    <p class="description"><?=$description?></p>

    <?php if(isset($_GET['notification'])): ?>
    <p class="notification_message"><?php echo $_GET['notification'] ?></p>
    <?php endif; ?>

    <?=$block_menu?>

    <?php 
        if($main_data): ?>
    <?=$main_data?>
    <?php endif; ?>

</body>
<script src="js/notification.js"></script>

</html>
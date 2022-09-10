<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
        <meta charset="utf-8" />
        <title><?= $t ?></title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="icon" type="image/x-icon" href="Public/img/logohospital.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="Public/style1.css"/>
    </head>
    <body>
    <?php 
        //require_once('./Public/nav.php');
    ?>
        <div class="container-fluid" >
            
                    <?=$content  ?>

        </div>
    <?php
        require_once('./Public/footer.php');
    ?>
    </body>
    <script src="./Public/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>

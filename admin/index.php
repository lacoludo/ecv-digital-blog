<?php

//    if ( $page != 'login' && $page != 'new' && !isset($_SESSION['admin'])) {
//        header( 'Location: index.php?page=login' );
//    }
    include '../functions/main-functions.php';
    $pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page']))
    {
        if(in_array($_GET['page'].'.php',$pages))
        {
            $page = $_GET['page'];
        }else
        {
            $page = "error";
        }
    }else
    {
        $page = "blog";
    }

    $pages_functions = scandir('functions/');
    if(in_array($page . '.func.php' ,$pages_functions))
    {
        include 'functions/'.$page. '.func.php';
    }
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ECV Digital : Blog</title>

    <!-- Materialize -->
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Main ECV Digital Blog CSS files -->
    <link href="css/elite.css" rel="stylesheet">

</head>

    <body>
    <?php include "body/topbar.php";


    ?>

    <div class="container">
        <?php include 'pages/'.$page.'.php'; ?>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <?php
    $pages_js = scandir('js/');
    if(in_array($page . '.func.js' ,$pages_js))
    {
        ?>
        <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
        <?php
    }
    ?>
    </body>
</html>

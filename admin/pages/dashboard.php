<?php
    $title = 'dashboard';
    session_start();
    require_once '../init.php' ;
    require_once '../core/classes/utilites.php';
    require_once '../core/classes/dashboard.php';
    $dashboard = new Dashboard();



    require_once  $inc . 'header.inic.php' ;
?>
</head>
<body>
    
<?php require_once '../core/includes/navbar.inic.php' ?>

    <?php $dashboard->display_page() ?>


<script src="<?=$public . 'js/dashboard.js' ?>"></script>
<?php require_once  $inc . 'footer.inic.php' ?>

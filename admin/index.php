<?php 
    session_start();
    $title = 'Login';
    require_once './init.php' ;
    login();



    require_once $inc . 'header.inic.php' ;
?>


    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form{
            width: 100%;
        }
    </style>
</head>
    <body>
    <form method="POST">
        <div class="container">
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- keep the user login -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

<script src="<?=$public . 'js/main.js' ?>"></script>
<?php require_once $inc . 'footer.inic.php' ?>
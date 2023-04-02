<?php include "header.php"?>
    <title>Home</title>
</head>
<body>
    <?php include_once 'components/navbar.php'?>
    <div class="main">
        <?php
        if (isset($_SESSION['useruid'])) {
        ?>
            <p class='welcome'>Welcome <?php echo $_SESSION['useruid']; ?></p>
        <?php
        }
        ?>
            <h1>Home Page</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nisi neque repellendus consequuntur molestias suscipit omnis rem. Alias, voluptatum aut!</p>
            <div id="signup-login" class="login-box">
                <?php
                if (!isset($_SESSION['useruid'])) {
                    include_once 'components/signup_form.php';
                    include_once 'components/login_form.php';
                }
                ?>
            </div>
        </div>
    <?php include_once 'footer.php'?>
    


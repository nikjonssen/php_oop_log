<div class="nav_wrapper">
    <a class="logo_link" href="index.php"><img id="brand_logo" src="img/circle.png" alt="Brand Logo"></a>
    <ul class="nav_list">
        <li><a class="navlink" href="index.php">Home</a></li>
        <?php
            if (isset($_SESSION['useruid'])) {
        ?>
            <li><a class="navlink" href="about.php">About</a></li>
            <li><a class='navlink' href='includes/logout.inc.php'>Log Out</a></li>
        <?php
            } else {
        ?>
            <li><a class='navlink' href='#signup-login'>Log In</a></li>
        <?php
            }
        ?>
    </ul>
</div>

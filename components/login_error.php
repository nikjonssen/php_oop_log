<?php

if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case "emptyloginput":
            echo "<p class='login-error'>Please, fill in all fields!</p>";
            break;
        case "loginfailed":
            echo "<p class='login-error'>Please check name/e-mail and password!</p>";
            break;
        default:
            break;
    }
}

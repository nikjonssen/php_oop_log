<?php

if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case "emptysigninput":
            echo "<p class='signup-error'>Please, fill in all fields!</p>";
            break;
        case "invaliduid":
            echo "<p class='signup-error'>Username must consist of letters, numbers, dash, underscore!</p>";
            break;
        case "invalidemail":
            echo "<p class='signup-error'>Please enter correct email address!</p>";
            break;
        case "passunmatch":
            echo "<p class='signup-error'>Passwords do not match!</p>";
            break;
        case "userexist":
            echo "<p class='signup-error'>User already exist!</p>";
            break;
        default:
            break;
    }
}

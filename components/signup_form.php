<form class="signup_form" action="includes/signup.inc.php" method="POST">
    <h1 class="signup_form_title">Sign Up</h1>
    <input class="signup_form_input" type="text" name="uid" placeholder="Username...">
    <input class="signup_form_input" type="email" name="email" placeholder="E-mail...">
    <input class="signup_form_input" type="password" name="pwd" placeholder="Password...">
    <input class="signup_form_input" type="password" name="pwdrep" placeholder="Repeat password...">
    <button class="signup_form_button" type="submit" name="signup">Sign Up</button>
    <?php include_once "signup_error.php" ?>
</form>

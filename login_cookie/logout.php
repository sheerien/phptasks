<?php

// session_start();
require_once("function.php");
if (isset($_POST["logout"])) {    
    // session_destroy();
    // var_dump($_POST);
    setcookie("cookie_user", "login", time() - (3600 * 40) * 30, '/', "localhost", false, true);
    redirect("login");
}


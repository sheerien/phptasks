<?php

session_start();
require_once("function.php");
if (isset($_POST["logout"])) {    
    session_destroy();
    var_dump($_POST);
    redirect("login");
}


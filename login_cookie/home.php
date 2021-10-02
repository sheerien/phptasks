<?php
// session_start();
require_once("function.php");
if(empty($_COOKIE["cookie_user"])){
    redirect("login");
}else{
    echo "<h1 style='color:red;text-transform:uppercase;'> Welcome to our website: " . $_COOKIE['cookie_user'] . "</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <br>
    <form action="logout.php" method="POST"> 
    <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>
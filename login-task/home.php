<?php
session_start();
require_once("function.php");
if(empty($_SESSION["user"])){
    redirect("login");
}else{
    echo "<div style='width: 50%;background-color:#fff; border-radius:10px; padding:10px; margin:50px auto; text-align:center;box-shadow: 6px 7px 2px 0px #05406787;'><h2 style='color:#f00;font-size:50px; '>Welcome to our website  ". $_SESSION['user'] . "</h2></div>";
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
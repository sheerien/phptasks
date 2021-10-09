<?php
require_once("function.php");
if ($_SERVER["REQUEST_METHOD"] === "GET") {

    if (isset($_GET["delete"])) {
        $conn = db_connect("localhost","root", "", "phptask");
        if($conn){
            $data = "DELETE FROM `users` WHERE `users`.`id` = '2'";
            $deleted = insertDB($conn, $data);
            if($deleted){
                echo "row deleted from your db";
                redirect("show");
            }
        }
    }

}
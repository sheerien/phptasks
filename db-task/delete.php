<?php
require_once("function.php");

// $idArr = explode('=', $_SERVER["REQUEST_URI"]);
// $idArrStr = $idArr[1];
// // echo $idArrStr;
// $idNext = explode('?', $idArrStr);
// $id = $idNext[0];

// print_r($id);
// die();
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["delete"])) {
        $idArr = explode('=', $_SERVER["REQUEST_URI"]);
        $idArrStr = $idArr[1];
        // echo $idArrStr;
        $idNext = explode('?', $idArrStr);
        $id = $idNext[0];
        $conn = db_connect("localhost","root", "", "phptask");
        if($conn){
            $data = "DELETE FROM `users` WHERE `users`.`id` = '$id'";
            $deleted = insertDB($conn, $data);
            if($deleted){
                redirect("show");
            }
        }
    }

}
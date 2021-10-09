<?php

//connection to database;
$connection = mysqli_connect('localhost', "root", "", "phptask");
// var_dump($connection);

// print_r($_POST);


    //set username from form
    $username = $_POST['username'];
    // statement sql;
    $sqlStat = "INSERT INTO `users` (`name`) VALUES ('$username')";
    // insert to database;
    mysqli_query($connection, $sqlStat);

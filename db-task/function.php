<?php


  /**
   * database connection
   * @param string $host
   * @param string $user
   * @param string $password
   * @param string $dbName
   * @return bool|mysqli
   */

function db_connect(string $host, string $user, string $password, string $dbName):bool|mysqli
{
    $connection = mysqli_connect($host, $user, $password, $dbName);
    if(!$connection){
        die("connection failed !: " . mysqli_connect_errno());
    }
    return $connection;
    
}

  /**
   * insert data into db
   * @param mysqli $connectionDB
   * @param string $sqlStatement
   * @return bool|mysqli_result
   */

function insertDB(mysqli $connectionDB, string $sqlStatement)
{
    return mysqli_query($connectionDB, $sqlStatement);
}

/**
 * Summary of redirect
 * @param string $page
 * @return void
 */
function redirect(string $page):void
{
    header("LOCATION: {$page}.php");
}
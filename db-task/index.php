<?php
require_once('function.php');

$extension = ['jpeg', 'jpg', 'gif', 'png', 'svg'];
$pathUpload =   __DIR__ . DIRECTORY_SEPARATOR . "imgs" . DIRECTORY_SEPARATOR;
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["upload"])){
        $imgName   = $_FILES['img']['name'];
        $imgType   = $_FILES['img']['type'];
        $imgTmpName   = $_FILES['img']['tmp_name'];
        $imgError  = $_FILES['img']['error'];
        $imgSize   = $_FILES['img']['size'];
        $imgExtArr = explode('.', $imgName);
        $imgExt    = strtolower(end($imgExtArr));
        $username = $_POST['username'];
        $nameUpload =$username . "." .$imgExt;
        if($imgError != 4){
            if(in_array($imgExt, $extension)){
                $fullPath =  $pathUpload . $nameUpload;
                move_uploaded_file($imgTmpName, $fullPath);
                $conn = db_connect("localhost","root", "", "phptask");
                $data = "INSERT INTO users (name, img_path) VALUES ('$username', '$fullPath')";
                $insertData = insertDB($conn, $data);
                if($conn){
                    if($insertData){
                        echo "data is inserted";
                        redirect("show");
                    }else{
                        die("no inserted data");
                    }
                }else{
                    die("no connection");
                }

            }else{
                echo "The file to be uploaded is incorrect";
            }
        }else{
            echo "not upload img yet";
        }
    }
}



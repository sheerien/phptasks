<?php

// print_r($_POST);

// echo "<hr>";

// print_r($_FILES);
$countFiles = count($_FILES['file']['name']);
for($i=0;$i<$countFiles;$i++){
    $path = $_FILES['file']['tmp_name'][$i];
    $filename = $_FILES['file']['name'][$i];
    move_uploaded_file($path, "imgs/{$filename}");
}
// $imgName = $_POST['username'];

// $path = $_FILES['img']['tmp_name'];
// $type = $_FILES['img']['type'];
// $typeArr= explode('/', $type);
// $ext = end($typeArr);
// // echo $ext[1];


// move_uploaded_file($path, "imgs/{$imgName}.{$ext}");
<?php

$content = file_get_contents("formah.html");


if(isset($_POST['names'])){
   $nameList =  explode(",",$_POST['names']);
    $courseName = "php";
   $len =  count($nameList);
   for($i=0;$i<$len;$i++){
        $file_name = $nameList[$i].".html";


     $file =  fopen("us/".$file_name,"w");

    $newContent = str_replace(["name", "course"],[$nameList[$i], $courseName],$content);
     fwrite($file,$newContent);

   }
}


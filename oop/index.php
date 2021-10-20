<?php

require_once("DB.php");

$db = new DB();
// $result = $db->select("users", "name, img_path")->where("id", "=", 22)->or("name", "=", "blabla")->row();
// var_dump($result);

$data = [
    "name" => "ahmed",
    "img_path" => "C:xampphtdocsmahdamrdb-taskimgsmasrawy.png"
];

var_dump($db->update("users", $data)->where("id", "=", 16)->execute());


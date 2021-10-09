<?php

// require_once("./function.php");
// require_once("./task_array.php");
// $url_d = "https://reqres.in/api/users?page=2";
// $url_n = "https://jsonplaceholder.typicode.com/users";



// $data_d = fetchData($url_d);
// $double_data_d = $data_d["data"];
// $data_n = fetchData($url_n);
// // var_dump($double_data_d);

// $new_data_n=[];
// foreach ($data_n as $key => $value) {
//     $new_data_n[$key]["id"] = $value['id'];
//     $new_data_n[$key]["name"] = $value['name'];
//     $new_data_n[$key]["username"] = $value['username'];
//     $new_data_n[$key]["email"] = $value['email'];
    
// }
// // print_r($new_data_n);
// // var_dump($new_data_n);

// $new_data_d=[];
// foreach ($double_data_d as $key => $value) {
//     $new_data_d[$key]["id"] = $value['id'];
//     $new_data_d[$key]["name"] = $value['first_name'];
//     $new_data_d[$key]["username"] = $value['last_name'];
//     $new_data_d[$key]["email"] = $value['email'];
    
// }

// // // print_r($new_data_d);

// $margData = [...$new_data_n, ...$new_data_d];

// var_dump($margData);


// function printDataForm($arr){
//     foreach ($arr as $data){
//         echo $data . "<br>";
//     }

// }
// if(!empty($_POST)){
//     printDataForm($_POST);
// }

// print_r($_POST);

// $numOne = $_POST["first"];
// $numTwo = $_POST["second"];
// $op = $_POST["op"];
// function culc($x, $y, $z){
//     switch ($z) {
//         case '+':
//             echo $x + $y;
//             break;
//         case '-':
//             echo $x - $y;
//             break;
//         case '*':
//             echo $x * $y;
//             break;
//         case '/':
//             echo $x / $y;
//             break;
//         default:
//             echo "Error";
//             break;
//     }

// }
// echo "Result: ";
// culc($numOne, $numTwo, $op);


$users = [
    [
       "name" => ["first"=>"mohamed","last"=>"amr"],
       "skills" => [
          "soft" => ["reading"],
          "tech" => ["php","oop"]
          ]
    ],
    [
       "name" => ["first"=>"ahmed","last"=>"yacine"],
       "skills" => [
          "soft" => ["reading"],
          "tech" => ["php","oop"]
          ]
    ],
    [
       "name" => ["first"=>"ibrahim","last"=>"essam"],
       "skills" => [
          "soft" => ["reading"],
          "tech" => ["php","oop"]
          ]
    ],
];
// print_r($users);
// $newArray = [];
// foreach($users as $key => $value){
//    $newArray['name'] = $value["first"];
// //    $newArray[$key]['name'] = $value["last"];
// }

// print_r($newArray);

// $len = count($users);
// $nameFirst = [];
// $nameLast = [];
// $skills = [];

// for ($i=0; $i <$len; $i++) {
//     $nameFirst[$i] = $users[$i]['name']['first'];
//     $nameLast[$i] = $users[$i]['name']['last'];
//     $skills[$i] = $users[$i]['skills']['soft'];
//     // print_r($users[$i]['name']['first']);
//     // echo " ";
//     // print_r($users[$i]['name']['last']);
//     // echo ", ";
//     // // echo "<hr>";
//     // print_r($users[$i]['skills']['tech'][0]);
//     // echo " ";
//     // print_r($users[$i]['skills']['tech'][1]);
//     // echo ", ";


// }

// print_r($nameFirst);
// print_r($nameLast);
// print_r($skills);

// foreach ($users as $key => $value) {
//     echo $value['name']['first'] . " " . $value['name']['last'] . 
//     " : " .  "Soft skills: " . $value['skills']["soft"][0] . 
//     " | And | Tech Skills: ". $value['skills']["tech"][0] . 
//     ", ". $value['skills']["tech"][1]; 
//     echo " <hr>";
// }

// phpinfo();

$data = 'this text should be stored encrypted';
$key = 'r(@F_R=ee#B$a%B!a^j)';
$alg = 'aes-256-cbc';
$ivb = '1234567812345678';

$encryptedData = openssl_encrypt($data,$alg,$key,0,$ivb );
$decryptedData = openssl_decrypt($encryptedData, $alg, $key, 0, $ivb);

echo $encryptedData . "<br>";
echo $decryptedData;

// $txt = 'r(@F_R=ee#B$a%B!a^j)';
// $key = 'r(2*6-80+sh_masrawy?Shamss)';

// $full_txt = $txt . $key;
// echo md5($full_txt);

<?php 
// session_start();
require_once("function.php");
$db_username = "masrawy";
$db_password = "12345678";
if(isset($_POST["send"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username === $db_username && $password === $db_password){

        setcookie("cookie_user", $username, time() + (3600 * 40) * 30, '/', "localhost", false, true);
        redirect("home");
    }else{
        echo "Email Or Password invalid";
    }
    // redirect("home");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body{
            background-color:burlywood;
        }
        .container{
            width: 50%;
            margin:50px auto;
            text-align: center;
        }
        .login{
            width: 70%;
            text-align:center;
            background-color:blueviolet;
            padding:30px 0;
            margin: auto;
            border-radius: 5px;
        }

        input{
            width:70%;
            padding: 10px;
            border: none;
            background-color: #fff;
            outline: none;
            border-radius: 4px;
            color:darkmagenta;

        }
        input[type="submit"]{
            width:30%;
            margin:auto;
            background-color:#000;
            color:#fff;
            padding:10px;
            font-size: 20px;
        }
        input::placeholder{
            color:darkmagenta;
        }

        label{
            color:#fff;
            text-transform: uppercase;
            /* margin-right: 20px; */
            text-align: left;
            font-size: 25px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="login"> 
            <form action="login.php" method="POST">
                <label for="username">user name
                    <br>
                    <br>
                    <input type="text" name="username" id="username" placeholder="Enter Your Name" autocomplete="off">
                </label>
                <br/>
                <br/>
                <label for="password"> password
                    <br> 
                    <br> 
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" autocomplete="off">
                </label>
                <br/>
                <br/>
                <br/>
                <br/>
                <input type="submit" value="Login" name="send">
            </form>
        </div>

</div>


</body>
</html>
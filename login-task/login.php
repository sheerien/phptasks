<?php 
session_start();
require_once("function.php");
$db_username = "masrawy";
$db_password = "12345678";
if(isset($_POST["send"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username === $db_username && $password === $db_password){
        
        $_SESSION["user"] = $username;
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
            background-image: url('./bbody-bg.jpg');
            background-repeat: no-repeat;
            background-size:cover;
        }
        .container{
            width: 50%;
            margin:100px auto;
            text-align: center;
        }
        .login{
            width: 70%;
            text-align:center;
            /* background-color:blueviolet; */
            background-image: url("./login-bg.jpg");
            background-repeat: no-repeat;
            background-size:cover;
            padding:30px 0;
            margin: auto;
            border-radius: 10px;
        }

        input{
            width:70%;
            padding: 10px;
            border: none;
            background-color: #fff;
            outline: none;
            border-radius: 6px;
            color:darkmagenta;

        }
        input[type="submit"]{
            width:30%;
            margin:auto;
            background-color:#4293af;
            color:#fff;
            padding:10px;
            font-size: 20px;
            cursor:pointer;
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
            margin-left: 60px;
            margin-bottom: 10px;
            display: block
        }
    </style>
</head>
<body>
<div class="container">
        <div class="login"> 
            <form action="login.php" method="POST">
                <label for="username"> user name </label>
                    
                    <input type="text" name="username" id="username"  autocomplete="off">
               
                <br/>
                <br/>
                <label for="password"> password</label>
                    
                    <input type="password" name="password" id="password"  autocomplete="off">
                
                <br/>
                <br/>

                <input type="submit" value="Login" name="send">
            </form>
        </div>

</div>


</body>
</html>
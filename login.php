<!DOCTYPE html>
<html>
<head>
<title>Логин страница</title>
</head>
<body>

<div style="display:table; margin:300px auto; border:1px solid black; padding:10px 20px;">

<form action="" method="post">
    <label>Потребителско име: </label><input type="text" name="username"><br /><br />
    <label>Парола: </label><input type="password" name="password"><br /><br />
    <input type = "submit" value = " Submit "/><br />
</form> 

</div>

</body>
</html>

<?php 
include("connect.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($dbConn, $sql);

    if(mysqli_num_rows($result) == 1){
        foreach ($_SESSION as $key=>$el) unset($_SESSION[$key]);
         $_SESSION['user'] = $username;
         
         header("location: main.php");
    } else {
        echo "Грешно потребителско име или парола!";
    }
}


?>
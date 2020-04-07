<?php 
$mysql = new mysqli('localhost','root','','test');
$mysql->set_charset('utf8');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
    }else{
        header("location:login.php");
    }
    if(isset($_POST['password'])){
        $password = htmlspecialchars($_POST['password']);
    }else{
        header("location:login.php");
    }
    $password = md5($password);
    $query = "SELECT id FROM admin WHERE email ='$email' AND password ='$password' "; //11
    $execute= $mysql->query($query);
    if ($execute->num_rows === 1 ) {
        $_SESSION['user'] = $execute->fetch_assoc()["id"];
        header("location: http://localhost/JU_GATE/database/index.php");
    }
    else{
        header("location:http://localhost/JU_GATE/login.php");
        die;
    }
}
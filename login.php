<?php
session_start();

if(isset($_SESSION['usertype'])){
    header("location: index.php");
}
elseif(isset($_POST['login'])){

    require_once('inc/config.php');

    $username=$_POST['userName'];
    $password=$_POST['password'];

    $password=md5($password);

    $query="SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";

    //echo $query;
    $userquery=mysqli_query($connection,$query);

    if(mysqli_num_rows($userquery)>0){
        $userlogin = mysqli_fetch_array($userquery,MYSQLI_ASSOC);
        $_SESSION['usertype']=$userlogin["type"];
        $_SESSION['userid']=$userlogin["user_id"];

        if($userlogin["type"]==1){
            header("location: adminpanel.php");
        }
        else{
            header("location: index.php");
        }

    }else{
        echo "<script>alert('username or email invalied!')</script>";
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Log In</title>
    
    <link rel="stylesheet" type="text/css" href="./css/login.css ">      
</head>

<body>
<div class="page"><br><br><br><br><br>
    <div class="login">
        
        <form action="login.php" autocomplete="on" method="POST"><!--autocomplete completes the input values based on values that the user has entered before -->
            <br><br><br><br><lable id="formname">EXTARVAGANCE</lable>
            <input type="text" name="userName" placeholder="Enter your name" required><br>
            <input type="password" name="password" placeholder="Enter your password" required><br>
            <lable id="forgot"><a href="#">forgot password?</a></lable>
            <input type="submit" value="Log In" name="login"><br>
        </form>
        
    </div>
    <div class="dont">
        <lable id="signup">Don't you have a account? <a href="./register.php">Sign Up Now</a></lable>
    </div>
            
   
</div> 

</body>
</html>
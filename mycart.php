<?php

session_start();

if(!(isset($_SESSION['usertype'])&&($_SESSION['usertype']=2))){
	header("location: login.php");
}

?>
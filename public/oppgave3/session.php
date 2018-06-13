<?php

include "../../mysqlconnect.php";
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db,"SELECT passord FROM passwords WHERE passord = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['passord'];

if(!isset($_SESSION['login_user'])){
	header("location:index.php");
}

?>
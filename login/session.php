<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//include('database/connect.php');
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

// Selecting Database
//$db = mysql_select_db("company", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select LoginName from Users where LoginName='$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['LoginName'];
if(!isset($login_session)){
    //mysql_close($connection); // Closing Connection
    header('Location: ../index.php'); // Redirecting To Home Page
}
?>
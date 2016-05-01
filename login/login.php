<?php
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
//include('database/connect.php');

session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {

    $aaa = 5;
    if (empty($_POST['username']) || empty($_POST['password'])) {

        $error = "Username or Password is invalid";
    }
    else
    {

    // Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        //$connection = mysql_connect("localhost", "root", "");
    // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);

    // Selecting Database
        //$db = mysql_select_db("company", $connection);
    // SQL query to fetch information of registerd users and finds user match.
        //$query = mysql_query("select * from Users where Password='$password' AND LoginName='$username'");
        $query = mysql_query("
        SELECT U.id as userId , U.FullName as userFullName ,AT.name as accountTypeName
        FROM
          Users U
        INNER JOIN
          AccountType AT on AT.id = U.refTypeAccountId
        WHERE
          U.state = 1 and AT.state = 1 and U.Password='$password' AND U.LoginName='$username'");

        if (!$query) {
            echo 'Could not run query: ' . mysql_error();
            exit;
        }

        $rows = mysql_num_rows($query);
        if ($rows == 1) {
            while ($row = mysql_fetch_assoc($query)) {
                if($row["accountTypeName"] && $row["accountTypeName"] == 'Regular'){

                    $_SESSION['login_user']=$username; // Initializing Session
                    $_SESSION['accountTypeName']=$row["accountTypeName"]; // Initializing Session
                    header("location: map.php"); // Redirecting To Other Page
                }
                else if($row["accountTypeName"] && $row["accountTypeName"] == 'Business'){
                    //die("test2");
                    $_SESSION['login_user']=$username; // Initializing Session
                    $_SESSION['accountTypeName']=$row["accountTypeName"]; // Initializing Session
                    header("location: charts.html"); // Redirecting To Other Page
                }else{
                    $error = "Username or Password is invalid";
                }
            }
        } else {
            $error = "Username or Password is invalid";
        }
        /*
        $rows = mysql_num_rows($query);




        if ($rows == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: map.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
        */
    }

}
?>
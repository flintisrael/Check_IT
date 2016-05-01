<?php

//include('../database/connect.php');

include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");



    if (isset($_POST['submitSignup'])) {

        if (empty($_POST['user']) || empty($_POST['pass'])) {

            $error = "Username or Password is invalid";
        }
        else if ($_POST['cpass'] != $_POST['pass']) {

            $error2 = "Not same to Password";
        }
        else
        {
            // Define $username and $password
            $name=$_POST['name'];
            $mail=$_POST['email'];
            $username=$_POST['user'];
            $password=$_POST['pass'];
            $cpassword=$_POST['cpass'];

            $query = mysql_query("insert into Users(id,username,password) values (6, '$password' ,'$username')");
            echo $query;
         }
    }
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <title>Sign-Up</title>
        </head>
        <body id="body-color">
            <div id="Sign-Up">
                <fieldset style="width:30%"><legend>Registration Form</legend>
                       <table border="0"> <tr>
                               <form action="" method="post">
                                   <td>Name</td><td> <input type="text" name="name"></td> </tr>
                                    <tr> <td>Email</td><td> <input type="text" name="email"></td> </tr>
                                    <tr> <td>UserName</td><td> <input type="text" name="user"></td> </tr>
                                    <tr> <td>Password</td><td> <input type="password" name="pass"></td> </tr>
                                    <tr>
                                        <td>
                                            Confirm Password
                                        </td>
                                        <td>
                                            <input type="password" name="cpass">
                                            <span><?php echo $error2; ?></span>
                                        </td>
                                    </tr>
                                    <tr> <td><input type="submit" name="submitSignup" value="Sign-Up"></td>
                                        <span><?php echo $error; ?></span>
                                    </tr>
                           </form>
                       </table>
                </fieldset>
            </div>
        </body>
    </html>

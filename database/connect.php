<?php


   $username = "checkitg_admin";
   $password = "Elad220587";
   $hostname = "localhost";
   $database = "checkitg_checkit";

//$dbh=mysql_connect ("localhost", "checkitg_admin", "Elad220587")
  //or die ('I cannot connect to the database because: ' . mysql_error());

   // connection to the database
   mysql_connect($hostname, $username, $password)
   or die("Unable to connect to MySQL1" .  mysql_error());
    mysql_select_db($database)
    or die("Unable to connect to MySQL2" .  mysql_error());
    mysql_set_charset("utf8")
    or die("Unable to set_charset" .  mysql_error());
date_default_timezone_set("Asia/Jerusalem");
/*
$result = mysql_query("SELECT * FROM test");
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);
*/
?>
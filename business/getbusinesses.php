<?php



include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
session_start();// Starting Session

$login_user = $_SESSION['login_user'];
$userIdQuery = "select id from Users where LoginName='$login_user'";
$result = mysql_query($userIdQuery);
$userId =  mysql_result($result, 0);


$result = mysql_query("SELECT * FROM Business B WHERE B.refOwnerId = $userId and state = 1");
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
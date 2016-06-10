<?php
/**
 * Created by PhpStorm.
 * User: israelf
 * Date: 09/06/2016
 * Time: 21:31
 * 1
 */
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
include ($_SERVER['DOCUMENT_ROOT']."/checkit/function/utilityFunction.php");

$sql = "
 SELECT A.TimeCreatedBothTypes ,A.CountBothTypes ,B.CountTypeOne ,C.CountTypeTwo FROM
(SELECT DATE_FORMAT(U.TimeCreated,'%Y-%m') as TimeCreatedBothTypes , COUNT(*) as CountBothTypes  FROM Users As U WHERE U.State =1 GROUP BY DATE_FORMAT(U.TimeCreated,'%Y-%m'))  A
LEFT JOIN
(SELECT DATE_FORMAT(U.TimeCreated,'%Y-%m') TimeCreatedTypeOne, COUNT(*) CountTypeOne FROM Users As U WHERE U.State =1 and U.refTypeAccountId = 1 GROUP BY DATE_FORMAT(U.TimeCreated,'%Y-%m'))  B
ON A.TimeCreatedBothTypes = B.TimeCreatedTypeOne
LEFT JOIN
(SELECT DATE_FORMAT(U.TimeCreated,'%Y-%m') TimeCreatedTypeTwo, COUNT(*) CountTypeTwo FROM Users As U WHERE U.State =1 and U.refTypeAccountId = 2 GROUP BY DATE_FORMAT(U.TimeCreated,'%Y-%m'))  C
ON B.TimeCreatedTypeOne = C.TimeCreatedTypeTwo";
$result = mysql_query($sql);
echo convertSqlQueryToHtmlTable($result);
?>
<?php
/**
 * Created by PhpStorm.
 * User: israelf
 * Date: 10/06/2016
 * Time: 13:02
 * 4
 */
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
include ($_SERVER['DOCUMENT_ROOT']."/checkit/function/utilityFunction.php");

$sql = "
   SELECT A.TimeCreated ,A.CountBusinessTypeUsers ,B.CountBusiness ,C.CountRegularTypeUsers FROM
(SELECT DATE_FORMAT(U.TimeCreated,'%Y-%m') as TimeCreated , COUNT(*) as CountBusinessTypeUsers  FROM Users As U WHERE U.State =1 and U.refTypeAccountId = 2  GROUP BY DATE_FORMAT(U.TimeCreated,'%Y-%m'))  A
LEFT JOIN
(SELECT DATE_FORMAT(B.TimeCreated,'%Y-%m') as TimeCreated,  COUNT(*) as CountBusiness FROM Business As B WHERE B.State =1 GROUP BY DATE_FORMAT(B.TimeCreated,'%Y-%m'))  B
ON A.TimeCreated = B.TimeCreated
LEFT JOIN
(SELECT DATE_FORMAT(U.TimeCreated,'%Y-%m') as TimeCreated,  COUNT(*) as CountRegularTypeUsers FROM Users As U WHERE U.State =1 and U.refTypeAccountId = 2 GROUP BY DATE_FORMAT(U.TimeCreated,'%Y-%m'))  C
ON B.TimeCreated = C.TimeCreated";
$result = mysql_query($sql);

    echo convertSqlQueryToHtmlTable($result);

?>
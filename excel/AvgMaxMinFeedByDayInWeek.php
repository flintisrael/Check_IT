<?php
/**
 * Created by PhpStorm.
 * User: israelf
 * Date: 09/06/2016
 * Time: 23:13
 * 3
 */
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
include ($_SERVER['DOCUMENT_ROOT']."/checkit/function/utilityFunction.php");

$sql = "
 SELECT  DayInWeek , AVG(a.signup) as AvgFeed,  MAX(a.signup) as MaxFeed, MIN(a.signup) as MinFeed
FROM
(SELECT DATE_FORMAT(F.TimeCreated ,'%Y-%m-01') as datetest , DAYNAME(F.TimeCreated) as DayInWeek , COUNT(*) as signup
FROM Feeds F WHERE F.TimeCreated IS NOT NULL
GROUP BY DATE_FORMAT(F.TimeCreated ,'%Y-%m-01') , DAYNAME(F.TimeCreated)) a
GROUP BY DayInWeek";
$result = mysql_query($sql);
echo convertSqlQueryToHtmlTable($result);
?>
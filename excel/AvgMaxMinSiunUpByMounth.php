<?php
/**
 * Created by PhpStorm.
 * User: israelf
 * Date: 09/06/2016
 * Time: 22:33
 * 2
 */
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
include ($_SERVER['DOCUMENT_ROOT']."/checkit/function/utilityFunction.php");

$sql = "
 SELECT  DATE_FORMAT(a.datetest ,'%M') , AVG(a.signup) as AvgSignUp,  MAX(a.signup) as MaxSignUp, MIN(a.signup) as MinSignUp
FROM
(SELECT DATE_FORMAT(U.TimeCreated ,'%Y-%m-01') as datetest , COUNT(*) as signup
FROM Users U
GROUP BY DATE_FORMAT(U.TimeCreated ,'%Y-%m-01')) a
GROUP BY DATE_FORMAT(a.datetest ,'%M')";
$result = mysql_query($sql);
echo convertSqlQueryToHtmlTable($result);

?>
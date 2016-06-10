<?php
/**
 * Created by PhpStorm.
 * User: israelf
 * Date: 10/06/2016
 * Time: 12:16
 * 5
 */
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
include ($_SERVER['DOCUMENT_ROOT']."/checkit/function/utilityFunction.php");

$sql = "
   SELECT
	ROUND (
   111.1111 *
    DEGREES(ACOS(COS(RADIANS(B.Lat))
         * COS(RADIANS(40.44389))
         * COS(RADIANS(B.Lon - - 79.9985899))
         + SIN(RADIANS(B.Lat))
         * SIN(RADIANS(40.44389))))
	,1)
AS distance_in_km ,COUNT(*) AS COUNTFEEDS
FROM
	Business B
LEFT JOIN Feeds F ON F.refBusinessId = B.id
WHERE
	B.City = 'Pittsburgh'
GROUP BY ROUND (
   111.1111 *
    DEGREES(ACOS(COS(RADIANS(B.Lat))
         * COS(RADIANS(40.44389))
         * COS(RADIANS(B.Lon - - 79.9985899))
         + SIN(RADIANS(B.Lat))
         * SIN(RADIANS(40.44389))))
	,1)";
$result = mysql_query($sql);
echo convertSqlQueryToHtmlTable($result);
?>
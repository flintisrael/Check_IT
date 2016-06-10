<?php
/**
 * Created by PhpStorm.
 * User: israelf
 * Date: 10/06/2016
 * Time: 12:39
 * 6
 */
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
include ($_SERVER['DOCUMENT_ROOT']."/checkit/function/utilityFunction.php");

$sql = "
   SELECT
	BT.TypeName AS BusinessTypeName ,COUNT(*) CountBusinessFeeds
FROM
	Feeds F
INNER JOIN FeedType FT ON FT.Id = F.refFeedTypeId
INNER JOIN BusinessType BT ON FT.refBusinessTypeId = BT.id
GROUP BY BT.TypeName";
$result = mysql_query($sql);

echo convertSqlQueryToHtmlTable($result);
?>
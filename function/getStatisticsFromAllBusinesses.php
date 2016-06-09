<?php
/**
 *  The page returns all the business comments by user id parameter and from Specific date (dateWeekAgo) from database
 * @param $uid - id of user
 * @param $dateWeekAgo - Starting from a certain datetime
 *
 * @author Israel Flint , Elad Afif
 * @return all the business comments by user id parameter and from Specific date (dateWeekAgo) from database
 */


include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

$uid = $_GET['uid'];
$dateWeekAgo = $_GET['startTime'];


$sql = "
  SELECT AVG(F.Description) as average , FT.Id as feedId , FT.Name  as feedName ,FT.displayName as displayName
FROM Business B INNER JOIN Feeds F ON B.id = F.refBusinessId INNER JOIN FeedType FT ON FT.id = F.refFeedTypeId
WHERE B.refOwnerId=$uid AND F.TimeCreated > '$dateWeekAgo' AND FT.typeValue = 'float'
GROUP BY FT.Id ,FT.Name";

$result = mysql_query($sql);
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
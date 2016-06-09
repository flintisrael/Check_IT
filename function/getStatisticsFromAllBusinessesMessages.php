<?php
/**
 *  The page returns all the businesses comments by user id parameter and from Specific date (dateWeekAgo) from database
 * @param $uid - id of user
 * @param $dateWeekAgo - Starting from a certain datetime
 *
 * @author Israel Flint , Elad Afif
 * @return all the businesses comments by user id parameter and from Specific date (dateWeekAgo) from database
 */

include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

$uid = $_GET['uid'];
$dateWeekAgo = $_GET['startTime'];


$sql = "
  SELECT F.Description as message , U.fullName as userName , F.TimeCreated as timeCre ,B.Name as BName
FROM Business B INNER JOIN Feeds F INNER JOIN FeedType FT ON FT.id = F.refFeedTypeId
INNER JOIN Users U ON U.id = F.refUserId
WHERE B.refOwnerId=$uid AND F.TimeCreated > '$dateWeekAgo' AND FT.Name = 'comment'
ORDER BY F.TimeCreated DESC";
//die($sql);
$result = mysql_query($sql);
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
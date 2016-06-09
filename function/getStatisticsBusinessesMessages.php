<?php
/**
 *  The page returns all the business comments by id parameter and from Specific date (dateWeekAgo) from database
 * @param $bid - id of Business
 * @param $dateWeekAgo - Starting from a certain datetime
 *
 * @author Israel Flint , Elad Afif
 * @return all the business comments by id parameter and from Specific date (dateWeekAgo) from databas
 */


include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

$bid = $_GET['bid'];
$dateWeekAgo = $_GET['startTime'];


$sql = "
  SELECT F.Description as message , U.fullName as userName , F.TimeCreated as timeCre
FROM Feeds F INNER JOIN FeedType FT ON FT.id = F.refFeedTypeId
INNER JOIN Users U ON U.id = F.refUserId
WHERE F.refBusinessId=$bid AND F.TimeCreated > '$dateWeekAgo' AND FT.Name = 'comment'
ORDER BY F.TimeCreated DESC";
//die($sql);
$result = mysql_query($sql);
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
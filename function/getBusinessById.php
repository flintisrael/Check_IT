<?php
/**
 *  The page returns all the Business data by id parameter from database
 *  @param $bid - id of Business
 *
 * @author Israel Flint , Elad Afif
 * @return all the Business data by id parameter from database
 */


include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

$bid = $_GET['bid'];

$sql = "
  SELECT B.*
  FROM
    Business B
  WHERE
    B.state = 1 AND B.Id = $bid";
$result = mysql_query($sql);
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
<?php

/**
 * The page return all the data from database about all Businesses
 *
 * @author Israel Flint , Elad Afif
 * @return all the data from database about all Businesses
 */


include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

$sql = "
  SELECT B.Id as bid ,B.*,BT.*
  FROM
    Business B
  INNER JOIN
    BusinessType BT on BT.id = B.refType
  WHERE
    B.state = 1 AND BT.State = 1";
$result = mysql_query($sql);
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
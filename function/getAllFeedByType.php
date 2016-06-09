<?php
/**
 *  The page return all the feeds by type parameter from database
 *  @param $btype - type of Business
 *
 * @author Israel Flint , Elad Afif
 * @return all the feeds by type parameter from database
 */



include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

$btype = $_GET['btype'];

$sql = "
  SELECT FT.* , BT.TypeName
  FROM
    FeedType FT
  LEFT Join
    BusinessType BT on BT.id = FT.refBusinessTypeId
  WHERE
    FT.typeValue = 'float' AND (BT.id is null or BT.TypeName = '$btype')";

$result = mysql_query($sql);
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
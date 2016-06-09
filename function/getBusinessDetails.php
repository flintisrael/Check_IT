<?php
/**
 *   The page returns all the business details by id parameter from database
 *  @param $bid - id of Business
 *
 * @author Israel Flint , Elad Afif
 * @return all the business details by id parameter from database
 */



include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

$bid = $_GET['bid'];

$sql = "
  SELECT B.*
  ,gotKosher.DisplayName as KosherName , gotGender.DisplayName as GenderName
  ,gotType.DisplayName as TypeName , gotAges.DisplayName as AgesName
  ,gotCategory.DisplayName as CategoryName , gotMenu.DisplayName as MenuName
  FROM
    Business B
  LEFT JOIN
    GenericOptionTypes gotKosher on gotKosher.id = B.Kosher
  LEFT JOIN
    GenericOptionTypes gotGender on gotGender.id = B.Gender
  LEFT JOIN
    GenericOptionTypes gotType on gotType.id = B.Type
  LEFT JOIN
    GenericOptionTypes gotMenu on gotMenu.id = B.Menu
  LEFT JOIN
    GenericOptionTypes gotAges on gotAges.id = B.Ages
  LEFT JOIN
    GenericOptionTypes gotCategory on gotCategory.id = B.Category
  WHERE
    B.state = 1 AND B.Id = $bid";
$result = mysql_query($sql);
$array =array();

while($row = mysql_fetch_array($result)) {

    array_push($array,$row);

}
echo json_encode($array);


?>
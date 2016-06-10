<?PHP
include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

//header('Content-Encoding: UTF-8');

$sql = "
  SELECT  DayInWeek , AVG(a.signup) as AvgFeed,  MAX(a.signup) as MaxFeed, MIN(a.signup) as MinFeed
FROM
(SELECT DATE_FORMAT(F.TimeCreated ,'%Y-%m-01') as datetest , DAYNAME(F.TimeCreated) as DayInWeek , COUNT(*) as signup
FROM Feeds F WHERE F.TimeCreated IS NOT NULL
GROUP BY DATE_FORMAT(F.TimeCreated ,'%Y-%m-01') , DAYNAME(F.TimeCreated)) a
GROUP BY DayInWeek";
//echo $sql;
$result = mysql_query($sql);

$a = 'bid';
$b = 'Btid';


echo '<table id="display">';

/*
echo"<tr><td>headq";
echo"heass]</td>";
echo"<td>head2</td>";
echo"</tr>";
*/
$flag = false;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
   // echo"<br>";
    $arraykeys = array_keys($row);
    if(!$flag) {
        echo"<tr>";
        foreach ($arraykeys as &$value) {
            echo "<td>$value</td>";
        }
        echo"</tr>";
        $flag = true;
    }

    echo"<tr>";
    foreach ($row as &$value) {
        echo "<td>$value</td>";
    }
    echo"</tr>";
    /*
    echo"<tr><td>";
    echo"$row[$a]</td>";
    echo"<td>$row[$b]</td>";
    echo"</tr>";
    */
}
echo "</table>";
?>
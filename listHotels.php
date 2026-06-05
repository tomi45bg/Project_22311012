<!DOCTYPE html>
<html>
<head>
<title> Списък с хотели </title>

<meta charset="UTF-8">

<script language="javascript" type="text/javascript">
    function popupWin(url){
        myWindow=window.open(url,'mywin','width=450,height=350')
    }

</script>

</head>
<body style="font-size: 20px;">

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}

include("connect.php");
$sql = "SELECT hotels.id, hotels.name AS hotel_name, cities.name AS city_name
, cities.country, hotels.apartments, hotels.studios, hotels.offices, hotels.restaurant
, hotels.spa, hotels.pool, hotels.disco FROM hotels JOIN cities ON hotels.city_id = cities.id";

if (isset($_GET['order']))
{ switch ($_GET['order']){
	case 'hotel_name': $sql .= " ORDER BY hotel_name"; break;
    case 'city_name': $sql .= " ORDER BY city_name"; break;
    case 'apartments': $sql .= " ORDER BY hotels.apartments"; break;

    default: $sql .= " ORDER BY hotel_name";
  }
}

$result = mysqli_query($dbConn, $sql);

if (!$result) {
    echo "Няма въведени хотели!";
}

else { echo "<h2>Хотели: </h2>";
	?>
<table border="1">
<tr><th>Номер</th><th><a href="<?php echo $_SERVER['PHP_SELF']."?order=hotel_name" ?>">Име</a></th>
<th><a href="<?php echo $_SERVER['PHP_SELF']."?order=city_name" ?>">Град</a></th>
<th>Държава</th>
<th><a href="<?php echo $_SERVER['PHP_SELF']."?order=apartments" ?>">Апартаменти</a></th>
<th>Студиа</th>
<th>Офиси</th>
<th>Ресторант</th>
<th>Спа център</th>
<th>Басейн</th>
<th>Дискотека</th></tr>

<?php
$broi = 1;
while ($row = mysqli_fetch_assoc($result)){
	echo "<tr><td>$broi</td>";
	echo "<td>".$row["hotel_name"]."</td>";
	echo "<td>".$row["city_name"]."</td>";
	echo "<td>".$row["country"]."</td>";
	echo "<td>".$row["apartments"]."</td>";
	echo "<td>".$row["studios"]."</td>";
	echo "<td>".$row["offices"]."</td>";
	echo "<td>".($row["restaurant"] ? "Да" : "Не" )."</td>";
	echo "<td>".($row["spa"] ? "Да" : "Не" )."</td>";
	echo "<td>".($row["pool"] ? "Да" : "Не" )."</td>";
	echo "<td>".($row["disco"] ? "Да" : "Не" )."</td>";
	echo "</tr>\n";
	$broi++;
}

?>
</table>

<?php } ?>
<br /><br />
<a href="javascript:popupWin('addHotel.php')">
Добави нов хотел
</a><br /><br />
<a href="logout.php">Изход</a>

</body>

</html>
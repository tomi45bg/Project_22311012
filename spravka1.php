<!DOCTYPE html>
<html>
<head>
<title> Списък с хотели в България </title>

<meta charset="UTF-8">

<script language="javascript" type="text/javascript">
    function popupWin(url){
        myWindow=window.open(url,'mywin','width=500,height=500')
    }

</script>

</head>
<body style="font-size: 18px; background-color: #a28089">

<div style="display:flex; flex-direction:column; align-items:center;">

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}

include("connect.php");
$sql = "SELECT hotels.id, hotels.name AS hotel_name, cities.name AS city_name
, cities.country, hotels.apartments, hotels.studios, hotels.offices, hotels.restaurant
, hotels.spa, hotels.pool, hotels.disco FROM hotels JOIN cities ON hotels.city_id = cities.id
WHERE cities.country = 'България'";

if (isset($_GET['order']))
{ switch ($_GET['order']){
	case 'hotel_name': $sql .= " ORDER BY hotel_name"; break;
    case 'city_name': $sql .= " ORDER BY city_name"; break;
    case 'country': $sql .= " ORDER BY country"; break;
    case 'apartments': $sql .= " ORDER BY hotels.apartments"; break;

    default: $sql .= " ORDER BY hotel_name";
  }
}

$result = mysqli_query($dbConn, $sql);

if (!$result) {
    echo "Няма въведени хотели!";
}

else { echo "<h2>Хотели в България: </h2>";
	?>
<table border="3" cellpadding="5" cellspacing="0" style="border-collapse: collapse; margin: auto;">
<tr><th>Номер</th><th><a href="<?php echo $_SERVER['PHP_SELF']."?order=hotel_name" ?>">Име</a></th>
<th><a href="<?php echo $_SERVER['PHP_SELF']."?order=city_name" ?>">Град</a></th>
<th><a href="<?php echo $_SERVER['PHP_SELF']."?order=country" ?>">Държава</a></th>
<th><a href="<?php echo $_SERVER['PHP_SELF']."?order=apartments" ?>">Апартаменти</a></th>
<th>Студиа</th>
<th>Офиси</th>
<th>Ресторант</th>
<th>Спа център</th>
<th>Басейн</th>
<th>Дискотека</th>
<th>Изтриване</th>
<th>Редактиране</th></tr>

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
    echo "<td><a onclick=\"return confirm('Искате ли да изтриете този хотел?')\"
     href='javascript:popupWin(\"delete.php?id=".$row["id"]."\")'>Изтрий</a></td>";
    echo "<td><a onclick=\"return confirm('Искате ли да редактирате този хотел?')\"
     href='javascript:popupWin(\"update.php?id=".$row["id"]."\")'>Редактирай</a></td>";
	echo "</tr>\n";
	$broi++;
}

?>
</table>

<?php } ?>
<br /><br />
<a href="listHotels.php">
Връщане към началната страница
</a><br />

<a href="logout.php">Изход</a>

<br />

<img src="travelPhoto.jpeg" style="width:500px; height:500px;"> 

</div>

</body>

</html>
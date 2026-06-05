<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Редактиране на хотел</title>
</head>

<body style="background-color: #a28089">

<p>Редактиране на хотел:</p>

<?php

$id = intval($_GET['id']);

include("connect.php");

$sql = "SELECT * FROM hotels WHERE id = $id";
$result = mysqli_query($dbConn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<form method="post" action="updateHotel.php">
<table>

<tr><td>Име на хотел</td><td>
<input type="text" name="name"
value="<?php echo $row['name']; ?>" required>
</td></tr>

<tr><td>Апартаменти</td><td>
<input type="number" name="apartments"
value="<?php echo $row['apartments']; ?>" min="0">
</td></tr>

<tr><td>Студиа</td><td>
<input type="number" name="studios"
value="<?php echo $row['studios']; ?>" min="0">
</td></tr>

<tr><td>Офиси</td><td>
<input type="number" name="offices"
value="<?php echo $row['offices']; ?>" min="0">
</td></tr>

<tr><td>Ресторант</td><td>
<select name="restaurant">
<option value="1" <?php if($row['restaurant']==1) echo "selected"; ?>>Да</option>
<option value="0" <?php if($row['restaurant']==0) echo "selected"; ?>>Не</option>
</select>
</td></tr>

<tr><td>СПА център</td><td>
<select name="spa">
<option value="1" <?php if($row['spa']==1) echo "selected"; ?>>Да</option>
<option value="0" <?php if($row['spa']==0) echo "selected"; ?>>Не</option>
</select>
</td></tr>

<tr><td>Басейн</td><td>
<select name="pool">
<option value="1" <?php if($row['pool']==1) echo "selected"; ?>>Да</option>
<option value="0" <?php if($row['pool']==0) echo "selected"; ?>>Не</option>
</select>
</td></tr>

<tr><td>Дискотека</td><td>
<select name="disco">
<option value="1" <?php if($row['disco']==1) echo "selected"; ?>>Да</option>
<option value="0" <?php if($row['disco']==0) echo "selected"; ?>>Не</option>
</select>
</td></tr>

<?php

$sqlCities = "SELECT * FROM cities ORDER BY name";
$resultCities = mysqli_query($dbConn, $sqlCities);

?>

<tr><td>Град</td><td>
<select name="city_id">

<?php

while($rowCity = mysqli_fetch_assoc($resultCities))
{
    echo "<option value='".$rowCity['id']."'";

    if($rowCity['id'] == $row['city_id'])
        echo " selected";

    echo ">".$rowCity['name']." (".$rowCity['country'].")</option>";
}

?>

</select>
</td></tr>

<input type="hidden" name="id"
value="<?php echo $row['id']; ?>">

<tr>
<td colspan="2">
<input type="submit" value="Запиши">
<input type="reset" value="Изчисти">
</td>
</tr>

</table>

</form>

</body>
</html>
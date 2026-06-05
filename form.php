<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Добавяне на нов хотел</title>
</head>

<body style="background-color: #a28089">

<p>Добавяне на хотел</p>

<form method="post" action="addHotel.php">

<label for="name">Име на хотела:</label>
<input type="text" name="name" required>

<br><br>

<label for="apartments">Брой апартаменти:</label>
<input type="number" name="apartments" min="0" required>

<br><br>

<label for="studios">Брой студиа:</label>
<input type="number" name="studios" min="0" required>

<br><br>

<label for="offices">Брой офиси:</label>
<input type="number" name="offices" min="0" required>

<br><br>

<label for="restaurant">Ресторант:</label>
<select name="restaurant">
    <option value="1">Да</option>
    <option value="0">Не</option>
</select>

<br><br>

<label for="spa">СПА център:</label>
<select name="spa">
    <option value="1">Да</option>
    <option value="0">Не</option>
</select>

<br><br>

<label for="pool">Басейн:</label>
<select name="pool">
    <option value="1">Да</option>
    <option value="0">Не</option>
</select>

<br><br>

<label for="disco">Дискотека:</label>
<select name="disco">
    <option value="1">Да</option>
    <option value="0">Не</option>
</select>

<br><br>

<label for="city_id">Град:</label>
<select name="city_id">

<?php

$sql = "SELECT * FROM cities ORDER BY name";
$result = mysqli_query($dbConn, $sql);

while($row = mysqli_fetch_assoc($result))
{
    echo "<option value='".$row['id']."'>";
    echo $row['name']." (".$row['country'].")";
    echo "</option>";
}

?>

</select>

<br><br>

<input type="submit" value="Добави хотел">

</form>

</body>
</html>
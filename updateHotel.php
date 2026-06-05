<?php
if ($_SERVER['REQUEST_METHOD']=="POST")
{

	$name=addslashes($_POST['name']);
	$apartments=addslashes($_POST['apartments']);
	$studios=addslashes($_POST['studios']);
	$offices=addslashes($_POST['offices']);

	$restaurant=intval($_POST['restaurant']);
	$spa=intval($_POST['spa']);
	$pool=intval($_POST['pool']);
	$disco=intval($_POST['disco']);

	$city_id=intval($_POST['city_id']);

	$id = intval($_POST['id']);

	include("connect.php");

	$sql = "UPDATE hotels SET name = '$name', apartments = '$apartments',
     studios = '$studios', offices = '$offices', restaurant = $restaurant,
      spa = $spa, pool = $pool, disco = $disco, city_id = $city_id WHERE id = $id";
			
	if (mysqli_query($dbConn,$sql)){
        echo "Студентът е успешно редактиран!";
    } 
	else {
        echo "Грешка при редактиране!";
    }

	mysqli_close($dbConn);
}

?>

<script>
window.opener.location.reload();
window.close();
</script>
<?php 
if (!isset($_GET['id'])) {
    echo "<script> window.close()</script>";
} 
else {
$id=intval($_GET['id']);
include "connect.php";
$sql="delete from hotels where ID=$id";

if (mysqli_query($dbConn,$sql)){
    echo "Записът е изтрит успешно!";
} 
else {
    echo "Грешка при изтриване!";
}
}

?>

<script>
window.opener.location.reload();
window.close();
</script>

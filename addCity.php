<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title> Добавяне на град </title>
<meta charset="UTF-8">
</head>
<body style="background-color: #a28089">

<p>Добавяне на нов град: </p>
<form method="post">
    <label for="name">Име на града: </label>
    <input type="text" name="name" id="name" required><br><br>
    <label for="country">Държава: </label>
    <input type="text" name="country" id="country" required><br><br>
    <input type="submit" value="Добави град">
</form>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("connect.php");
    $name = addslashes($_POST['name']);
    $country = addslashes($_POST['country']);
    
    $sql = "INSERT INTO cities (name, country) VALUES ('$name', '$country')";
    
   if (mysqli_query($dbConn, $sql)) {
        ?>
        <script>
        alert("Градът е добавен успешно!");
        window.opener.location.reload();
        window.close();
        </script>
        <?php
    }
    else {
        echo "<p>Грешка: " . mysqli_error($dbConn) . "</p>";
    }
    
    mysqli_close($dbConn);
}

?>

</body>
</html>
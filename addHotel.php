<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = addslashes($_POST['name']);

    $apartments = intval($_POST['apartments']);
    $studios = intval($_POST['studios']);
    $offices = intval($_POST['offices']);

    $restaurant = intval($_POST['restaurant']);
    $spa = intval($_POST['spa']);
    $pool = intval($_POST['pool']);
    $disco = intval($_POST['disco']);

    $city_id = intval($_POST['city_id']);

    include("connect.php");

    $sql = 'INSERT INTO hotels (name, apartments, studios, offices, restaurant, spa, pool, disco, city_id)
    VALUES ("'.$name.'", '.$apartments.', '.$studios.', '.$offices.', '.$restaurant.', '.$spa.',
     '.$pool.', '.$disco.', '.$city_id.')';

    if (mysqli_query($dbConn, $sql)){
        ?>
        <script>
        alert("Хотелът е добавен успешно!");
        window.opener.location.reload();
        window.close();
        </script>
        <?php
    } else {
        echo "Грешка при добавяне на хотел: " . mysqli_error($dbConn);
    }
}

?>
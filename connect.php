<?php

$dbConn = mysqli_connect("localhost", "root", "", "hotel_system");
if (!$dbConn){
    echo "Грешка при свързването!!";
}

?>
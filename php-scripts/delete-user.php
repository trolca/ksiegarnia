<?php
    include 'database-info.php';
    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
    if(!$connection) exit;
    $connection->execute_query("DELETE FROM klient WHERE id_klienta = ?", [$_POST["id"]]);
    header("Location: ../edit-clients.php");
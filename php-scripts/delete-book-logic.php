<?php
    include 'check-session.php';
    if($_SESSION["user-type"] != "A"){
        echo "Co to za usuwanie książki nie adminie. Dzwonie na policje, widzimy się w sądzie :>";
        return;
    }
    include 'database-info.php';

    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
    $idBook = $_GET["id-ksiazki"];

    $connection->execute_query("DELETE FROM ksiazka WHERE id_ksiazki = ?", [$idBook]);

    header("Location: ../check-resources.php?id-ksiazki=$idBook");
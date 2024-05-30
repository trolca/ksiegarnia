<?php
    include 'check-session.php';
    if(!isset($_SESSION["user-type"]) || $_SESSION["user-type"] != "A" ){
        echo "A cotototo hmmm?";
        return;
    }
    include 'database-info.php';
    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
    if(!$connection){
        echo "Problem podczas połączenia się z bazą danych";
        return;
    }

    $idBook = $_POST["id-ksiazki"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $newReleaseDate = $_POST["release-date"];
    $dateSplit = explode(".", $newReleaseDate);
    
    if(count($dateSplit) != 3){
        $newReleaseDate = $_POST["orginal-release-date"];;
    }else{
        $newReleaseDate = $dateSplit[2]."-".$dateSplit[1]."-".$dateSplit[0];
    }

    $description = $_POST["description"];
    $cost = $_POST["cost"];
    $amountLeft = $_POST["amount-left"];


    $connection->execute_query("UPDATE ksiazka SET title = ?, author = ?, publisher = ?, cost = ?, amount = ?, release_date = date(?), description = ? WHERE id_ksiazki = ?", [$title, $author, $publisher, $cost, $amountLeft, $newReleaseDate, $description, $idBook]);

    header("Location: ../book-order.php?id-ksiazki=$idBook");
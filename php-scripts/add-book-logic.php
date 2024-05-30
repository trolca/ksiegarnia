<?php
    include 'check-session.php';
    if($_SESSION["user-type"] != "A"){
        echo "Meh";
        exit;
    }
    include "database-info.php";

    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);

    $title = trim($_POST["title"]);
    $author = trim($_POST["author"]);
    $publisher = trim($_POST["publisher"]);
    $newReleaseDate = trim($_POST["release-date"]);
    $dateSplit = explode(".", $newReleaseDate);
    if(count($dateSplit) != 3){
        $newReleaseDate = "1970-01-01";
    }else{
        $newReleaseDate = $dateSplit[2]."-".$dateSplit[1]."-".$dateSplit[0];
    }
    $description = $_POST["description"];
    $cost = $_POST["cost"];
    $amountLeft = $_POST["amount"];

    if($title == "" || $author == "" || $publisher == "" || $newReleaseDate == "" || $cost < 0 || $amountLeft <= 0){
        header("Location: ../add-book.php");
        return;
    }

    $connection->execute_query("INSERT INTO ksiazka VALUES (null, ?, ?, ?, ?, ?, ?, ?)", [$title, $author, $publisher, $cost, $amountLeft, $newReleaseDate, $description]);

    header("Location: ../check-resources.php");
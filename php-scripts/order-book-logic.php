<?php
    include 'database-info.php';
    include 'check-session.php';

    $AMOUNT_ERROR_MESSAGE = "";

    if(!isset($_POST["id-book"])){
        return;
    }

    $idBook = $_POST["id-book"];
    $amountBook = isset($_POST["amount"]) ? $_POST["amount"] : 1;

    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
    if(!$connection){
        $AMOUNT_ERROR_MESSAGE = "Błąd podczas łączenia się z bazą danych!";
        return;
    }

    $checkAmount = $connection->execute_query("SELECT amount FROM ksiazka WHERE id_ksiazki = ?", [$idBook]);
    if(mysqli_fetch_assoc($checkAmount)["amount"] < $amountBook){
        $AMOUNT_ERROR_MESSAGE = "Nie mamy wystarczająco książek!";
        return;
    }

    $addOrderQuery = $connection->execute_query("INSERT INTO zamowienia VALUES (NULL, ?, ?, ?,  now())", [$idBook, $_SESSION["user-id"], $amountBook]);
    if(!$addOrderQuery){
        $AMOUNT_ERROR_MESSAGE = "Błąd podczas zamawiania!";
        return;
    }

    $changeAmount = $connection->execute_query("UPDATE ksiazka SET amount = amount - ? WHERE id_ksiazki = ? ", [$amountBook, $idBook]);

    header("Location: check-resources.php");
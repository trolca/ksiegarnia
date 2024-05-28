<?php
    if(!isset($_GET["id-ksiazki"])){
        echo "Problem z załadowaniem książki! Przepraszamy bardzo za problemy prosimy spróbować a jak nie zadziała to wyłączyć i włączyć strone!";
        header("Location: check-resources.php");
        return;
    }
    include 'check-session.php';
    include 'database-info.php';
    $idBook = $_GET["id-ksiazki"];

    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
    $bookQuery = $connection->execute_query("SELECT * FROM ksiazka WHERE id_ksiazki = ?", [$idBook]);

    if(mysqli_num_rows($bookQuery) <= 0){
        echo "Książka o podanym id nie istnieje! <br>";
        echo '<a href="check-resources.php"> <button >Powrót</button> </a>';
        return;
    }

    $bookInfo = mysqli_fetch_assoc($bookQuery);

    $BOOK_TITLE = $bookInfo["title"];
    $AUTHOR = $bookInfo["author"];
    $PUBLISHER = $bookInfo["publisher"];
    $COST = $bookInfo["cost"];
    $AMOUNT_LEFT = $bookInfo["amount"];
    $RELEASE_DATE = date("j.m.x", strtotime($bookInfo["release_date"]));
    $DESCRIPTION = $bookInfo["description"];
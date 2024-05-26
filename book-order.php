<?php 
    if(!isset($_GET["id-ksiazki"])){
        echo "Problem z załadowaniem książki! Przepraszamy bardzo za problemy prosimy spróbować a jak nie zadziała to wyłączyć i włączyć strone!";
        header("Location: check-resources.php");
        return;
    }
    include 'php-scripts/check-session.php';
    include 'php-scripts/database-info.php';
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
?>

<?php
    include 'php-scripts/order-book-logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css-styles/books-style.css">
    <title> <?php echo $BOOK_TITLE; ?> </title>
</head>
<body>
    <div id="main-div">
        <div id="book-details"> 
            <p id="book-title"> <?php echo $BOOK_TITLE; ?> </p>
            <p id="author">Autor: <?php echo $AUTHOR; ?></p>
            <p id="publisher">Wydawca: <b> <?php echo $PUBLISHER; ?> </b></p>
            <p id="release-date">Data wydania: <b> <?php echo $RELEASE_DATE; ?> </b> </p>
            <p id="description"><?php echo $DESCRIPTION; ?></p>
            <a href="check-resources.php"> <button id="back-button">Powrót</button> </a>
        </div>
        <div id="order-details">
            <p id="price">Cena: <b><?php echo $COST; ?> zł </b> </p>
            <p id="amount-left">Pozostała ilość: <b> <?php echo $AMOUNT_LEFT; ?> </b></p>
            <form method="post">
                <p id="amount-text"> Zamawiam: </p>
                <input type="text" name="id-book" value= <?php $id = $_GET["id-ksiazki"]; echo "\"$id\""; ?> hidden>
                <input type="number" name="amount" min="1" id="amount-input" autocomplete="off" value="1"> <br>
                <p id="error-message"> <?php echo $AMOUNT_ERROR_MESSAGE; ?> </p>
                <input type="submit" value="Zamów" id="order-button">
            </form>
        </div>
    </div>
</body>
</html>
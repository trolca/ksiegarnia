<?php
    include 'php-scripts/get-book-info.php';
    include 'php-scripts/check-session.php';
    if($_SESSION["user-type"] != "A"){
        echo "A co ty tutaj robisz hmmm. Zgłaszam cie na policje. Pozdrawiam";
        return;
    }
    function formatInput($str) : string {
        return "\"$str\"";
    }
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
    <title> Edytowanie - <?php echo $BOOK_TITLE; ?> </title>
</head>
<body>
    <div id="main-div">
        <form style="width: 100%; height: 100%;" method="post" action="php-scripts/edit-book-logic.php">
            <div id="book-details"> 
                <input name="id-ksiazki" value= <?php $id = $_GET["id-ksiazki"]; echo formatInput($id); ?> hidden>
                <input type="text" name="orginal-release-date" value = <?php echo formatInput($RELEASE_DATE); ?> hidden>
                <input id="book-title-input" name="title" value= <?php echo formatInput($BOOK_TITLE); ?>> <br>
                <p id="author">Autor: <input id="author-input" name="author" type="text" value= <?php echo formatInput($AUTHOR); ?>></p>
                <p id="publisher" >Wydawca: <input class="edit-input" name="publisher" type="text" value= <?php echo formatInput($PUBLISHER); ?>> </p>
                <p id="release-date"> Data wydania <input class="edit-input" name="release-date" type="text" value= <?php echo formatInput($RELEASE_DATE); ?>> </p>
                <textarea id="description-input" name="description"> <?php echo $DESCRIPTION; ?> </textarea> <br>
                <a href= <?php $id = $_GET["id-ksiazki"]; echo formatInput("book-order.php?id-ksiazki=$id"); ?> > <input type="button" value="Anuluj" class="anim-button" id="cancel-edit"> </a>
                <input type="submit" value="Akceptuj" class="anim-button" id="accept-edit">
            </div>
            <div id="order-details" style="height: 10vh">
                <p id="price">Cena: <input class="order-input" name="cost" type="text" value= <?php echo formatInput($COST); ?>> <b>zł </b> </p>
                <p id="amount-left">Pozostała ilość: <input class="order-input" name="amount-left" type="text" value= <?php echo formatInput($AMOUNT_LEFT); ?>> </p>
            </div>
        </form>
    </div>
</body>
</html>
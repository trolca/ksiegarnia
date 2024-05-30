<?php 
    include 'php-scripts/check-session.php';
    if($_SESSION["user-type"] != "A"){
        echo "Nie ma dodawania książki!";
        exit;
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
    <link rel="stylesheet" href="css-styles/add-book-style.css">
    <title>Dodawanie ksiazki</title>
</head>
<body>
    <div id="main-div">
        <form action="php-scripts/add-book-logic.php" method="post" style="width: 100%; height: 100%;">
            <p id="big-text">Dodawanie książki</p>

            <div class="input-div">
                Tytuł książki: <br>
                <input type="text" name="title">
            </div>

            <div class="input-div">
                Autor: <br>
                <input type="text" name="author">
            </div>

            <div class="input-div">
                Wydawca: <br>
                <input type="text" name="publisher">
            </div>

            <div class="input-div">
                Cena: <br>
                <input type="number" name="cost" min="0">
            </div>

            <div class="input-div">
                Dostępna ilość: <br>
                <input type="number" name="amount" min="1">
            </div>
            
            <div class="input-div">
                Data wydania: <br>
                <input type="text" name="release-date" placeholder="DD.MM.YYYY">
            </div>

            <div class="input-div">
                Opis: <br>
                <input type="text" name="description">
            </div>

            <input type="submit" value="Dodaj" class="form-button">
            <a href="check-resources.php"> <input type="button" value="Powrót" class="form-button"> </a>
        </form>
    </div>
</body>
</html>
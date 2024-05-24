<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css-styles/resources-style.css">
    <title>Księgarnia - Książki</title>
</head>
<body>
    <div id="toolbar">
        <a href="main-site.php" id="back-button"> <button class="toolbar-button" id="back-button-font"> Powrót</button></a>
        <form method="get" id="search-form">
            <input type="text" name="search-query" placeholder="Wyszukaj ksiązke" autocomplete="off" id="search-text">
            <button id="submit-button"> <input type="submit" hidden> </button>
        </form>
        <a id="add-book"><button class="toolbar-button" id="add-book-font"> Dodaj książke</button> </a>
    </div>

    <div id="all-books">
        <?php 
            include 'php-scripts/check-session.php';
            include 'php-scripts/database-info.php';
            $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);

            $allBooks = $connection->execute_query("SELECT * FROM ksiazka");
            $numBooks = mysqli_num_rows($allBooks);

            for($i = 0; $i < $numBooks; $i++){
                $bookData = mysqli_fetch_assoc($allBooks);
                $title = $bookData["title"];
                $idBook = $bookData["id_ksiazki"];
                $author = $bookData["author"];
                $releaseDate = date("j.m.x", strtotime($bookData["release_date"]));
                $description = $bookData["description"];
                $isLong = strlen($description) > 200;
                if($isLong){
                    $description = substr($description, 0, 200)."...";
                }
                $cost = $bookData["cost"];
                echo "<div class='book-div'>".
                "<p class='book-title'>$title</p>".
                "<p class='author-text'>$author</p>".
                "<p class='release-date'>Wydana: $releaseDate</p>".
                "<p class='book-description'>Opis: $description</p>".
                "<p class='cost-book'>Cena: $cost zł</p>".
                "<form action='book-order.php' class='book-button-form' style='width: 100%; height: 25%; margin-top: 0%;'> <input name='id-ksiazki' value='$idBook' hidden> <input class='toolbar-button order-button' type='submit' value='Zamów'> </form>".
            "</div>";
            }
        ?>
    </div>
</body>
</html>
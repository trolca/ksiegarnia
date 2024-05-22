<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-styles/res-style.css">
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
</body>
</html>
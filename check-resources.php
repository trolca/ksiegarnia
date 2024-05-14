<?php 
    include 'php-scripts/check-session.php';
    include 'php-scripts/database-info.php';
    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);

    $AMOUNT_BOOKS = mysqli_num_rows($connection->execute_query("SELECT id_ksiazki FROM ksiazka"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-styles/res-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Księgarnia - Książki</title>
</head>
<body>
    <div id="toolbar">
        
    </div>
</body>
</html>
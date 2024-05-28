<?php
    include 'php-scripts/register-logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia - rejestracja</title>
    <link rel="stylesheet" href="css-styles/registering-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-site-div">
        <p id="add-user-text">Wpisz dane nowego użytkownika:</p>
        <form method="post" class="register-form">
            
            <div class="input-div">
                Nazwa użytkownika:<br>
                <input type="text" name="username">
                <p class="error-message"> <?php echo $GENERAL_ERROR_MESSAGE.$USERNAME_ERROR_MESSAGE; ?> </p>
            </div>

            <div class="input-div">
                Adres email:<br>
                <input type="email" name="email">
                <p class="error-message"> <?php echo $GENERAL_ERROR_MESSAGE.$EMAIL_ERROR_MESSAGE; ?> </p>
            </div>

            <div class="input-div">
                Hasło:<br>
                <input type="password" name="user-password">
                <p class="error-message"> <?php echo $GENERAL_ERROR_MESSAGE.$PASSWORD_ERROR_MESSAGE; ?> </p>
            </div>

            <input type="text" name="adding" hidden>

            <input type="submit" value="Dodaj" id="submit-button">

            <a href="edit-clients.php"> <input type="button" class="button-clients" id="add-user-cancel" value="Anuluj"></a>
        </form>
    </div>
</body>
</html>
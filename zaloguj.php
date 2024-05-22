<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ksiegarnia - Logowanie</title>
    <link rel="stylesheet" href="css-styles/registering-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-site-div">
        <p id="login-text">
            Logowanie:
        </p>

        <form method="post" enctype="multipart/form-data" class="login-form">
            
            <div class="input-div">
                Nazwa użytkownika / adres email:<br>
                <input name="username">
                <p class="error-message"> <?php include 'php-scripts/login-logic.php'; echo $GENERAL_ERROR_MESSAGE; ?> </p>
            </div>

            <div class="input-div">
                Hasło:<br>
                <input type="password" name="user-password">
                <p class="error-message"><?php include 'php-scripts/login-logic.php'; echo $GENERAL_ERROR_MESSAGE; ?></p>
            </div>

            <input type="submit" value="Zaloguj się" id="submit-button">
            
            <p id="account-text">Nie masz konta? <a href="rejestracja.php">Zarejestruj się</a> </p>
        </form>
    </div>
</body>
</html>
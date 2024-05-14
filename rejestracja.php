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
        <p id="register-text">Rejestracja:</p>
        <form method="post" enctype="multipart/form-data" class="register-form">
            
            <div class="input-div">
                Nazwa użytkownika:<br>
                <input name="username">
                <p class="error-message"> <?php include 'php-scripts/register-logic.php'; echo $GENERAL_ERROR_MESSAGE.$USERNAME_ERROR_MESSAGE; ?> </p>
            </div>

            <div class="input-div">
                Adres email:<br>
                <input type="email" name="email">
                <p class="error-message"> <?php include 'php-scripts/register-logic.php'; echo $GENERAL_ERROR_MESSAGE.$EMAIL_ERROR_MESSAGE; ?> </p>
            </div>

            <div class="input-div">
                Hasło:<br>
                <input type="password" name="user-password">
                <p class="error-message"> <?php include 'php-scripts/register-logic.php'; echo $GENERAL_ERROR_MESSAGE.$PASSWORD_ERROR_MESSAGE; ?> </p>
            </div>
    
            <div class="input-div">
                Potwierdź hasło:<br>
                <input type="password" name="confirm-password">
                <p class="error-message"> <?php include 'php-scripts/register-logic.php'; echo $GENERAL_ERROR_MESSAGE.$PASSWORD_ERROR_MESSAGE; ?> </p>
            </div>

            <input type="submit" value="Rejestracja" id="submit-button">
            
            <p id="account-text">Masz już konto? <a href="zaloguj.php">Zaloguj się</a> </p>
        </form>
    </div>
</body>
</html>
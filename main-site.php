<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ksiegarnia - główna strona</title>
    <link rel="stylesheet" href="css-styles/registering-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="main-site-div">
        <p id="welcome-text">
            <?php 
                include 'php-scripts/check-session.php';
                if(isset($_SESSION["user"]) && $_SESSION["user"] != null){
                    echo "Witaj ".$_SESSION["user"]."!";
                }else{
                    echo "Witaj użytkowniku!";
                }
            ?>
        </p>
        
    
        <?php 
            include 'php-scripts/check-session.php';

            function generateLogoutButton(){
                echo '<form action="php-scripts/logout-logic.php" style="width: 100%; height: 20%;"><input class="logout-button" type="submit" value="Wyloguj się"></form><br>';
            }

            if(!isset($_SESSION["user"]) || $_SESSION["user"] == null){
                echo '<a href="zaloguj.php"> <button class="main-menu-button">Zaloguj się</button> </a><br>';
                echo '<a href="rejestracja.php"> <button class="main-menu-button">Zarejestruj się</button> </a> <br>';
                echo '<button class="disabled-main-menu-button">Zobacz zasoby</button>';
            }else if($_SESSION["user-type"] == "A"){
                generateLogoutButton();
                echo '<button class="main-menu-button"> Edytuj klientów </button><br>';
                echo '<a href="check-resources.php"> <button class="main-menu-button">Zobacz zasoby</button> </a>';
            }else{
                generateLogoutButton();
                echo '<a href="check-resources.php"> <button class="main-menu-button">Zobacz zasoby</button> </a>';
            }
        ?>

        <!-- <a href="zaloguj.php"> <button class="main-menu-button">Zaloguj się</button> </a><br>
        <a href="rejestracja.php"> <button class="main-menu-button">Zarejestruj się</button> </a> <br>
        <a href="check-resources.php"> <button class="main-menu-button">Zobacz zasoby</button> </a> -->

    </div>
</body>
</html>
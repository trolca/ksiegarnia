<?php
    session_start();
    if($_SESSION["user-type"] != "A"){
        echo "Nie jestes administratorem smh.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-styles/registering-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Księgarnia - edytowanie klientów</title>
    <style>
        a{
            color: white;
        }
    </style>
</head>
<body>

    <div class="main-site-div">
        <p id="welcome-text"> Edytowanie klientów: </p>

        <div id="clients-div">

            <?php
            include 'php-scripts/database-info.php';
                $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
                if(!$connection) exit;
                $allClients = $connection->execute_query("SELECT * FROM klient");
                $lenght = mysqli_num_rows($allClients);
                for($i=0; $i < $lenght; $i++){
                    $row = mysqli_fetch_assoc($allClients);
                    if($row["type"] == "A") continue;
                    $username = $row["username"];
                    $userNameSize = strlen($username) < 5 ? 1 : (1/strlen($username))*9;
                    $email = $row["email"];;
                    echo '<div class="client">'.
                    '<p class="client-name" style="font-size: '.$userNameSize.'vw">Nazwa: '.$username.'</p>'.
                    '<p class="email">Email: <br> '.$row["email"].'</p>'.
                    '<form method="post" style="height: 100%" action="php-scripts/delete-user.php">'.
                    '<input style="display: none;" type="text" name="id" value="'.$row["id_klienta"].'">'.
                        '<button class="delete-button">Usuń</button>'.
                        '</form>'.
                    '</div>';
                }
            ?>
        </div>

        <a href="main-site.php"> <button class="button-clients" id="back-button">Powrót</button> </a>

        <a href="add-user.php"> <button class="button-clients" id="add-client">Dodaj klienta</button> </a>

    </div>
    

</body>
</html>
<?php
    //Only vars in uppercase should be accessed in external php files
    include 'check-session.php';
    include 'database-info.php';

    $GENERAL_ERROR_MESSAGE = "";
    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
    if(!$connection){
        $GENERAL_ERROR_MESSAGE = "Problem podczas połączenia się z bazą danych";
        return;
    }

    if(!isset($_POST["username"])){
        return;
    }

    if(isset($_SESSION["user"])){
        $GENERAL_ERROR_MESSAGE = "Jesteś już zalogowany!";
        header("Location: main-site.php");
        return;
    }

    $username = $_POST["username"];
    $password = hash("sha256", $_POST["user-password"]);

    $dataFromDatabase = $connection->execute_query("SELECT username, email, password, id_klienta, type FROM klient WHERE (username = ? OR email = ?) AND password = ?", [$username, $username, $password]);

    if(mysqli_num_rows($dataFromDatabase) == 0){
        $GENERAL_ERROR_MESSAGE = "Nazwa lub hasło jest niepoprawne!";
        return;
    }

    $assocInfo = mysqli_fetch_assoc($dataFromDatabase);

    $username = $assocInfo["username"];
    
    $_SESSION["user"] = $username;
    $_SESSION["user-id"] = $assocInfo["id_klienta"];
    $_SESSION["user-type"] = $assocInfo["type"];
    header("Location: main-site.php");

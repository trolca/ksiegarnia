<?php
    include 'check-session.php';
    include 'database-info.php';

    $GENERAL_ERROR_MESSAGE = "";
    $USERNAME_ERROR_MESSAGE = "";
    $EMAIL_ERROR_MESSAGE = "";
    $PASSWORD_ERROR_MESSAGE = "";
    if(!isset($_POST["email"])){ 
        return;
    }
    
    if(isset($_SESSION["user"]) && !isset($_POST["adding"])){
        header("Location: main-site.php");
        return;
    }
    $connection = mysqli_connect($HOST_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
    if(!$connection){
        $GENERAL_ERROR_MESSAGE = "Błąd podczas łączenia sie z bazą danych!";
        return;
    }

    $password = hash("sha256", $_POST["user-password"]);
    if(isset($_POST["confirm-password"])){
        $confirmPassword = hash("sha256", $_POST["confirm-password"]);

        if($password != $confirmPassword){
            $PASSWORD_ERROR_MESSAGE = "Hasła nie są takie same!";
            return;
        }
    }

    $username = trim($_POST["username"]);

    if(str_contains($username, " ")){
        $USERNAME_ERROR_MESSAGE = "Nie można mieć spacji w nazwie!";
        return;
    }

    $email = trim($_POST["email"]);

    if($username == ""){
        $USERNAME_ERROR_MESSAGE = "Nazwa użytkownika nie może być pusta.";
    }
    if($email == ""){
        $EMAIL_ERROR_MESSAGE = "Wpisz twój adres email";
    }
    if(trim($_POST["user-password"]) == ""){
        $PASSWORD_ERROR_MESSAGE = "Hasło nie może być puste!";
    }

    if($USERNAME_ERROR_MESSAGE != "" || $PASSWORD_ERROR_MESSAGE != "" || $EMAIL_ERROR_MESSAGE != ""){
        return;
    }

    $checkUsername = mysqli_num_rows($connection->execute_query("SELECT id_klienta FROM klient WHERE username = ?", [$username]));
    if($checkUsername > 0){
        $USERNAME_ERROR_MESSAGE = "Taka nazwa użytkownika już istnieje.";
        return;
    }
    $checkEmail = mysqli_num_rows($connection->execute_query("SELECT id_klienta FROM klient WHERE email = ?", [$email]));
    if($checkEmail > 0){
        $EMAIL_ERROR_MESSAGE = "Taki email już jest w użyciu.";
        return;
    }

    if(!$connection->execute_query("INSERT INTO klient VALUES (null, ?, ?, ?, \"U\")", [$username, $email, $password])){
        $GENERAL_ERROR_MESSAGE = "Nie udało się dodać danych do bazy danych";
        return;
    }

    if(isset($_POST["adding"])){
        header("Location: edit-clients.php");
        return;
    }else{
        header("Location: main-site.php");
        return;
    }

<?php
    echo "Witaj użytkowniku tego pięknego serwisu zwanego księgarnia internetowa. Niestety przez nieznane nam powody twoja przeglądarka zawiesiła sie na tej stronie przez co czytasz ten tekst. Prosze nie panikować i zgłosić ten błąd na ";
    session_start();
    session_destroy();
    header("Location: ../main-site.php");
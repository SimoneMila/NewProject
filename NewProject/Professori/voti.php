<?php

echo"<head><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'></head>";

session_start();

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "Project";

$connessione = new mysqli($host, $user, $password, $db);

if($connessione === false){
    die("Errore di connessione: " . $connessione->connect_error);
}

$c = $_SESSION['codice'];

$q2 = "SELECT Data, Valutazione, Descrizione, Studenti.Cognome, Studenti.Nome
        FROM Voti
        INNER JOIN Studenti
        ON FK_Studente = Codice_Studente
        INNER JOIN Professori
        ON FK_Professore = Codice_Professore
        WHERE FK_Professore = \"$c\"";
if($resq2 = $connessione->query($q2)){
    if($resq2->num_rows > 0){
        echo"<table class='table'>
            <thead>
            <tr>
            <th>Data</th>
            <th>Valutazione</th>
            <th>Descrizione</th>
            <th>Cognome Studente</th>
            <th>Nome Studente</th>
            </tr></thead><tbody>";
            while($row = $resq2->fetch_array()){
                echo"
                <tr>
                <td>". $row["Data"] . "</td>
                <td class='table-success'>" . $row["Valutazione"] . "</td>
                <td>" . $row["Descrizione"] . "</td>
                <td>" . $row["Cognome"] . "</td>
                <td>" . $row["Nome"] . "</td>
                </tr>";
            }
        echo"</tbody></table>";
        if($resq2->num_rows >= 10){
            echo"
            <div class='container-fluid text-center bottom bg-secondary text-white p-5'>
                <footer>
                    <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
                </footer>
            </div>";
        }else{
            echo"
            <div class='container-fluid text-center fixed-bottom bg-secondary text-white p-5'>
                <footer>
                    <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
                </footer>
            </div>";
        }
    }
}

echo"<body><script src='http://localhost/NewProject/page.js'></script></body>";

?>
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

$c = $_POST['codice'];
$p = $_POST['password'];

if(!ctype_alnum($c) || !ctype_alnum($p)){
    exit("Puoi inserire solo caratteri alfanumerici");
}

$_SESSION['codice'] = $c;

$tab1 = "SELECT * FROM Studenti WHERE Codice_Studente = \"$c\" AND Password = \"$p\"";
if($res = $connessione->query($tab1)){
    if($res->num_rows > 0){
        $q1 = "SELECT Valutazione, Descrizione, Professori.Cognome, Professori.Nome
                FROM Voti
                INNER JOIN Professori
                ON FK_Professore = Codice_Professore
                INNER JOIN Studenti
                ON FK_Studente = Codice_Studente
                WHERE FK_Studente = \"$c\"";
        if($resq1 = $connessione->query($q1)){
            echo "<body>
            <nav class='navbar sticky-top bg-body-tertiary'>
                <div class='container-fluid'>
                    <ul class='nav nav-underline'>
                        <li class='nav-item'><a class='nav-link text-primary' href='http://localhost/NewProject/index.html' class='menu'>Home page</a></li>
                    </ul>
                </div>
            </nav>

            <div class='container-md text-center mb-5'>
                <h1>Valutazioni</h1>
            </div>";
            if($resq1->num_rows > 0){
                echo"<table class='table'>
                <thead>
                <tr class='prova'>
                <th>Valutazione</th>
                <th>Descrizione</th>
                <th>Cognome Professore</th>
                <th>Nome Professore</th>
                </tr></thead><tbody>";
                while($row = $resq1->fetch_array()){
                    echo"
                    <tr>
                    <td>" . $row["Valutazione"] . "</td>
                    <td>" . $row["Descrizione"] . "</td>
                    <td>" . $row["Cognome"] . "</td>
                    <td>" . $row["Nome"] . "</td>
                    </tr>";
                }
                echo"</tbody></table>";
            }else{
                echo"Non hai ancora nessun voto!";
            }
        }

        $media = "SELECT AVG(Valutazione)
                    FROM Voti
                    INNER JOIN Studenti ON FK_Studente = Codice_Studente
                    WHERE FK_Studente = \"$c\"";
        if($resm = $connessione->query($media)){
            echo "
                <div class='container-md text-center mb-4'>
                    <h2>Media:</h2>
                </div>
            ";
            while($rowm = $resm->fetch_array()){
                echo "<div class='container-md text-center'>" . number_format((float)$rowm['AVG(Valutazione)'], 2, '.', '') . "</div>";
            }
        }
        echo"
            <div class='container-fluid text-center fixed-bottom bg-secondary text-white p-5'>
                <footer>
                    <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
                </footer>
            </div>";
            
        echo"<script src='http://localhost/NewProject/page.js'></script></body>";
    }else{
        $tab2 = "SELECT * FROM Professori WHERE Codice_Professore = \"$c\" AND Password = \"$p\"";
        if($res2 = $connessione->query($tab2)){
            if($res2->num_rows > 0){
                header("Location: http://localhost/NewProject/Professori/carica.php");
            }else{
                echo "Email o Password Errati";
            }
        }
    }
}

?>
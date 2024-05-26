<?php
echo"<head><link rel='shortcut icon' type='image/png' href='http://localhost/NewProject/img/favicon.png'></head>";
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

$data = $_POST['data'];
$v = $_POST['valutazione'];
$des = $connessione->real_escape_string($_POST['descrizione']);
$cs = $_POST['studente'];

$q0 = "SELECT *
        FROM materie
        WHERE FK_Professore = '$c'";

$resq0 = $connessione->query($q0);

if($rowq0 = $resq0->num_rows == 1){
    $m = $_POST['materia'];
}else{
    $m = $_POST['materia_selezionata'];
}

$q1 = "INSERT INTO Voti(Data, Valutazione, Materia, Descrizione, FK_Studente, FK_Professore)
        VALUES('$data', $v, '$m', '$des', '$cs', '$c')";

if($connessione->query($q1) === true){
    echo "<body>
    <nav class='navbar sticky-top bg-body-tertiary'>
        <div class='container-fluid'>
            <ul class='nav nav-underline'>
                <li class='nav-item'><a class='nav-link text-primary' href='carica.php'>Carica</a></li>
                <li class='nav-item'><a class='nav-link text-primary' href='valutazioni.php'>Valutazioni</a></li>
            </ul>

            <ul class='nav nav-underline d-flex'>
                <li class='nav-item'><a class='nav-link text-primary' href='http://localhost/NewProject/index.html'>Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div class='container-md text-center mb-5'>
        <h1>Voto Inserito</h1>
    </div>";
}else{
    echo "Errore durante l'inserimento: " . $connessione->error;
}

$q2 = "SELECT Voti.Data, Voti.Valutazione, Voti.Descrizione, Studenti.Cognome, Studenti.Nome
        FROM Voti
        INNER JOIN Studenti
        ON Voti.FK_Studente = Studenti.Codice_Studente
        INNER JOIN Professori
        ON Voti.FK_Professore = Professori.Codice_Professore
        WHERE Voti.FK_Professore = '$c' AND Voti.FK_Studente = '$cs'
        ORDER BY Voti.ID_Voto DESC";
if($res = $connessione->query($q2)){
    if($res->num_rows > 0){
        echo"<table class='table'>
            <thead>
            <tr>
            <th>Data</th>
            <th>Valutazione</th>
            <th>Descrizione</th>
            <th>Cognome Studente</th>
            <th>Nome Studente</th>
            </tr></thead><tbody>";
            while($row = $res->fetch_array()){
                echo"
                <tr>
                <td>" . $row["Data"] . "</td>
                <td class='table-success'>" . $row["Valutazione"] . "</td>
                <td>" . $row["Descrizione"] . "</td>
                <td>" . $row["Cognome"] . "</td>
                <td>" . $row["Nome"] . "</td>
                </tr>";
            }
        echo "</tbody></table>";
    }else{
        echo"Lo studente non ha ancora voti di questa materia";
    }
}

echo"
    <div class='container-fluid text-center fixed-bottom bg-secondary text-white p-5'>
        <footer>
            <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
        </footer>
    </div>

    <script src='http://localhost/NewProject/page.js'></script></body>";
?>
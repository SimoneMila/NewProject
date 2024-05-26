<?php
echo"<head><link rel='shortcut icon' type='image/png' href='http://localhost/NewProject/img/favicon.png'></head>";
echo"<head><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'></head>";

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "Project";

$connessione = new mysqli($host, $user, $password, $db);

if($connessione === false){
    die("Errore di connessione: " . $connessione->connect_error);
}

$valore = $_POST['checkbox'];
$email = $connessione->real_escape_string($_POST['email']);

echo"
    <nav class='navbar sticky-top bg-body-tertiary'>
        <div class='container-fluid'>
            <ul class='nav nav-underline'>
                <li class='nav-item'><a class='nav-link active text-primary' aria-current:'page' href='#'>Recupero</a></li>
            </ul>

            <ul class='nav nav-underline d-flex'>
                <li class='nav-item'><a class='nav-link text-primary' href='http://localhost/NewProject/index.html'>Login</a></li>
            </ul>
        </div>
    </nav>";

$q0 = "SELECT * FROM Studenti WHERE Email = \"$email\"";

if($res = $connessione->query($q0)){
    if($res->num_rows > 0){
        $q1 = "SELECT $valore
                FROM Studenti
                WHERE Email = \"$email\"";

        if($res = $connessione->query($q1)){
            if($res->num_rows > 0){
                while($row = $res->fetch_array()){
                    echo "<h3 class='text-center'>" . $valore . ": " . $row[$valore] . "</h3>";
                }
            }else{
                echo "<h3 class='text-center'>Email Errata</h3>";
            }
        }
    }else{
        if($valore == "Codice_Studente"){
            $valore = "Codice_Professore";
        }

        $q1 = "SELECT $valore
                FROM Professori
                WHERE Email = \"$email\"";

        if($res = $connessione->query($q1)){
            if($res->num_rows > 0){
                while($row = $res->fetch_array()){
                    echo "<h3 class='text-center'>" . $valore . ": " . $row[$valore] . "</h3>";
                }
            }else{
                echo "<h3 class='text-center'>Email Errata</h3>";
            }
        }
    }
}

echo "
    <div class='container-fluid text-center fixed-bottom bg-secondary text-white p-5 mt-5'>
        <footer>
            <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
        </footer>
    </div>";

?>
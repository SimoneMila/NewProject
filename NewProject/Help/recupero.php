<?php

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

$q0 = "SELECT * FROM Studenti WHERE Email = \"$email\"";

if($res = $connessione->query($q0)){
    if($res->num_rows > 0){
        $q1 = "SELECT $valore
                FROM Studenti
                WHERE Email = \"$email\"";

        if($res = $connessione->query($q1)){
            if($res->num_rows > 0){
                while($row = $res->fetch_array()){
                echo "" . $valore . ": " . $row[$valore] . "";
                }
            }else{
                echo "Email Errata";
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
                echo "" . $valore . ": " . $row[$valore] . "";
                }
            }else{
                echo "Email Errata";
            }
        }
    }
}

?>
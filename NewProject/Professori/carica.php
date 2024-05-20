<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body onload="currentdate()">
    <nav class="navbar sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <ul class="nav nav-underline">
                <li class="nav-item"><a class="nav-link active text-primary" aria-current="page" href="#">Carica</a></li>
                <li class="nav-item"><a class="nav-link text-primary" href="http://localhost/NewProject/Professori/valutazioni.php">Valutazioni</a></li>
            </ul>

            <ul class="nav nav-underline d-flex">
                <li class="nav-item"><a class="nav-link text-primary" href="http://localhost/NewProject/index.html">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-md text-center mb-5">
        <h1>Benvenuto professore!</h1>
    </div>

    <div class="container-md text-center mb-4">
        <h2>Carica un voto:</h2>
    </div>

    <div class="container-md">
        <form method="POST" action="http://localhost/NewProject/Professori/carica_voto.php">
            <div class=" row justify-content-center mb-4">
                <div class="col-3">
                    <label for="studente" class="form-label">Studente</label><br>
                    <select name="studente" class="form-select" aria-label="Default select example" required>
                    <?php
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

                        $sql = "SELECT Cognome, Nome, Codice_Studente
                                FROM Studenti
                                ORDER BY Cognome ASC";
                        if($res=$connessione->query($sql)){
                            if($res->num_rows > 0){
                            echo"<option selected>".'Seleziona'."</option>;";
                            while($row = $res->fetch_array()){
                                echo"
                                <option value='$row[Codice_Studente]'>" . $row['Cognome'] . " " . $row['Nome'] . "</option>";
                            }
                            }else{
                                echo"Nessun studente selezionabile";
                            }
                        }
                        ?>
                    </select>
                </div>
                
                <div class="col-3">
                    <label for="valutazione" class="form-label">Valutazione</label>
                    <input type="number" class="form-control" id="valutazione" name="valutazione" placeholder="Voto" min="2" max="10" step="0.5" required>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-3">
                    <label for="descrizione" class="form-label">Descrizione</label>
                    <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione" required>
                </div>

                <div class="col-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" class="form-control" id="data" name="data" required>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-2">
                    <input type="submit" class="btn btn-dark" id="button" value="Invia">
                </div>
            </div>
        </form>
    
    <div class="container-fluid text-center fixed-bottom bg-secondary text-white p-5">
        <footer>
            <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
        </footer>
    </div>

    <script src="http://localhost/NewProject/page.js"></script>
</body>
</html>
<?php

echo "<head><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'></head>";

session_start();

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "Project";

$connessione = new mysqli($host, $user, $password, $db);

if ($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

$c = $_POST['codice'];
$p = $_POST['password'];

if (!ctype_alnum($c) || !ctype_alnum($p)) {
    exit("Puoi inserire solo caratteri alfanumerici");
}

$_SESSION['codice'] = $c;

echo "
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js'></script>
<body style:'padding-bottom: 1500px !important'>
    <nav class='navbar sticky-top bg-body-tertiary'>
        <div class='container-fluid'>
            <ul class='nav nav-underline'>
                <li class='nav-item'><a class='nav-link active text-primary' aria-current:'page' href='#'>Home page</a></li>
            </ul>

            <ul class='nav nav-underline d-flex'>
                <li class='nav-item'><a class='nav-link text-primary' href='http://localhost/NewProject/index.html'>Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div class='container-md text-center mb-5'>
        <h1>Valutazioni</h1>
    </div>";

$tab1 = "SELECT * FROM Studenti WHERE Codice_Studente = '$c' AND Password = '$p'";
if ($res = $connessione->query($tab1)) {
    if ($res->num_rows > 0) {
        $q1 = "SELECT Voti.Data, Voti.Valutazione, Voti.Descrizione, Voti.Materia AS MateriaNome, Professori.Cognome, Professori.Nome
                FROM Voti
                INNER JOIN Professori
                ON Voti.FK_Professore = Professori.Codice_Professore
                WHERE Voti.FK_Studente = '$c'
                ORDER BY Voti.Materia";

        if ($resq1 = $connessione->query($q1)) {
            if ($resq1->num_rows > 0) {
                $current_materia = null;

                while ($row = $resq1->fetch_assoc()) {
                    $materia = $row['MateriaNome'];

                    
                    if ($materia !== $current_materia) {
                        if ($current_materia !== null) {
                            echo "</tbody></table>";
                        }
                        echo "<div class='container-md text-center'><h3>$materia</h3></div>";
                        echo "<table class='table'>
                        <thead>
                        <tr>
                        <th>Data</th>
                        <th>Valutazione</th>
                        <th>Descrizione</th>
                        <th>Cognome Professore</th>
                        <th>Nome Professore</th>
                        </tr>
                        </thead>
                        <tbody>";

                        $current_materia = $materia;
                    }

                    
                    echo "<tr>
                    <td>" . $row["Data"] . "</td>
                    <td class='table-success'>" . $row["Valutazione"] . "</td>
                    <td>" . $row["Descrizione"] . "</td>
                    <td>" . $row["Cognome"] . "</td>
                    <td>" . $row["Nome"] . "</td>
                    </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "Non hai ancora nessun voto!";
            }
        }

        $media = "SELECT AVG(Valutazione)
                    FROM Voti
                    INNER JOIN Studenti ON FK_Studente = Codice_Studente
                    WHERE FK_Studente = '$c'";
        if ($resm = $connessione->query($media)) {
            echo "
                <div class='container-md text-center mb-4'>
                    <h2>Media:</h2>
                </div>
            ";
            while ($rowm = $resm->fetch_array()) {
                echo "<div id='media' class='container-md text-center'>" . number_format((float)$rowm['AVG(Valutazione)'], 2, '.', '') . "</div>";
                echo "<canvas id='myChart' style='width:100%;max-width:600px;margin:auto;'></canvas>
                <script>
                    const media = document.getElementById('media');
                    var prova = 10 - media.innerHTML;
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var gradient = ctx.createLinearGradient(0, 0, 0, 400);

                    var percent;
                    if (media.innerHTML < 5) {
                        percent = media.innerHTML / 5;
                        gradient.addColorStop(0, 'red');
                        gradient.addColorStop(percent, 'red');
                    } else if (media.innerHTML < 6) {
                        percent = (media.innerHTML - 5) / 1;
                        gradient.addColorStop(0, 'red');
                        gradient.addColorStop(percent, 'orange');
                    } else {
                        percent = (media.innerHTML - 6) / 4;
                        gradient.addColorStop(0, 'lime');
                        gradient.addColorStop(percent, 'lime');
                    }

                    new Chart('myChart', {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                backgroundColor: [gradient],
                                data: [media.innerHTML, prova]
                            }]
                        },
                    });
                </script>";
            }
        }
    } else {
        $tab2 = "SELECT * FROM Professori WHERE Codice_Professore = '$c' AND Password = '$p'";
        if ($res2 = $connessione->query($tab2)) {
            if ($res2->num_rows > 0) {
                header("Location: http://localhost/NewProject/Professori/carica.php");
            } else {
                echo "Email o Password Errati";
            }
        }
    }
}

echo "
    <div class='container-fluid text-center bottom bg-secondary text-white p-5 mt-5'>
        <footer>
            <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
        </footer>
    </div>";

echo "<script src='http://localhost/NewProject/page.js'></script></body>";
?>

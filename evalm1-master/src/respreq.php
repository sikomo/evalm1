<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Résultat de requête</title>
</head>
<body>

<?php
// Récupération de la requête envoyée par le formulaire
$qry = stripslashes($_POST['txreq']);
echo "<strong>Requête exécutée :</strong> " . htmlspecialchars($qry) . "<br><br>\n";

include 'defdb.php';

// Connexion à MariaDB via le Service Kubernetes
$link = mysqli_connect(HOST, USER, MP, DB);

if (!$link) {
    exit("Échec de la connexion : " . mysqli_connect_error());
}

// Sélection de la base
if (!mysqli_select_db($link, DB)) {
    exit("Échec de la sélection de la base " . DB);
}

// Exécution de la requête
$res = mysqli_query($link, $qry);

if (!$res) {
    exit("Erreur lors de l'exécution de la requête : " . mysqli_error($link));
}

// Affichage du résultat sous forme de tableau si la requête retourne des lignes
$nr = mysqli_num_rows($res);
if ($nr == 0) {
    echo "Requête effectuée avec succès, aucun résultat à afficher.";
} else {
    echo '<table border="1"><thead><tr>';
    for ($k = 0; $k < mysqli_num_fields($res); $k++) {
        echo '<th>' . mysqli_fetch_field_direct($res, $k)->name . '</th>';
    }
    echo "</tr></thead>\n<tbody>";
    for ($i = 0; $i < $nr; $i++) {
        echo "\n<tr>";
        $ligne = mysqli_fetch_row($res);
        for ($k = 0; $k < mysqli_num_fields($res); $k++) {
            echo '<td>' . $ligne[$k] . '</td>';
        }
        echo '</tr>';
    }
    echo "\n</tbody></table>";
}

// Fermeture de la connexion
mysqli_close($link);
?>

</body>
</html>

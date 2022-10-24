<?php
require_once "Config.php";
$id = $username = $rank = $jeux = '';
$id_err = $username_err = $rank_err = $jeux_err = '';

if (isset($_POST['username']) && isset($_POST['rank']) && isset($_POST['jeux']) && isset($_POST['id'])  && !empty($_POST["id"])) {
    $username = htmlspecialchars(stripslashes(trim($_POST['username'])));
    $rank = htmlspecialchars(stripslashes(trim($_POST['rank'])));
    $jeux = htmlspecialchars(stripslashes(trim($_POST['jeux'])));
    $id=$_POST['id'];
    
    $username = mysqli_real_escape_string($link, $username);
    $rank = mysqli_real_escape_string($link, $rank);
    $jeux = mysqli_real_escape_string($link, $jeux);

    $sql = "UPDATE users SET username=?, rank=?, jeux=? WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Lie les variables aux espaces réservées 
        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_rank, $param_jeux, $param_id);
        $param_username = $username;
        $param_rank = $rank;
        $param_jeux = $jeux;
        $param_id = $id;
        if (mysqli_stmt_execute($stmt)) {
            header("location: profile.php");
            exit();
        }
    } else {
        echo "ERREUR: Impossible d’exécuter la requête: $sql. " . mysqli_error($link);
    }
} else {
    //echo "C'est ici que je vais selection les infos de la ligne via l'id pour afficher dans les champs de saisie.";
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        $query = "SELECT * FROM users WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = trim($_GET["id"]);
            if (mysqli_stmt_execute($stmt)) {
                $resultats = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($resultats) == 1) {
                    $ligne = mysqli_fetch_array($resultats, MYSQLI_ASSOC);
                    $id = $ligne["id"];
                    $username = $ligne["username"];
                    $rank = $ligne["Rank"];
                    $jeux = $ligne["jeux"];
                }
            } else {
                header("location:error.php");
                exit();
            }
        } else {
            header("location:error.php");
            exit();
        }
    } else {
        header("location:error.php");
        exit();
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>

    <style> 

    .wrapper label {
        display: flex;
        flex-direction: column;
        margin: 0 auto;
    }

    .btns{
        margin-top: 50px;
    }
    
    
    </style>
</head>
<body>
<div class="wrapper">
    <h1> Modification </h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div>
                <label>Pseudo</label> <input type="text" name="nom" value="<?php echo $username ?>">
            </div>
            <div>
                <label>Rank</label> <input type="text" name="prenom" value="<?php echo $rank ?>">
            </div>
            <div>
                <label>Jeux</label> <input type="text" name="email" value="<?php echo $jeux ?>">
            </div>
            <div class="btns">
                <input type="submit" value="Valider"  />
                
                
                <input type="button" value="Annuler" onclick="window.location.href='profile.php';" />
            </div>

            <div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
        </div>
        </form>
    </div>
</body>
</html>
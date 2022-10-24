<?php 
require_once "config.php";

if (isset($_POST['username']) && isset($_POST['rank']) && isset($_POST['jeux'])) {
    $username = htmlspecialchars(stripslashes(trim($_POST['username'])));
    $rank = htmlspecialchars(stripslashes(trim($_POST['rank'])));
    $jeux = htmlspecialchars(stripslashes(trim($_POST['jeux'])));

    if (
        preg_match("/^[a-zA-Z-' +àèéëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ+ ]*$/", $pseudo)
        && preg_match("/^[a-zA-Z-' +àèéëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ+ ]*$/", $rank)

    ) {

        $username = mysqli_real_escape_string($link, $username);
        $rank = mysqli_real_escape_string($link, $rank);
        $jeux = mysqli_real_escape_string($link, $jeux);

        $sql = "INSERT INTO users (username, rank, jeux) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Lie les variables aux espaces réservées (?) dans le modèle d’instruction SQL.
            mysqli_stmt_bind_param($stmt, "sss", $usernameInsert, $rankInsert, $jeuxInsert);

            $usernameInsert = $username;
            $rankInsert = $rank;
            $jeuxInsert = $jeux;
            mysqli_stmt_execute($stmt);
            
            header("location:profile.php");
        } else {
            echo "ERREUR: Impossible d’exécuter la requête: $sql. " . mysqli_error($link);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter étudiant</title>
    <style>
        .wrapper {

            text-align: right;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: white;
            width: 600px;
            margin: 0 auto;
            border :1px solid blue;
            

        }

        .btns {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            margin-top: 20px;
            color: green;
        }

        #prems{
            margin-bottom: 15px;
        }

        #trois{
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
    <p> Enregistrement d'un étudiant. </p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div id="prems">
                <label>Pseudo : </label> <input type="text" name="username" value="">
            </div>
            <div id="deuz">
                <label>Jeux : </label> <input type="text" name="jeux" value="">
            </div>
            <div id="trois">
                <label>Rank :</label> <input type="text" name="rank" value="">
            </div>
            <div class="btns">
                <input type="submit" value="Valider"  />
                
                
                <input type="button" value="Annuler" onclick="window.location.href='profile.php';" />
            </div>
        </form>
    </div>
</body>
</html>
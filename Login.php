<?php

// On initialise une session
session_start();

// On vérifie si l'utilisateur est déjà connecté, si oui, on le redigie vers la page d'accueil.
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ./bienvenue.php");
    exit();
}

require_once "config.php";

$utilisateur = $motdepasse = "";
$utilisateur_err = $motdepasse_err = $login_err = "";

// On vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On vérifie si utilisateur est vide
    if (empty(trim($_POST["utilisateur"]))) {
        $utilisateur_err = "Veuillez rentrer votre pseudo.";
    } else {
        $utilisateur = trim($_POST["utilisateur"]);
    }

    // On vérifie le mot de passe est vide
    if (empty(trim($_POST["motdepasse"]))) {
        $motdepasse_err = "Veuillez rentrer votre mot de passe.";
    } else {
        $motdepasse = trim($_POST["motdepasse"]);
    }

    // Validation des credentials
    if (empty($utilisateur_err && empty($motdepasse_err))) {
        // Préparation de la requête de sélection
        $sql = "SELECT id, username, password, image FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Liaison des variables de la requête preparée au paramètre.
            mysqli_stmt_bind_param($stmt, "s", $param_utilisateur);
            $param_utilisateur = $utilisateur;

            // Exécution de la requête
            if (mysqli_stmt_execute($stmt)) {
                // Stockage des résultats
                mysqli_stmt_store_result($stmt);

                // On vérifie si l'utilisateur selectionné existe
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // On recupère les données renvoyés par la requête
                    mysqli_stmt_bind_result($stmt, $id, $utilisateur, $hashed_password, $image );

                    if (mysqli_stmt_fetch($stmt)) {
                        // On vérifie si le mot de passe saisi et celle recupère dans la base correspondent
                        if (password_verify($motdepasse, $hashed_password)) {
                            // Le mot de passe est correct, on commence une nouvelle session.
                            session_start();

                            // On stocke les données dans la variable session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["utilisateur"] = $utilisateur;
                            $_SESSION["image"] = $image;

                            // Redirection vers la page bienvenue.php
                            header("location: ./bienvenue.php");
                        } else {
                            // Les mots de passe ne correspondent pas, on affiche un message.
                            $login_err = "Le pseudo ou le mot de passe est incorrect. <br/>";
                            echo $login_err;
                        }
                    }
                } else {
                    // L'utilisateur n'existe pas, on affiche un message générale
                    $login_err = "Le pseudo ou le mot de passe est incorrect. <br/>";
                }
            }
            // Fermeture du statement
            mysqli_stmt_close($stmt);
        }
    }
    // Fermeture de la connexion
    mysqli_close($link);
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>
    <form id="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="dedans">


            <h2> Login</h2><br>
            <label>Identifiant :</label><br>
            <div class="input-container">
                <input type="text" id="username" name="utilisateur" class="value" placeholder="Entre ton pseudo" value="<?php echo ""; ?>"><br>
                <span style='color:red;'> </span>
            </div>


            <div class="input-container">
               
            Password: <input type="password" name="motdepasse" class="value" value="FakePSW" id="myInput"><br><br>
            <span style='color:red;'></span><br>
            <span id="show">
            Show Password <input type="checkbox" onclick="myFunction()">
            </span>
            </div>


    

            <script>
                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>


            <button type="submit" name="submit_btn" class="connect" value="SE CONNECTER">
                <span></span>
                <span></span>
                <span></span>
                <span></span> Se connecter
            </button>

            <p style=" margin-bottom : 50px;">Pas encore membre? <a href="registration.php">Créé ton compte</a>.</p>





        </div>
    </form>

</body>

</html>
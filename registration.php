<?php
require_once "config.php";

// Définition des variables
$utilisateur = $motdepasse = $confirme_motdepasse = "";
$utilisateur_err = $motdepasse_err = $confirme_motdepasse_err = "";

// Traitement des données si le formulaire est soumis.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["utilisateur"]))) {
        $utilisateur_err = "Please enter an pseudo.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["utilisateur"]))) {
        $utilisateur_err = "Seulement des lettres, nombres, et underscore.";
    } else {
        // Préparation du requête d'insertion
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Liaison du variable de la requête preparée au paramètre.
            mysqli_stmt_bind_param($stmt, "s", $param_utilisateur);

            $param_utilisateur = trim($_POST["utilisateur"]);

            // Exécution de la requête
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                // Vérification si la ligne existe déjà dans la base de données.
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $utilisateur_errs = "Pseudo déjà utilisé.";
                } else {
                    $utilisateur = trim($_POST["utilisateur"]);
                }
            } else {
                echo "Oops! Votre requête n'a pas été exécuté.";
            }
            // Fermeture du statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validation du mot de passe
    if (empty(trim($_POST["motdepasse"]))) {
        $motdepasse_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["motdepasse"])) < 6) {
        $motdepasse_err = "Le mot de passe doit avoir au minimum 6 caractères.";
    } else {
        $motdepasse = trim($_POST["motdepasse"]);
    }

    // Validation de la confirmation du mot de passe
    if (empty(trim($_POST["confirme_motdepasse"]))) {
        $confirme_motdepasse_err = "Veuillez confirmer votre mot de passe.";
    } else {
        $confirme_motdepasse = trim($_POST["confirme_motdepasse"]);
        if (empty($motdepasse_err) && ($motdepasse != $confirme_motdepasse)) {
            $confirme_motdepasse_err = "Les mots de passe ne correspondent pas.";
        }
    }

    // Vérification des entrées avant insertion dans la base de données.
    if (empty($utilisateur_err) && empty($motdepasse_err) && empty($confirme_motdepasse_err)) {
        // Préparation du requête d'insertion
        $query = "INSERT INTO users (username, password, image) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $query)) {
            // Liaison des variables de la requête preparée aux paramètres.
            mysqli_stmt_bind_param($stmt, "sss", $param_utilisateur, $param_motdepasse, $uploadfilebdd);
            echo "dfd = " . $utilisateur . "</br>";
            echo "dfd = " . $motdepasse . "</br>";

            $param_utilisateur = $utilisateur;
            $param_motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT); // Creates a password hash

            if (isset($_FILES ["profilp"])){
                $uploaddir = 'C:/wamp64/www/back/profilepic/';
                $uploaddirbdd = '../back/profilepic/';
                $uploadfile = $uploaddir . basename($_FILES['profilp']['name']);
                $uploadfilebdd = $uploaddirbdd . basename($_FILES['profilp']['name']);
                move_uploaded_file($_FILES['profilp']['tmp_name'], $uploadfile);
            }
            // Exécution de la requête
            if (mysqli_stmt_execute($stmt)) {
                // Rediraction à la page login.php
                header("location: ./login.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Fermeture du statement
            mysqli_stmt_close($stmt);
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
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@1,100&family=Tiro+Devanagari+Hindi:ital@1&display=swap" rel="stylesheet">
    
</head>

<body>

    <div class="main-container">
        <div class="entete">
            <h3>CREATION DE COMPTE</h3>
            <p>Veuillez remplir ce formulaire pour créer votre compte.</p>
        </div>
        <div>
            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-container">
                    <label>Pseudonyme</label> <br>
                    <input type="text" name="utilisateur" value="<?php echo $utilisateur; ?>">
                    <span style='color:red;'><?php echo $utilisateur_err; ?></span>
                </div>

                <div class="input-container">
                    <label>Nom</label><br>
                    <input type="text" name="nom" value="<?php echo $utilisateur; ?>">
                    <span style='color:red;'><?php echo $utilisateur_err; ?></span>
                </div>

                
                <div class="input-container">
                <label>Prénom</label><br>
                    <input type="text" name="prenom" value="<?php echo $utilisateur; ?>">
                    <span style='color:red;'><?php echo $utilisateur_err; ?></span>
                </div>

                <div class="input-container">
                    <label>Mot de passe</label><br>
                    <input type="password" name="motdepasse">
                    <span style='color:red;'><?php echo $motdepasse_err; ?></span>
                </div>
                <div class="input-container">
                    <label>Confirmer mot de passe</label><br>
                    <input type="password" name="confirme_motdepasse">
                    <span style='color:red;'><?php echo "$confirme_motdepasse_err"; ?></span>
                </div>

                <div class="input-container"> <br>
                <label class="form-label">Profile Picture</label>
		    <input type="file" 
		           class="form-control"
		           name="profilp">
                </div>

                

                <button type="submit" name="submit_btn" class="connect" value="SE CONNECTER">
                <span></span>
                <span></span>
                <span></span>
                <span></span> S'inscrire
            </button> <br>
            
            <button type="reset" name="reset_btn" class="connect" value="RESET">
                <span></span>
                <span></span>
                <span></span>
                <span></span> RESET
            </button>

                <p>Déjà membre? <a href="login.php">Connecter-vous ici</a>.</p>
            </form>


        </div>
    </div>
    

</body>

</html>
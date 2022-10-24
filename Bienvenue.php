<?php
// On initialise une session
session_start();

// On vérifie si l'utilisateur est connecté, si non, on le redirige vers la page login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@1,100&family=Tiro+Devanagari+Hindi:ital@1&display=swap" rel="stylesheet">
    <style>

        body{
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('./assets/report.jpg');
            background-size:cover;
            background-position: center;
            background-size:cover;
            background-position: center;
        }

        h1{
            font-family: 'Bitter', serif;
        }
        .main-container{
            margin: auto;
            background: rgb(0,0,0);
            background: radial-gradient(circle, rgba(0,0,0,0.5973739837731968) 5%, rgba(255,255,255,0.21922272326899506) 50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            margin-top: 50px;
            border-radius: 25px;

            width: 60%;
            -webkit-box-shadow: 0 0 10px rgb(0, 0, 0);
                box-shadow: 0 0 10px rgb(0, 0, 0);
                color: white;
        }

        .heyhey{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-inline-start: 15px;

        }

        #background-video {
  height: 100vh;
  width: 100vw;
  object-fit: cover;
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;
}

#btnVideo {
  color: white;
  font-family: Trebuchet MS;
  font-weight: bold;
  text-align: center;
}

h1 {
  font-size: 4rem;
  margin-top: 15vh; 
}

h2 { font-size: 3rem; }

#btnVideo {
  font-size: 1.5rem;
  background: 0;
  border: 0;
  margin-left: 50%;
  transform: translateX(-50%);
}

.reset-link{
    color:white;    
    margin-right: 15px;
}

.logout-link{
    color:white;
    margin-right: 15px;
}
   
    </style>
</head>

<body>
    <header>
    </header>
    <video id="background-video" autoplay loop muted>
  <source src="./assets/Keyboardvid.mp4" type="video/mp4">
</video>
    
    <div class="main-container">
        <h1 class="my-5"><b><?php echo ucfirst(htmlspecialchars($_SESSION["utilisateur"])); ?></b>, bienvenue sur ton site.</h1>
        <div class="heyhey">
        <p>
            <a href="supprimer.php" class="reset-link">DELETE</a>
            <a href="logout.php" class="logout-link">SE DECONNECTER</a>
            <a href="profile.php" class="logout-link">MON PROFIL</a>
        </p>
        </div>
    </div>
</body>

</html>
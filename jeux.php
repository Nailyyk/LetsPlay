<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/test.css">
</head>
<body>
<?php require_once "config.php"; ?>
    <div class="main">
    <?php 
                    $requete = "SELECT * FROM jeux";
                    if($resultats = mysqli_query($link, $requete)){
                        if(mysqli_num_rows($resultats) > 0) {
                            echo "<table>";
                                echo"<tr>";
                                echo"<th>#</th>";
                                echo"<th>Jeux</th>";
                                echo"<th>Chemin</th>";
                                echo"</tr>";

                                while ($ligne = mysqli_fetch_array($resultats)){
                                    //var_dump($ligne);
                                    echo"<tr>";
                                    echo"<td>".$ligne['id']."</td>";
                                    echo"<td>".$ligne['titre']."</td>";
                                    echo"<td> <img src='.$ligne[chemin]'/></td>";
                                    //
                                    echo "<td>";
                                        echo "<a href='./ajouter.php?id=$ligne[id]'> <img src='./assets/plus.png' style='width=vh'/> </a>";
                                    echo "</td>";
                                    echo"</tr>";
                                }
                                echo "</table>";
                        }else{
                            echo "Aucune donnée n'a été trouvé <br/>";
                        }mysqli_free_result($resultats);
                    }else{
                        echo "gros noob t'es pas co";
                    }
                    
                    ?>
    </div>
</body>
</html>
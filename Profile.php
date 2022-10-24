<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/profile.css">
</head>

<body>

    <?php
    // On initialise une session
    session_start();

    // On vérifie si l'utilisateur est connecté, si non, on le redirige vers la page login
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
    ?>
    <div class="parent">
        <div class="header">

        </div>

        <div class="leftside">
            <div class="card">
                <div class="blob"></div>
                <span class="img"> <img id="" src="<?php echo $_SESSION["image"] ?>" /></span>
                <?php echo ucfirst(htmlspecialchars($_SESSION["utilisateur"])); ?>

            </div>
            <hr>
            
            <?php require_once "config.php"; ?>
            <div class="skills">
                <h2>Mes Jeux</h2>
            <?php
                        $requete = "SELECT * FROM `jeux` JOIN `liste` on jeux.id=idjeux WHERE idusers = $_SESSION[id]";

                        if ($resultats = mysqli_query($link, $requete)) {
                            if (mysqli_num_rows($resultats) > 0) {
                                echo "<table>";
                                echo "<tr>";
                                // echo "<th>#</th>";
                                // echo "<th>Jeux</th>";
                                // echo "<th>Chemin</th>";
                                echo "</tr>";

                                while ($ligne = mysqli_fetch_array($resultats)) {
                                    //var_dump($ligne);
                                    echo "<tr>";
                                    // echo "<td>" . $ligne['id'] . "</td>";
                                    // echo "<td>" . $ligne['titre'] . "</td>";
                                    echo "<td> <img src='.$ligne[chemin]'/></td>";
                                    //
                                    echo "<td>";
                                    echo "<a href='./jeux.php?id=$ligne[id]'></a>";
                                    //echo "<a href='modifier.php'><img src='./assets/ajouter.png'style='height:3vh;'/></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "Aucune donnée n'a été trouvé <br/>";
                            }
                            mysqli_free_result($resultats);
                        } else {
                            echo "gros noob t'es pas co";
                        }

                        ?>
            </div>


        </div>

        <div class="abovemid">

        </div>

        <div class="image">
            <div id="profile-container">

                <image id="profileImage" src="<?php echo $_SESSION["image"] ?>" />

                <b style="margin-left: 15px; size:25px;"><?php echo ucfirst(htmlspecialchars($_SESSION["utilisateur"])); ?></b>

            </div>
            <div class="menu-li">

                <button class="btn"><a href="home.php">Home</a></button>
                <button class="btn" type="text" name="username" value=""><a href="supprimer.php"> Supprimer Profil</a> </button>
                <button class="btn" type="text" name="username" value=""><a href="./jeux.php">Ajouter jeux</a> </button>
                <button class="btn"><a href="logout.php" class="logout-link">Se déconnecter </a></button>





            </div>


        </div>



        <div class="burgermenu">
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                    <span></span>
                </label>

                <ul class="menu__box">
                    <li><a class="menu__item" href="Home.php">Home</a></li>
                    <li><a class="menu__item" href="#">About</a></li>
                    <li><a class="menu__item" href="#">Team</a></li>
                    <li><a class="menu__item" href="#">Contact</a></li>
                    <li><a class="menu__item" href="Login.php">Login</a></li>
                </ul>
            </div>
        </div>

        <div class="div6">
            <div id="top">
                <h3>Mon profil</h3>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium est itaque dolorem voluptatem necessitatibus. Qui, soluta velit. Aliquid quod, quae nihil dolorum pariatur impedit, repellendus rem alias laboriosam porro doloremque accusantium repudiandae eveniet soluta aspernatur at qui a est autem voluptas? Facere doloremque dolor nulla ipsa perferendis porro, consequuntur eius!</p>
            <hr>

            <div class="underthetop">

                <div class="container">

                    <div>
                        
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias expedita, hic, reprehenderit quo quia deserunt animi, corporis sunt vitae reiciendis in sint itaque? Velit nostrum ea iste recusandae dolorum rem obcaecati, blanditiis facere, commodi praesentium laborum fugiat esse cumque rerum! Earum neque, totam deleniti id dolor aliquid ipsam sint eius, aspernatur perspiciatis illum aperiam error obcaecati aut fugit voluptate cum, laborum sunt commodi dolorem? Odio culpa dolore minima autem debitis recusandae, consectetur quo odit eius quidem quibusdam maiores, aliquid natus. Amet, deleniti quas quaerat praesentium ipsa minima! Sequi aliquam in tenetur error aut, praesentium deserunt obcaecati ab eligendi atque doloribus a ea vitae blanditiis nostrum provident. Eos amet asperiores repellendus a laboriosam omnis laudantium! Aspernatur voluptas, laboriosam placeat excepturi minima animi ad eos nesciunt dolorum consectetur veritatis rerum aut perspiciatis nobis tempora beatae? Saepe eaque iste ea natus. Quia, harum quod fugiat earum eaque non eligendi repellendus commodi porro. Similique eveniet vitae officia earum autem? Nam, commodi ipsam libero aliquid culpa sunt odio nulla unde cupiditate quo quia maiores, est hic quam, eaque illum quibusdam omnis. Porro magnam molestias ipsum eum ad doloribus alias dignissimos itaque suscipit maxime quo impedit eius veniam, corrupti qui voluptate minima, iusto, corporis sapiente tenetur asperiores culpa odit explicabo. Ipsum voluptates, non odit eos labore debitis amet odio tempora ullam totam aliquam sit animi vitae perspiciatis. Accusantium impedit voluptatem suscipit voluptatum, alias, cupiditate sed vero eius, deserunt eligendi quisquam facere quam cum nobis? Expedita incidunt aliquam, cum exercitationem fuga modi reprehenderit. Ab sint similique labore eaque. Eaque in repellendus, nemo illum quae ipsam! Saepe laudantium beatae aspernatur totam, distinctio illum exercitationem alias. Ab, fugit. Quibusdam, laudantium. Cumque totam at corrupti dolor corporis vel, soluta, porro quisquam sit ex fuga nemo, eum doloremque quod vitae nostrum consequatur nam ipsum ut facere placeat obcaecati? Voluptatem, rerum voluptas. Id delectus quas at accusantium aut ipsum ab eveniet tempora exercitationem placeat! Inventore neque incidunt ipsa natus excepturi porro nemo deserunt laboriosam unde tempora illum, commodi quia ut corporis iste facere! Nemo et nihil accusamus illum expedita, animi dolores ullam quisquam sunt neque ex, harum aut velit quae odit! A quasi consectetur minus et quo molestias officiis repellendus perferendis beatae rerum? Exercitationem nulla eaque quisquam modi impedit tempore, ea consequuntur corrupti culpa ex, quasi pariatur magni, consectetur aliquam hic nam delectus praesentium earum beatae quis animi? Illo ut soluta nemo aspernatur enim magni impedit nam possimus animi, quaerat laudantium veritatis vitae doloremque maiores! Natus deleniti laborum laboriosam quisquam? Voluptate fuga porro repudiandae ab similique impedit vel accusantium quia aut nihil! Delectus officiis praesentium labore impedit. Praesentium suscipit, ullam illo minus eligendi aliquam doloribus explicabo temporibus error laboriosam, molestias pariatur delectus omnis quod. Cupiditate qui nulla dolorem distinctio impedit eveniet molestias. Explicabo voluptatum aspernatur at consequuntur. Veniam dolor quis nobis quibusdam esse mollitia perspiciatis iure molestias at labore explicabo perferendis adipisci quas quisquam tenetur reprehenderit dolores molestiae, laborum necessitatibus nemo vero! Fugit dolores iure eligendi. Libero magni rem quas sequi impedit animi expedita omnis quia officiis? Repellat odio illo tempora incidunt.</p>

                        
                    </div>

                    <div class="myRank">

                    </div>
                </div>

            </div>



            <div class="centertext">



            </div>




            <div class="buttonsadd">

            </div>
        </div>
        <script src="./javascript/script.js"></script>
</body>

</html>
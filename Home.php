<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <section id="parent">
        <div class="header_left">
            <p><a>Home</a></p>
        </div>
        <div class="header_right"> 
            <ul>
                <li><a>Dowload app</a></li>
                <li><a>Search</a></li>
                <li><a href="bienvenue.php">My account</a></li>
                <li><a href="profile.php">Profile</a></li>
                
            </ul>
        </div>
        <div class="container_left"> 
            <div class="big_sentence">
                <h3>Let's</h3>
                <h1>play</h1>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod voluptates voluptatibus ea libero porro ullam
                consectetur adipisci impedit repellendus atque optio blanditiis distinctio quidem inventore exercitationem hic dicta
                at dolores qui fuga esse.
            </p><br>
            <div class="button_container">
            <button id="btn-2"><a href="chat.php">Chat with friends</button></a>
                <button id="btn-2"><a href="jeux.php">Explore Gameliste</button></a>
            </div>
        </div>
        <div class="social"> 
            <ol>
                <li><img src="./assets/twitter-icon-white-png-23.jpg" ></li>
                <li><img src="./assets/150-1504080_facebook-white-facebook-white-icon-png-2018-clipart.png"></li>
                <li><img src="./assets/White-Reddit-Logo-1024x943.png"></li>
            </ol>
        </div>
        <div class="bullets"> 
            <span class="dot" id="first" onclick="changerSlide()"></span>
            <span class="dot" onclick="changerSlideTwo()"></span>
            <span class="dot" onclick="changerSlideThree()"></span>
        </div>
    </section>



     <script src="./javascript/script.js"></script>
</body>
</html>
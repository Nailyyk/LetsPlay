<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/stylee.css">
    <link rel="icon" href="./assets/spotify5.webp" />
    <title>Document</title>
</head>
<body>
    <div class="main_container_index">
        <div class="container_index">
            <?php include("left-part.php") ?>
            <div class="container_index_right-form">
                <h1>Upload ta musique ici</h1>
                <form enctype="multipart/form-data" method="post" action="upload.php" id="form-add">
                    
                    <label>Titre</label>
                    <input type="text" name="title" placeholder="title"/>
                    <label>Auteur</label>
                    <input type="text" name="author" placeholder="author"/>
                    <label>Durée</label>
                    <input type="text" name="duree" placeholder="duree"/>
                    <input type="file" name="file1" accept=".ogg,.flac,.mp3" required="required" class="input-file" id="file-button-id"/>
                    <input type="submit" name="submit" id="submit-id-btn"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
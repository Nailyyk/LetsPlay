<?php 

require_once "config.php";

 if (isset($_POST['id']) && !empty($_POST['id'])){
    $sql = "DELETE FROM users WHERE id = ? ";
    if ($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_id);

        $param_id = trim($_POST["id"]);
        if (mysqli_stmt_execute($stmt)){
            header ("location : index.php");
            exit();
        }else{
            echo "error try again";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <style>

body{
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url('./assets/report.jpg');
    background-size:cover;
    background-position: center;
}

</style>
</head>
<body>
    
    
    <div class="wrapper">
        
            <div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <p>Voulez vous vraiment supprimer votre compte ? </p>
            <div>
              
             
                <button class="btn"><a href="home.php">Yes</a></button>
                <button class="btn"><a href="profile.php">No</a></button>   
            
            </div>
                </form>
        </div>
        
    </div>
</body>
</html>
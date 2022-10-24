<?php
require_once 'user.php';


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Password Reset</title>
  </head>
  <body >
  <div>
  <strong>Hello !</strong>  <?php echo $rows['userEmail'] ?> you are here to reset your forgetton password.
  </div>
        <form method="post">
        <h3>Password Reset.</h3><hr />
        <?php
        if(isset($msg))
  {
   echo $msg;
  }
  ?>
        <input type="password" placeholder="New Password" name="pass" required />
        <input type="password" placeholder="Confirm New Password" name="confirm-pass" required />
        <button type="submit" name="resetpass">Reset Your Password</button>
        
      </form>
  </body>
</html>

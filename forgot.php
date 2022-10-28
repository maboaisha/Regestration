<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="MyStyle.css" >
    </head>
    <body style="margin: 0;">
        <div class="nav">
            <div class="links">
                <ul>Regestration</ul>
                <ul>
                <li><a href="signin.php">SignIn</a></li>
                <li><a href="login.php">LogIn</a></li>
                </ul>
            </div>
        </div>
        <div class="addcourse">
        <div class="fo">
        <form method="request" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="makeSpace">
        <label>Email:
        <input type="email" name="email" class="in" placeholder="Enter Email" required></label>
            </div>

            <div class="makeSpace">
        <label>New Password:
        <input type="password" name="newpass" class="in" placeholder="Enter New Password" required></label>
            </div>

            <div class="makeSpace">
        <label>Confirm New Password:
        <input type="password" name="connewpass" class="in" placeholder="Confirm New Password" required></label>
            </div>
    
        <input type="submit" value="reset password" name="reset" class="save">
   
    </form>

        <?php
        if(isset($_GET['reset'])){
        $emailset=$_GET['email'];
        if($_GET['newpass']==$_GET['connewpass']){
        if (strlen($_GET['newpass'])<7){
            echo "<p class='makeSpace'style='color: red'>Warning:<br>Your new password is too short !</p>";}
        else {$passset=$_GET['newpass'];}}
        else {echo "<p class='makeSpace'style='color: blue'>Warning:<br>Check your new password or confirmed new password !</p>";}
        
        require_once 'conn.php';
        
        $sql="UPDATE users SET pass = '$passset' WHERE email == '$emailset'";
        if (mysqli_query($database,$sql)){
            echo"<h4 class='certificate'>your password update successfully,<br>click <a style='color: blue' href='login.php'>here</a> to login</h4>";
    }else{
        echo "<h4 class='certificate'>sorry some thing is erorr or dont have an account <a style='color: blue' href='signin.php'>creat yours</a>.<br>".$database->error."</h4>";
    }
    $database->close();
}
?>
    </body>
</html>
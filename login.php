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
                <li class="add"><a href="login.php" style="color: white;">LogIn</a></li>
                </ul>
            </div>
        </div>
        <div class="addcourse">
        <div class="fo">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="makeSpace">
        <label>Email:
        <input type="email" name="email" class="in" placeholder="Enter Email" required></label>
            </div>

            <div class="makeSpace">
        <label>Password:
        <input type="password" name="pass" class="in" placeholder="Enter Password" required></label>
            </div>
    
        <input type="submit" name="submit" class="save">
        <input type="reset" name="reset" class="reset">
        <h4>Forget your password click <a style="color: blue" href='forgot.php'>here</a>.</h4>
    </form>

        <?php
        if(isset($_POST['submit'])){
        $emaillog=$_POST['email'];
        $passlog=$_POST['pass'];

        require_once 'conn.php';

        $result=$database->query("SELECT * FROM users WHERE email = '$emaillog'");
        if ($result-> num_rows > 0){
            while($row=$result->fetch_assoc()){
                if ($passlog == $row['pass']){
            echo "<h4 class='certificate'>Login successfully<br>Welcome back \" ".$row['fname']."\"</h4>";
        } else { echo"check your password.";}
        }
    } else {
        {echo"<h4 class='certificate'>check your email or dont have an account <a style='color: blue' href='signin.php'>creat yours</a>.</h4>";}
}
    
    $database->close();
}
?>
    </body>
</html>
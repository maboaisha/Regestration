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
                <li class="add"><a href="signin.php" style="color: white;">SignIn</a></li>
                <li><a href="login.php">LogIn</a></li>
                </ul>
            </div>
        </div>
        <div class="addcourse">
        <div class="fo">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
            <div class="makeSpace">
        <label>Full Name:
        <input type="text" name="fullname" class="in" placeholder="Enter Fullname" required></label>
            </div>

            <div class="makeSpace">
        <label>User Name:
        <input type="text" name="username" class="in" placeholder="Enter Username" required></label>
            </div>

            <div class="makeSpace">
        <label>Email:
        <input type="email" name="email" class="in" placeholder="Enter Email" required></label>
            </div>

            <div class="makeSpace">
        <label>Password:
        <input type="password" name="pass" class="in" placeholder="Enter Password" required></label>
            </div>

            <div class="makeSpace">
        <label>Confirm Password:
        <input type="password" name="conpass" class="in" placeholder="Confirm youe Password" required></label>
            </div>

            <div class="makeSpace">
        <class="radio">Gender:
        <input type="radio" name="gender" value="m" checked class="inf">
        <label class="radio" style="position: absolute;left: 294px;">Male</label>
        <input type="radio" name="gender" value="f" class="inu">
        <label class="url">Female</label>
            </div>
    

        <input type="submit" name="submit" class="save">
        <input type="reset" name="reset" class="reset">
   
    </form>

        <?php
        if(isset($_POST['submit'])){
    $fname=$_POST['fullname'];
    $uname=$_POST['username'];
    $email=$_POST['email'];
    if($_POST['pass']==$_POST['conpass']){
        if (strlen($_POST['pass'])>7){
        $pass=$_POST['pass'];}
    else {echo "<h4 class='makeSpace'style='color: red'>Warning:<br>Your password is too short !</h4>";}}
    else {echo "<h4 class='makeSpace'style='color: blue'>Warning:<br>Check your password or confirmed password !</h4>";}
    $gender=$_POST['gender'];

    $database = mysqli_connect('localhost','root','','phptest');

    require_once 'conn.php';

        $stmt=$database ->prepare("insert into users
        (fname,uname,email,pass,gender)
        values(?,?,?,?,?)");
        $stmt ->bind_param("sssss",$fname,$uname,$email,$pass,$gender);
        $stmt ->execute();
        $stmt ->store_result();
        $stmt ->close();
        $database ->close();
        echo"<h4 class='certificate'>your account created successfully,<br>Welcome.</h4>";
    }
    //mysqli_close($database)
?>
    </body>
</html>
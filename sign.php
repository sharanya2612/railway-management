<?php
include("connection.php");

if(isset($_POST['submit'])){
    $Username=$_POST["Username"];
    $Password=$_POST["Password"];

    $sql="SELECT * FROM users WHERE Username='$Username' and Password='$Password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        header("location:home.php");
    }
    else{
        echo'<script>alert("Username and Password is not matching")</script>';
    }


}
?>
<html>
    <head>
        <title>Railway</title>
        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <marquee direction="center"> <h1>
            <span class="multicolortext">WELCOME TO INDIAN RAILWAYS</span>
          </h1></marquee>
        
        <div class="loginbox">
        
           
        <form action="" method="post">
           
            <div class="form">
            <input type="text" name="Username" placeholder="Username">
                <input type="password" name="Password" placeholder="Password">
                <button type="submit" name="submit">Login</button>
                Don't have an account?&nbsp;<a href ="index.php">Register Here</a>

            
        </div>
    </form> 
</div>
    
    
   
</body>
</html>

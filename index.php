<?php
include("connection.php");

if(isset($_POST['submit'])){
    $Username=$_POST["Username"];
    $EmailId=$_POST["EmailId"];
    $Password=$_POST["Password"];
    $ConfirmPassword=$_POST["ConfirmPassword"];
   

   if($Password !== $ConfirmPassword){
    echo'<Script>alert("Password is not matching")</Script>';
   }

   if(empty($Username) OR empty($EmailId) OR empty($Password) OR empty($ConfirmPassword)){
    echo'<Script>alert("All fields are required")</Script>';
   }
   else{
    $sql="SELECT * FROM users WHERE EmailId='$EmailId'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num>0){
        echo'<script>alert("Email already exists")</script>';
    }
    else{
        
        if($Password===$ConfirmPassword){
         $insert="INSERT INTO users(Username,EmailId,Password) VALUES('$Username','$EmailId','$Password')";
            mysqli_query($conn,$insert);
        

        header("location:sign.php");
}
    }
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
                
                    <input type="text"  name="Username" placeholder="Username">

                <input type="text"  name="EmailId" placeholder="Email Id">
    
                <input type="text"  name="Password" placeholder="Password">
        
                <input type="text"  name="ConfirmPassword" placeholder="Confirm Password">
       
               
                <button type="submit" name="submit">Create</button>
        
                Already Registered?&nbsp;<a href ="sign.php">Login Here</a>
                
       
                </div>
            </form> 
        </div>
            
            
           
     </body>
</html>

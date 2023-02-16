<?php
include("connection.php");
session_start();

if(isset($_POST['submit'])){

$pid=rand(70,5000);
$pnr=rand(900000000,1000000000);
$seat=rand(1,100);
$pname=$_POST["P_NAME"];
$age=$_POST["AGE"];
$gender=$_POST["GENDER"];
$dob=$_POST["DOB"];
$source=$_POST["SOURCE"];
$dest=$_POST["DESTINATION"];
$email=$_POST["EMAIL"];
$phno=$_POST["PHONE_NUMBER"];
$coach=$_POST["COACH"];
$date=$_POST["START_JOURNEY"];

  if(empty($pname) OR empty($age) OR empty($gender) OR empty($dob) OR empty($source) OR empty($dest) OR empty($email) OR empty($phno)){
    echo'<script>alert("All fields are required")</script>';
   }


else{
  
  $query="SELECT TRAIN_ID FROM schedule WHERE SOURCE='$source' AND DESTINATION='$dest' ";
  $result = $conn->query($query);
 



if ($result->num_rows==NULL) {
  echo "<script type='text/javascript'>alert('Please Enter valid Source and Destination');</script>";
}
  else{
  while($row = $result->fetch_assoc()) {
    $tid=$row["TRAIN_ID"];
    $sql="INSERT INTO passengers(P_ID,P_NAME,AGE,GENDER,DOB,EMAIL,PHONE_NUMBER,T_NO) VALUES('$pid','$pname','$age','$gender','$dob','$email','$phno','$tid') ";
    mysqli_query($conn,$sql);
  
    if($coach=='1A')
    $price=125;

    if($coach=='1B')
    $price=150;

    if($coach=='2A')
    $price=250;

    if($coach=='2B')
    $price=275;

    if($coach=='3A')
    $price=350;

    if($coach=='3B')
    $price=500;

    if($coach=='SL')
    $price=200;

    if($coach=='GENERAL')
    $price=100;


    $sqlp="SELECT * FROM passengers WHERE T_NO=$tid ";
    $result1 = $conn->query($sqlp);
    if($result1->num_rows>20)
    {
      $status='WAITING';
    }
    else {
      $status='CONFIRMED';
    }
    $sqlt="INSERT INTO ticket(PNR,COACH,STATUS,SEAT_NO,FARE,START_JOURNEY,P_ID) VALUES('$pnr','$coach','$status','$seat','$price','$date','$pid') ";
    mysqli_query($conn,$sqlt);

    
  

    
  }
  
 


  header("location:payaction.php");
}

 




  

}

}

?>
<style>

    .container{
        border-spacing: 10px;

      font-family: Montserrat, sans-serif;
     font-size: 18px !important;
      border: 2px solid grey;
        margin-top: 30px;
        margin-bottom: 50px;
       padding-top: 20px;
      padding-right: 50px;
      padding-bottom: 5px;
      padding-left: 100px;
      align-content: center;
    }
    .button {
  padding: 15px 20px;
  align-content: left;
  color: white;
background-color:black;
    }
#number {
  overflow: hidden;
  width: 600px;
}
input[type=number]{
    width: 250px;
} 

  </style>


<html>
 
<body>
  

  <h1><center><b>BOOK YOUR TICKET &nbsp</center></b></h1>
 






<div class="container">
<form action="" method="post">

<div class="container2">
      
       <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
PASSENGER NAME:</b></label>
<input type="text"  name="P_NAME">
</div>
  <br>
 
  <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
DATE OF BIRTH:</b></label>
<input type="text"  name="DOB" placeholder="MM-DD-YYYY">
</div>
  <br>
  
 
  <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
AGE:</b></label>
<input type="text"  name="AGE">
</div>
  <br>
  
  <center>  
 
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
GENDER:</b></label>
<input type="text"  name="GENDER" placeholder="M/F">
</div>
  <br>
  
 
  
  <center>  
 
  <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
SOURCE:</b></label>
<input type="text"  name="SOURCE" placeholder="refer to Train Info">
   </select> 

  </div>
  <br>
  
 
  <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
DESTINATION:</b></label>
<input type="text"  name="DESTINATION" placeholder="refer to Train Info">
   </select> 

  </div>
  <br>
  
  <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
DATE OF JOURNEY:</b></label>
<input type="text"  name="START_JOURNEY" placeholder="DD-MM-YYYY">
   </select> 

  </div>
  <br>
  
  <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
EMAIL ID:</b></label>
<input type="text"  name="EMAIL">
   </select> 

  </div>
  <br>
  


  <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
PHONE NUMBER:</b></label>
<input type="text"  name="PHONE_NUMBER">
   </select> 

  </div>
  <br>
  
       
      
 <center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b> 
TRAIN CLASS:</b></label>
      <select id="inputState" class="form-control" name="COACH">
      <option>Select option</option>
  <option>1A</option>
  <option>1B</option>
  <option>2A</option>
  <option>2B</option>
  <option>3A</option>
  <option>3B</option>
  <option>SL</option>
  <option>GENERAL</option>

   
   
   </select> 

  </div>
  <br>
 <button type="submit" name="submit">Submit</button>
 <br>
 <br>
 Go to Home Page &nbsp;<a href ="home.php">Click Here</a>
    
 

</div>


</form> 
</div>
  




</body>
</html>
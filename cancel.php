<?php 
session_start();
include("connection.php");
if (isset($_POST['submit']))
{
$pnr=$_POST['PNR'];
$query1="SELECT * FROM ticket WHERE PNR='$pnr'";
$res=$conn->query($query1);
if($res->num_rows == NULL){
  echo "<script type='text/javascript'>alert('PNR not found');</script>";
}
else
{

$row = $res->fetch_assoc();
$query="DELETE FROM ticket WHERE PNR='$pnr'";
$res=$conn->query($query);
$pid=$row['P_ID'];
$sql = "DELETE FROM passengers WHERE P_ID='$pid'";
$result=$conn->query($sql);


    header("location:echo.php");	
}
}

?>


<style >
        .container{
        border-spacing: 10px;

      font-family: Montserrat, sans-serif;
     font-size: 18px !important;
      border: 2px solid grey;
        margin-top: 50px;
        margin-bottom: 50px;
       padding-top: 60px;
      padding-right: 50px;
      padding-bottom: 50px;
      padding-left: 150px;
      align-content: center;
    }
    .button {
  padding: 15px 32px;
  align-content: center;
  color: white;
background-color:black;
    }

</style>
<html>
<h1 align="center">Cancel Ticket</h1>

        


 
<body>
   

<div class="container">
<form action="" method="post">

<div class="container2">
    
      
<center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b>PNR:</b></label>
<input type="text" name="PNR">
</div>
  <br>
  <br>
  <center> 



<button type="submit" name="submit">Submit</button>

    
 

    </div>
    
    
    </form> 
    </div>
    </html>
</body>
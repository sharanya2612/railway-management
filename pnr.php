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
<body>
   

<div class="container">
<form action="" method="post">

<div class="container2">
    
      
<center>  
          <div class="form-group col-md-5" name="class">
      <label for="inputPassword4"><b>NAME:</b></label>
<input type="text"  name="P_NAME">
</div>
  <br>
  <br>
  <center> 
        
<center>  
<div class="form-group col-md-5" name="class">
<label for="inputPassword4"><b>EMAIL:</b></label>
<input type="text"  name="EMAIL">
</div>
<br>
<br>
<center> 



<button type="submit" name="submit">Submit</button>

    
 

    </div>
    
    
    </form> 
    </div>
   
</body>
</html>
<?php


include("connection.php");
session_start();
if(isset($_POST['submit'])){
            $pname=$_POST["P_NAME"];
            $email=$_POST["EMAIL"];
          
         
           $query= "SELECT * FROM passengers where P_NAME='$pname' AND EMAIL='$email'";
		  
           $res=$conn->query($query);
           $row = $res->fetch_assoc();
          
            if($row==NULL)	{
              echo "<center><h1>PNR NOT FOUND!!</h1></center>";
              ?>
              <center>
            
            Go to Home Page &nbsp;<a href ="home.php">Click Here
            </center>
            </html>
            <?php
              
             
              
            }
        else{
          $pid=$row["P_ID"];
          
          $sel="SELECT PNR,STATUS FROM ticket where P_ID='$pid'";
          $rs=$conn->query($sel);
          $row=$rs->fetch_assoc();
      
          
       
    ?>
<style>
.ticket {

    font-family: Montserrat, sans-serif;
}

.ticketdesign {
  background: linear-gradient(to bottom, #FFC107 0%, #FFC107 19%, #d9d9d9 19%, #d9d9d9 100%);
  height: 20em;
  float: center;
  object-position: center;
  padding: 1em;
  margin-top: 90px;

}


.ticketstructure {
  align-content: center;
  border-top-left-radius: 18px;
  border-bottom-left-radius: 18px;
   border-top-right-radius: 18px;
   border-bottom-right-radius: 18px;



  width: 20em;
}

h1 {
  font-size: 40px;
  margin-top: 0;
      font-family: Montserrat, sans-serif;

 
}
h2 h3 {
  font-size: 20px;
  margin-top: 0;
      font-family: Montserrat, sans-serif;
      color:black;
}
span {
  color: black;
}
#options {
	align-content:center;
	align-items:center;
    text-align: center;
}
.printable {
   padding-left: 
   10px;text-align:left;
}


</style>

          
<div class="ticket " id="printable">
		
  <div class="ticketdesign ticketstructure" >
    
    <div class="title">
    <h1><center><b>Your Details: &nbsp</center></b></h1>
    <h2 align="left"><span>PNR : &nbsp <?php echo $row['PNR'] ?></span></h2>
    <h2 align="left"><span>STATUS : &nbsp <?php echo $row['STATUS'] ?></span></h2><br>
    </center>

    Go to Home Page &nbsp;<a href ="home.php">Click Here
     
		<?php
        }
        }
        ?>

       
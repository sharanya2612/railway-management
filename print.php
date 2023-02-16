<?php


include("connection.php");
session_start();
           
            $pnr=$_POST["PNR"];
          
         
         
		  
			
			$sel="SELECT * FROM train T ,passengers P ,station N ,routes R ,schedule S ,ticket K WHERE T.T_ID=P.T_NO AND T.T_ID=S.TRAIN_ID AND S.SCHEDULE_ID=R.SCHEDULE_ID AND R.S_ID=N.S_ID AND P.P_ID=K.P_ID AND K.PNR='$pnr'";
			$rs=$conn->query($sel);
			$row=$rs->fetch_assoc();
	
            if($row==NULL)	{
              echo "<center><h1>PNR NOT FOUND!!</h1></center>";
              ?>
              
            <html><body>
              <center>Enter Again &nbsp;<a href ="preprint.php">Click Here</a>
            <br>
            Go to Home Page &nbsp;<a href ="home.php">Click Here
            </center>
            </html>
            <?php
              
             
              
            }
        else{
          
       
    ?>
<style>
.ticket {

    font-family: Montserrat, sans-serif;
}

.ticketdesign {
  background: linear-gradient(to bottom, #FFC107 0%, #FFC107 19%, #d9d9d9 19%, #d9d9d9 100%);
  height: 49em;
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



  width: 70em;
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
    <h2 align="left"><span>PNR : &nbsp <?php echo $row['PNR'] ?></span></h2>
    <h2 align="left"><span>NAME : &nbsp <?php echo $row['P_NAME'] ?></span></h2>
    <h2 align="left"><span>TRAIN NAME : &nbsp <?php echo $row['T_NAME'] ?></span></h2><br>
     <h1 align="center"><span><?php echo $row["SOURCE"]; ?> &nbsp&nbsp To &nbsp&nbsp <?php echo $row['DESTINATION'] ?>  </span></h1>
     <h2 align="left"><span>JOURNEY DATE : &nbsp <?php echo $row['START_JOURNEY'] ?></span></h2>
    <h2 align="left"><span>START TIME : &nbsp <?php echo $row['START_TIME'] ?></span></h2> 
    <h2 align="left"><span>END TIME : &nbsp <?php echo $row['END_TIME'] ?></span></h2> 
   <h2 align="left"><span>COACH : &nbsp <?php echo $row['COACH'] ?></span></h2>
   <h2 align="left"><span>SEAT NUMBER : &nbsp <?php echo $row['SEAT_NO'] ?></span></h2>
   <h2 align="left"><span>STATION NAME :&nbsp <?php echo $row['S_NAME'] ?> </span></h2>
   <h2 align="left"><span>STATION CODE :&nbsp <?php echo $row['S_CODE'] ?> </span></h2>
   <h2 align="left"><span>ROUTE : &nbsp <?php echo $row['ROUTE_NO'] ?> </span></h2>
   <h2 align="left"><span>AMOUNT : &nbsp ₹<?php echo $row['FARE'] ?> </span></h2>
   
   <h2 align="center"><span>WISH YOU A HAPPY & SAFE JOURNEY</span> </h2>

  
   Go to Home Page &nbsp;<a href ="home.php">Click Here</a>
</div>
    
    </div>
</div>


			<?php
		}
  
        
          
		?>

</div>


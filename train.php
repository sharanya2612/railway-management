<html>

<head>


	<LINK REL="STYLESHEET" HREF="style.css">
	<style type="text/css">

table

{

border-style:solid;

border-width:2px;

border-color:black;

}

html { 
		  background: url(img/bg4.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}

</style>

</head>

<body>

<?php 
include("connection.php");
session_start();
$query = "SELECT * FROM train,schedule WHERE T_ID=TRAIN_ID";
$result=mysqli_query($conn,$query);

echo '<p style= "font:200%" >   </p>';
echo '<table border="1" style="width:100%">
<tr>
  <th bgcolor="white" style="font-size:30px">Train ID</th>
  <th bgcolor="white" style="font-size:30px">Train Name</th>
  <th bgcolor="white" style="font-size:30px">Train Type</th>
  <th bgcolor="white" style="font-size:30px">Source</th>
  <th bgcolor="white" style="font-size:30px">Destination</th>
  <th bgcolor="white" style="font-size:30px">Start_time</th>
  <th bgcolor="white" style="font-size:30px">Dest_Time</th>
</tr>';


while($row=mysqli_fetch_array($result)){

echo '<tr> 


                  <td bgcolor="white" style="font-size:30px">'.$row["TRAIN_ID"].'</td> 
                  <td bgcolor="white" style="font-size:30px">'.$row["T_NAME"].'</td>
                 
                  <td bgcolor="white" style="font-size:30px">'.$row["T_TYPE"].'</td>
				  <td bgcolor="white" style="font-size:30px">'.$row["SOURCE"].'</td>  
                  <td bgcolor="white" style="font-size:30px">'.$row["DESTINATION"].'</td> 
                  <td bgcolor="white" style="font-size:30px">'.$row["START_TIME"].'</td> 
				  <td bgcolor="white" style="font-size:30px">'.$row["END_TIME"].'</td> 
         </tr>';
}


?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="s1.css" type="text/css">
<style type="text/css">
	li {
		font-family: sans-serif;
		font-size:18px;
	}
</style>
<script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
              $("#Logout").hide();
            });
            $(document).ready(function(){
                $("#user").hover(function(){
                    $("#Logout").toggle("slow");
                });
            });
        </script>
</head>
<body link="white" alink="white" vlink="white">
     <div class="container dark">
        <div class="wrapper">
          <div class="Menu">
            <ul id="navmenu">
            <li><a href="book.php">Book a Ticket</a></li>
            <li><A HREF="pnr.php">PNR & Status</A></li>
            <li><A HREF="preprint.php">Print Ticket</A></li>

           
            <li><a href="train.php">Train Info</a></li>
            <li><a href="fare.php">Price Info</a></li>
            <li><a href="cancel.php">Cancel a Ticket</a></li>
            <li><A HREF="logout.php">Logout</A></li>

            <li><?php  
				if(isset($_SESSION['user_info'])){
					echo '<div id="dropdown">'.$_SESSION['user_info'].'<div id="Logout" style="display:none">Logout</div>';
        }

    


				?>
			</li>
            </ul>
          </div>
        </div>
      </div>
</body>
</html>
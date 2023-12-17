<?php
session_start();
include("trainer_header.php");
include("conn.php");


?>
    <div class="header banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h1><a class="brand" href="#">Yoga Classes</a></h1>
                        <!-- <a class="brand" href="index.html"><img alt="Logo" src="img/logo.jpg"></a> -->
                    </div>
                </div>

                <div class="col-md-12">
                    <h1></h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->
        
        <!-- Contact Section Start -->
        <div id="contact" style="padding-top: 50px;">
            <div class="container">
                <div class="section-header">
                    <h2>VIEW FEEDBACK DETAIL</h2>
                  
                </div>
                
                <div class="row">
                 
					
					<div class="col-md-12 contact-col">
					
                    <?php
					$trainerid=$_SESSION['trainerid'];
					$res4=mysqli_query($conn,"select * from feedback where trainer_id='$trainerid'");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>FEEDBACK ID</th>
									<th>FEEDBACK DATE</th>
									<th>FEEDBACK DESCRIPTION</th>
																	
								</tr>";
						while($r4=mysqli_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							echo "<td>$r4[1]</td>";
							echo "<td>$r4[2]</td>";
						
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<h2>No Feedback Found</h2>";
					}
					
					?>
                         
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section Start -->
        

<?php
include("footer.php");
?>
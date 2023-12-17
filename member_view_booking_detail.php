<?php
session_start();
include("member_header.php");
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
                    <h2>COURSE BOOKING DETAIL</h2>
                  
                </div>
                
                <div class="row">
                 
					
					<div class="col-md-12 contact-col">
					
                    <?php
					$memberid=$_SESSION['memid'];
					$res4=mysqli_query($conn,"select * from booking_master where member_id='$memberid'");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>BOOKING ID</th>
									<th>BOOKING DATE</th>
									<th>COURSE NAME</th>
									<th>DURATION</th>
									
									<th>COURSE IMAGE</th>
									<th>HEALTH ISSUES</th>
									<th>AGE</th>
									<th>COURSE CHARGES</th>
								</tr>";
						while($r4=mysqli_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							echo "<td>$r4[1]</td>";
							
							$res5=mysqli_query($conn,"select * from course_master where course_id='$r4[3]'");
							$r5=mysqli_fetch_array($res5);
							echo "<td>$r5[1]</td>";
							echo "<td>$r5[3]</td>";
							echo "<td><img src='$r5[5]' style='width:150px; height:150px;'></td>";
							echo "<td>$r4[5]</td>";
							echo "<td>$r4[6]</td>";
							echo "<td>$r5[4]</td>";
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<h2>No Booking Found</h2>";
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
<?php
include("admin_header.php");
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
                    <h2>YOGA COURSES DETAIL REPORT</h2>
                  
                </div>
                
                <div class="row">
                  
					
					<div class="col-md-12 contact-col">
					
                    <?php
					$cid=$_REQUEST['cid'];
					$res4=mysql_query("select * from booking_master where course_id='$cid'");
					if(mysql_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>BOOKING ID</th>
									<th>BOOKING DATE</th>
									<th>MEMBER NAME</th>
									<th>MOBILE NO</th>
									<th>COURSE NAME</th>
									<th>TRAINER NAME</th>
									<th>HEALTH ISSUES</th>
									<th>AGE</th>
									
								</tr>";
						while($r4=mysql_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							echo "<td>$r4[1]</td>";
							//echo "<td>$r4[2]</td>";
							$res5=mysql_query("select * from member_regis where member_id='$r4[2]'");
							$r5=mysql_fetch_array($res5);
							echo "<td>$r5[1]</td>";
							echo "<td>$r5[4]</td>";
							$res6=mysql_query("select * from course_master where course_id='$r4[3]'");
							$r6=mysql_fetch_array($res6);
							echo "<td>$r6[1]</td>";
							
							$res7=mysql_query("select * from trainer_dietian_regis where trainer_id='$r4[4]'");
							$r7=mysql_fetch_array($res7);
							echo "<td>$r7[1]</td>";
							echo "<td>$r4[5]</td>";
							echo "<td>$r4[6]</td>";
							
							
							
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
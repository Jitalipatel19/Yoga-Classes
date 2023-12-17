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
					$res4=mysql_query("select * from course_master");
					if(mysql_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>COURSE ID</th>
									<th>COURSE NAME</th>
									<th>DESCRIPTION</th>
									<th>DURATION</th>
									<th>COURSE FEES</th>
									<th>COURSE IMAGE</th>
									<th>VIEW PACKAGE BOOKING</th>
									
								</tr>";
						while($r4=mysql_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							echo "<td>$r4[1]</td>";
							echo "<td>$r4[2]</td>";
							echo "<td>$r4[3]</td>";
							echo "<td>$r4[4]</td>";
							echo "<td><img src='$r4[5]' style='width:150px; height:150px;'></td>";
							echo "<td><a href='admin_view_course_wise_booking_report.php?cid=$r4[0]'>VIEW PACKAGE BOOKING</a></td>";
							
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<h2>No Course Found</h2>";
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
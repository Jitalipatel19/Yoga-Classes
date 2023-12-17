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
                    <h2>TRAINER DETAIL REPORT</h2>
                  
                </div>
                
                <div class="row">
                  
					
					<div class="col-md-12 contact-col">
					
                    <?php
					$res4=mysqli_query($conn,"select * from trainer_dietian_regis");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>TAINER ID</th>
									<th>TAINER NAME</th>
									<th>ADDRES</th>
									<th>CITY</th>
									<th>MOBILE NO</th>
									<th>EMAIL ID</th>
									<th>GENDER</th>
									<th>VIEW PACKAGE BOOKING</th>
									<th>VIEW EVENT BOOKING</th>
								</tr>";
						while($r4=mysqli_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							echo "<td>$r4[1]</td>";
							echo "<td>$r4[2]</td>";
							echo "<td>$r4[3]</td>";
							echo "<td>$r4[4]</td>";
							echo "<td>$r4[5]</td>";
							echo "<td>$r4[7]</td>";
							echo "<td><a href='admin_view_trainer_wise_member_report.php?tid=$r4[0]'>VIEW MEMBER REPORT</a></td>";
							echo "<td><a href='admin_view_trainer_wise_event_report.php?tid=$r4[0]'>VIEW EVENT BOOKING</a></td>";
							
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
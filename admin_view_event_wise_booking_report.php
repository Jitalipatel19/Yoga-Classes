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
                    <h2>EVENT WISE BOOKING DETAIL REPORT</h2>
                  
                </div>
                
               
                  
				<div class="row">
				<div class="col-md-12 contact-col">
					
                    <?php
					$eid=$_REQUEST['eid'];
					$res4=mysql_query("select * from book_event_detail where event_id='$eid'");
					if(mysql_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>BOOK EVENT ID</th>
									
									<th>EVENT NAME</th>
									<th>MEMBER NAME</th>
									<th>TRAINER NAME</th>
									
									
									<th>BOOKING DATE</th>
								</tr>";
						while($r4=mysql_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							//echo "<td>$r4[1]</td>";
							$res5=mysql_query("select * from event_master where event_id='$r4[1]'");
							$r5=mysql_fetch_array($res5);
							echo "<td>$r5[2]</td>";
							if($r4[2]=="0")
							{
								echo "<td>-------</td>";
							}else{
								$res6=mysql_query("select * from member_regis where member_id='$r4[2]'");
								$r6=mysql_fetch_array($res6);
								echo "<td>$r6[1]</td>";
							}
							if($r4[3]=="0")
							{
								echo "<td>-------</td>";
							}else{
								$res7=mysql_query("select * from trainer_dietian_regis where trainer_id='$r4[3]'");
								$r7=mysql_fetch_array($res7);
								echo "<td>$r7[1]</td>";
							}
							
							echo "<td>$r4[4]</td>";
							
							
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
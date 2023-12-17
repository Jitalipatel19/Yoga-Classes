<?php
include("admin_header.php");
include("conn.php");


if(isset($_POST['btnreport']))
{
	$sdate=date("Y-m-d",strtotime($_POST['txtsdate']));
	$edate=date("Y-m-d",strtotime($_POST['txtedate']));
}
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
                    <h2>DATE WISE EVENT BOOKING DETAIL REPORT</h2>
                  
                </div>
                
                <div class="row">
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                           <form  name="form1" id="contactForm" method="post" enctype="multipart/form-data">
                               <div class="control-group">
							   <span style='color:white; float:left;'>Select Start Date</span>
                                    <input type="date" class="form-control" name="txtsdate" placeholder="Enter Course Name"  value="<?php if(isset($sdate)){ echo $sdate; }else{ echo date("Y-m-d"); } ?>"/>
                                    <p class="help-block text-danger"></p>
                                </div>
							
								
								
								
								
								
								
                               <br/><br/>
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                          <div class="control-group">
							   <span style='color:white; float:left;'>Select End Date</span>
                                    <input type="date" class="form-control" name="txtedate" placeholder="Enter Course Name"  value="<?php if(isset($edate)){ echo $edate; }else{ echo date("Y-m-d"); } ?>"/>
                                    <p class="help-block text-danger"></p>
                                </div>
								
                                <div class="button">
							
									<button type="submit" name="btnreport" onclick="return validation();">VIEW REPORT</button>
									
								
								</div>
                            </form>
                        </div>
                    </div>
					
					<div class="col-md-12 contact-col">
					
                    <?php
						if(isset($_POST['btnreport']))
						{
							$res4=mysqli_query($conn,"select * from book_event_detail where booking_date>='$sdate' and booking_date<='$edate'");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>BOOK EVENT ID</th>
									
									<th>EVENT NAME</th>
									<th>MEMBER NAME</th>
									<th>TRAINER NAME</th>
									
									
									<th>BOOKING DATE</th>
								</tr>";
						while($r4=mysqli_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							//echo "<td>$r4[1]</td>";
							$res5=mysqli_query($conn,"select * from event_master where event_id='$r4[1]'");
							$r5=mysqli_fetch_array($res5);
							echo "<td>$r5[2]</td>";
							if($r4[2]=="0")
							{
								echo "<td>-------</td>";
							}else{
								$res6=mysqli_query($conn,"select * from member_regis where member_id='$r4[2]'");
								$r6=mysqli_fetch_array($res6);
								echo "<td>$r6[1]</td>";
							}
							if($r4[3]=="0")
							{
								echo "<td>-------</td>";
							}else{
								$res7=mysqli_query($conn,"select * from trainer_dietian_regis where trainer_id='$r4[3]'");
								$r7=mysqli_fetch_array($res7);
								echo "<td>$r7[1]</td>";
							}
							
							echo "<td>$r4[4]</td>";
							
							
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<h2>No Booking Found</h2>";
					}
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
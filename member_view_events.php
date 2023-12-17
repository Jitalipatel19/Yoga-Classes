<?php
session_start();
include("member_header.php");
include("conn.php");

if(isset($_REQUEST['eid']))
{
	$eid=$_REQUEST['eid'];
	$memid=$_SESSION['memid'];
	$bdate=date("Y-m-d");
	//auto no code start..
	$qur1=mysqli_query($conn,"select max(book_event_id) from book_event_detail");
	$beid=0;
	while($q1=mysqli_fetch_array($qur1))
	{
		$beid=$q1[0];
	}
	$beid++;
	//auto no code end..
	
	$query="insert into book_event_detail values('$beid','$eid','$memid','0','$bdate')";
	if(mysqli_query($conn,$query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Event Booked Successfully');";
		echo "window.location.href='member_view_events.php';";
		echo "</script>";
	}	
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
                    <h1>Upcomings Event</h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->

        <!-- Teacher Section Start -->
        <div id="team">
            <div class="container">
                <div class="section-header">
                    <h2>Upcoming Events</h2>
                  
                </div>

                <div class="row">
				<?php
				$tdate=date("Y-m-d");
				$res1=mysqli_query($conn,"select * from event_master where event_start_date>='$tdate'");
				if(mysqli_num_rows($res1)>0)
				{
					while($r1=mysqli_fetch_array($res1))
					{
				?>
                    <div class="col-sm-6 col-md-3" style="margin-left:10px;">
                        <div class="card card-block">
                            <a href="#">
							<img alt="" class="team-img" src="<?php echo $r1[7]; ?>">
                                <div class="card-title-wrap">
                                    <span class="card-title"><?php echo $r1[2]; ?></span> <span class="card-text"><?php echo $r1[6]; ?></span>
                                </div>

                                <div class="team-over">
                                    <p>
                                        <?php echo $r1[3]; ?>
                                    </p>
									<?php
									$member_id=$_SESSION['memid'];
									$res2=mysqli_query($conn,"select * from book_event_detail where event_id='$r1[0]' and member_id='$member_id'");
									if(mysqli_num_rows($res2)>0)
									{
										?>
										<a class="btn" href="#">ALREADY BOOKED</a>
										<?php
									}else{
									?>
										<a class="btn" href="member_view_events.php?eid=<?php echo $r1[0]; ?>">BOOK YOUR SEAT</a>
									<?php
									}
									?>
                                </div>
                            </a>
                        </div>
                    </div>
				<?php
					}
				}else{
					echo "<h2>No Upcoming Event Found</h2>";
				}
				?>
                  
                </div>
            </div>
        </div>
        <!-- Teacher Section End -->

<?php
include("footer.php");
?>
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
                    <h1> VIDEO DETAIL</h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->

        <!-- Classes Section Start -->
        <div id="classes">
            <div class="container">
                <div class="section-header">
                    <h2>COURSE WISE VIDEO DETAIL</h2>
                    
                </div>
                <div class="row">
				<?php
			$cid=$_REQUEST['cid'];
				$tid=$_REQUEST['tid'];
				$res1=mysqli_query($conn,"select * from video_detail where course_id='$cid' and trainer_id='$tid'");
				if(mysqli_num_rows($res1)>0)
				{
					while($r1=mysqli_fetch_array($res1))
					{
				?>
                    <div class="col-lg-6 single-class">
                        <div class="row">
                            <div class="col-sm-6">
                             <video controls style="width:250px; height:350px;" >
								<source src="<?php echo $r1[5]; ?>">
							</video>
                            </div>
                            <div class="col-sm-6">
                                <div class="class-des">
                                    <h4><?php echo $r1[2]; ?></h4>
                                    <span></span>
                                    <p>Description <?php echo $r1[4]; ?></p>
						
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
					}
				}else{
					echo "<h2>No Course Found</h2>";
				}
				?>   
                    
                </div>
            </div>
        </div>
        <!-- Classes Section End -->

<?php
include("footer.php");
?>
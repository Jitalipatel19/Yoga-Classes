<?php
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
                    <h1>Our Courses</h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->

        <!-- Classes Section Start -->
        <div id="classes">
            <div class="container">
                <div class="section-header">
                    <h2>Our Courses</h2>
                    
                </div>
                <div class="row">
				<?php
				$res1=mysqli_query($conn,"select * from course_master");
				if(mysqli_num_rows($res1)>0)
				{
					while($r1=mysqli_fetch_array($res1))
					{
				?>
                    <div class="col-lg-6 single-class">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="class-img">
                                    <img src="<?php echo $r1[5]; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="class-des">
                                    <h4><?php echo $r1[1]; ?></h4>
                                    <span><?php echo $r1[3]; ?></span>
                                    <p>Fees &#8377; <?php echo $r1[4]; ?>/-</p>
                                    <a class="btn" href="trainer_upload_video.php?cid=<?php echo $r1[0]; ?>">UPLOAD YOUR VIDEO</a>
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
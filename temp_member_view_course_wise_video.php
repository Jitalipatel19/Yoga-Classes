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
                    <h1>COURSE VIDEO</h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->

        <!-- Blog Section Start -->
        <div id="blog">
            <div class="container">
                <div class="section-header">
                    <h2>COURSE WISE VIDEO DETAIL</h2>
                    
                </div>
                <div class="row">
                <?php
				$cid=$_REQUEST['cid'];
				$tid=$_REQUEST['tid'];
				$res1=mysql_query("select * from video_detail where course_id='$cid' and trainer_id='$tid'");
				if(mysql_num_rows($res1)>0)
				{
					while($r1=mysql_fetch_array($res1))
					{
				?>
					<div class="col-md-6">
                        <div class="blog-img">
                            <video controls style="width:540px; height:405px;" >
								<source src="<?php echo $r1[5]; ?>">
							</video>
                        </div>
                        <div class="blog-col">
                            <h4><?php echo $r1[2]?></h4>
                            <div class="blog-meta">
                                <p><i class="fa fa-clock-o"></i><?php echo $r1[1]?></p>
                               
                            </div>
                            <p>
                                <?php echo $r1[4]?>
                            </p>
                            <a class="btn" href="<?php echo $r1[4]; ?>" target='_blank'>VIEW DIET CHART IMAGE</a>
                        </div>
                    </div>
                <?php
					}
					
				}else{
					echo "<h2>No Video Uploaded</h2>";
				}
				?>  
               
                  
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

<?php
include("footer.php");
?>
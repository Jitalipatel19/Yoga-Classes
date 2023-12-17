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
                    <h1>Diet Chart Detail</h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->

        <!-- Blog Section Start -->
        <div id="blog">
            <div class="container">
                <div class="section-header">
                    <h2>Diet Chart</h2>
                    
                </div>
                <div class="row">
                <?php
				$res1=mysqli_query($conn,"select * from diet_chart_detail");
				if(mysqli_num_rows($res1)>0)
				{
					while($r1=mysqli_fetch_array($res1))
					{
				?>
					<div class="col-md-6">
                        <div class="blog-img">
                            <img src="<?php echo $r1[4]?>" style="width:540px; height:405px;" />
                        </div>
                        <div class="blog-col">
                            <h4><?php echo $r1[2]?></h4>
                            <div class="blog-meta">
                                <p><i class="fa fa-clock-o"></i><?php echo $r1[1]?></p>
                               
                            </div>
                            <p>
                                <?php echo $r1[3]?>
                            </p>
                            <a class="btn" href="<?php echo $r1[4]; ?>" target='_blank'>VIEW DIET CHART IMAGE</a>
                        </div>
                    </div>
                <?php
					}
				}else{
					echo "<h2>No Diet Chart Uploaded</h2>";
				}
				?>  
               
                  
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

<?php
include("footer.php");
?>
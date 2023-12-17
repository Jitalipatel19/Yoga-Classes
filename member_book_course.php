<?php
session_start();
include("header.php");
include("conn.php");
$cid=$_REQUEST['cid'];

$res1=mysqli_query($conn,"select * from course_master where course_id='$cid'");
$r1=mysqli_fetch_array($res1);
$cname=$r1[1];
$price=$r1[4];



?>
<script type="text/javascript">
	function validation()
	{
		if(form1.seltrainer.value=="0")
		{
			alert("Please Select Trainer");
			form1.seltrainer.focus();
			return false;
		}
		
		if(form1.txthealth.value=="")
		{
			alert("Please Enter Your Health Issues");
			form1.txthealth.focus();
			return false;
		}
		
		if(form1.selage.value=="0")
		{
			alert("Please Select Age");
			form1.selage.focus();
			return false;
		}
	}
</script>
<?php
if(isset($_POST['btnsubmit']))
{
	$trainerid=$_POST['seltrainer'];
	$health=$_POST['txthealth'];
	$age=$_POST['selage'];
	$memberid=$_SESSION['memid'];
	$bdate=date("Y-m-d");
	//auto no code start..
	$qur1=mysqli_query($conn,"select max(booking_id) from booking_master");
	$bid=0;
	while($q1=mysqli_fetch_array($qur1))
	{
		$bid=$q1[0];
	}
	$bid++;
	//auto no code end..
	$query="insert into booking_master values('$bid','$bdate','$memberid','$cid','$trainerid','$health','$age')";
	if(mysqli_query($conn,$query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Course Booked Successfully');";
		echo "window.location.href='member_payment.php?bid=$bid&amt=$price';";
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

              
            </div>
        </div>
        <!-- Header Section End -->
        
        <!-- Contact Section Start -->
        <div id="contact" style="padding-top: 50px;">
            <div class="container">
                <div class="section-header">
                    <h2>BOOK YOUR COURSE</h2>
                    <p>
                       Yoga does not just change the way we see things, it transforms the person who sees.
                    </p>
                </div>
                
                <div class="row">
                    <div class="col-md-6 contact-col">
                        <div class="contact-map">
                           <img src="img/log1.gif" style="height:450px; width:450px;">
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form method="post" name="form1" id="contactForm">
                                 <div class="control-group">
								 <span style='color:#FFFFFF; float:left;'>Course Name</span>
                                    <input type="text" class="form-control" name="txtname" value="<?php echo $cname; ?>"  readonly/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
								<span style='color:#FFFFFF; float:left;'>Select Trainer</span>
                                    <select  class="form-control" name="seltrainer">
										<option value="0">--Select Trainer--</option>
									<?php
									$res1=mysqli_query($conn,"select * from trainer_dietian_regis");
									while($r1=mysqli_fetch_array($res1))
									{
										?>
										<option value="<?php echo $r1[0]; ?>"><?php echo $r1[1]; ?></option>
										<?php
									}
									?>
									</select>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
								<span style='color:#FFFFFF; float:left;'>Enter Health Issues</span>
                                    <textarea class="form-control" name="txthealth" rows="3" placeholder="Enter Health Issues" ></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
								<span style='color:#FFFFFF; float:left;'>Select Age</span>
                                     <select  class="form-control" name="selage">
										<option value="0">--Select Age--</option>
									<?php
									for($i=15;$i<=100;$i++)
									{
										?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
									}
									?>
									</select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="button">
								<button type="submit" name="btnsubmit" onclick="return validation();">SUBMIT</button>
								<br/><br/>
								
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section Start -->
        

<?php
include("footer.php");
?>
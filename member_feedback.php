<?php
session_start();
include("member_header.php");
include("conn.php");
?>
<script type="text/javascript">
	function validation()
	{
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Feedback Description");
			form1.txtdesc.focus();
			return false;
		}
		
		if(form1.seltrainer.value=="0")
		{
			alert("Please Select Trainer");
			form1.seltrainer.focus();
			return false;
		}
	}
</script>
<?php
if(isset($_POST['btnsubmit']))
{
	$desc=$_POST['txtdesc'];
	$trainerid=$_POST['seltrainer'];
	$memid=$_SESSION['memid'];
	$fdate = date("Y-m-d");
	
	//auto no code start..
	$qur1=mysqli_query($conn,"select max(feedback_id) from feedback");
	$fid=0;
	while($q1=mysqli_fetch_array($qur1))
	{
		$fid=$q1[0];
	}
	$fid++;
	//auto no code end..
	$query="insert into feedback values('$fid','$fdate','$desc','$memid','$trainerid')";
	if(mysqli_query($conn,$query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Feedback Submitted Successfully');";
		echo "window.location.href='member_feedback.php';";
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
                    <h1></h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->
        
        <!-- Contact Section Start -->
        <div id="contact" style="padding-top: 50px;">
            <div class="container">
                <div class="section-header">
                    <h2>FEEDBACK</h2>
                    <p>
                       Yoga is a way to freedom. By its constant practice, we can free ourselves from fear, anguish and loneliness
                    </p>
                </div>
                
                <div class="row">
                    <div class="col-md-6 contact-col">
                        <div class="contact-map">
                           <img src="img/feed1.webp" style="width:80%; height:100%;">
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="form1"  id="contactForm" method="post">
                              
								<div class="control-group">
                                    <textarea class="form-control" name="txtdesc" rows="3" placeholder="Enter Feedback Description" ></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <select class="form-control" name="seltrainer" >
											<option value="0">--Select Trainer--</option>
										<?php
										$qur5=mysqli_query($conn,"select * from trainer_dietian_regis");
										while($q5=mysqli_fetch_array($qur5))
										{
											?>
											<option value="<?php echo $q5[0]; ?>"><?php echo $q5[1]; ?></option>
											<?php
										}
										?>
										</select>
										<p class="help-block text-danger"></p>
                                </div>
								
								
                               
                                <div class="button">
								<button type="submit" name="btnsubmit" onclick="return validation();">SUBMIT</button>
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
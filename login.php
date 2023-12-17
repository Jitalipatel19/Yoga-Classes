<?php
session_start();
include("header.php");
include("conn.php");


if(isset($_POST['btncreate']))
{
	header("Location: registration.php");
}

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$res1=mysqli_query($conn,"select * from admin_login where email_id='$email' and pwd='$pwd'");
	if(mysqli_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfull');";
		echo "window.location.href='admin_manage_course.php';";
		echo "</script>";
	}else{
		$res2=mysqli_query($conn,"select * from trainer_dietian_regis where email_id='$email' and pwd='$pwd'");
		if(mysqli_num_rows($res2)>0)
		{
			$r2=mysqli_fetch_array($res2);
			$_SESSION['trainerid']=$r2[0];
			echo "<script type='text/javascript'>";
			echo "alert('Trainer/Dietian Login Successfull');";
			echo "window.location.href='trainer_view_course.php';";
			echo "</script>";
		}else{
			$res3=mysqli_query($conn,"select * from member_regis where email_id='$email' and pwd='$pwd'");
			if(mysqli_num_rows($res3)>0)
			{
				$r3=mysqli_fetch_array($res3);
				$_SESSION['memid']=$r3[0];
				echo "<script type='text/javascript'>";
				echo "alert('Member Login Successfull');";
				echo "window.location.href='member_view_course.php';";
				echo "</script>";
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('Check Your Email ID or Password');";
				echo "window.location.href='login.php';";
				echo "</script>";
			}
		}
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
                    <h1>LOGIN</h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->
        
        <!-- Contact Section Start -->
        <div id="contact" style="padding-top: 50px;">
            <div class="container">
                <div class="section-header">
                    <h2>LOGIN</h2>
                    <p>
                       Yoga does not just change the way we see things, it transforms the person who sees.
                    </p>
                </div>
                
                <div class="row">
                    <div class="col-md-6 contact-col">
                        <div class="contact-map">
                           <img src="img/log1.gif" style="height:350px; width:450px;">
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form method="post" id="contactForm">
                               
                                <div class="control-group">
                                    <input type="text" class="form-control" name="txtemail" placeholder="Enter Email ID"  />
                                    <p class="help-block text-danger"></p>
                                </div>
								 <div class="control-group">
                                    <input type="password" class="form-control" name="txtpwd" placeholder="Enter Password"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                               
                                <div class="button">
								<button type="submit" name="btnlogin">LOGIN</button>
								<br/><br/>
								<h4><a href="trainer_registration.php" style="color:#FFFFFF;">CREATE TRAINER ACCOUNT</a></h4>
								<br/>
								<h4><a href="member_registration.php" style="color:#FFFFFF;">CREATE MEMBER ACCOUNT</a></h4>
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
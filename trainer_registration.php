<?php
include("header.php");
include("conn.php");
?>
<script type="text/javascript">
	function validation()
	{
		var regex=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Your Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Your Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Your City Name");
			form1.txtcity.focus();
			return false;
		}else{
			if(!regex.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in Your City Name");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var regex=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Your Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Your Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!regex.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Your Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		var regex=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Your Email ID");
			form1.txtemail.focus();
			return false;
		}else{
			if(!regex.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Your Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length<6)
		{
			alert("Please Enter More than 6 Character in Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length>10)
		{
			alert("Please Enter Less than 10 Character in Password");
			form1.txtpwd.focus();
			return false;
		}
		
		if(form1.gender[0].checked==false)
		{
			if(form1.gender[1].checked==false)
			{
				alert("Please Select Gender");
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btncreate']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$gender=$_POST['gender'];
	
	$res1=mysqli_query($conn,"select * from trainer_dietian_regis where email_id='$email'");
	if(mysqli_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exists');";
		echo "window.location.href='trainer_registration.php';";
		echo "</script>";
	}else{
		//auto no code start..
		$qur1=mysqli_query($conn,"select max(trainer_id) from trainer_dietian_regis");
		$tid=0;
		while($q1=mysqli_fetch_array($qur1))
		{
			$tid=$q1[0];
		}
		$tid++;
		//auto no code end..
		$query="insert into trainer_dietian_regis values('$tid','$name','$add','$city','$mno','$email','$pwd','$gender')";
		if(mysqli_query($conn,$query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Registration Successfully');";
			echo "window.location.href='login.php';";
			echo "</script>";
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
                    <h1></h1>
                </div>
            </div>
        </div>
        <!-- Header Section End -->
        
        <!-- Contact Section Start -->
        <div id="contact" style="padding-top: 50px;">
            <div class="container">
                <div class="section-header">
                    <h2>TRAINER REGISTRATION</h2>
                    <p>
                       Yoga is a way to freedom. By its constant practice, we can free ourselves from fear, anguish and loneliness
                    </p>
                </div>
                
                <div class="row">
                    <div class="col-md-6 contact-col">
                        <div class="contact-map">
                           <img src="img/regis1.gif" >
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="form1" id="contactForm" method="post">
                               <div class="control-group">
                                    <input type="text" class="form-control" name="txtname" placeholder="Enter Trainer Name"  />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <textarea class="form-control" name="txtadd" rows="3" placeholder="Enter Address" ></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <input type="text" class="form-control" name="txtcity" placeholder="Enter City Name"  />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <input type="text" class="form-control" name="txtmno" placeholder="Enter Mobile No"  />
                                    <p class="help-block text-danger"></p>
                                </div>
								
                                <div class="control-group">
                                    <input type="text" class="form-control" name="txtemail" placeholder="Enter Email ID"  />
                                    <p class="help-block text-danger"></p>
                                </div>
								 <div class="control-group">
                                    <input type="password" class="form-control" name="txtpwd" placeholder="Enter Password"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                                Select Gender: 
								<input type="radio" name="gender" value="MALE"> MALE
								<input type="radio" name="gender" value="FEMALE"> FEMALE
                                <div class="button"><button type="submit" name="btncreate" onclick="return validation();">CREATE AN ACCOUNT</button></div>
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
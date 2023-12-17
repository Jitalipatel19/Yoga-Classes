<?php
include("admin_header.php");
include("conn.php");

?>
<script type="text/javascript">
	function validation()
	{
		var regex=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Course Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in  Course Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Course Description");
			form1.txtdesc.focus();
			return false;
		}
		
		var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txtduration.value=="")
		{
			alert("Please Enter Course Duration");
			form1.txtduration.focus();
			return false;
		}else{
			if(!regex.test(form1.txtduration.value))
			{
				alert("Please Enter Only Characters and Digits in Course Duration");
				form1.txtduration.focus();
				return false;
			}
		}
		
		var regex=/^[0-9]+$/
		if(form1.txtfees.value=="")
		{
			alert("Please Enter Course Fees");
			form1.txtfees.focus();
			return false;
		}else if((parseInt(form1.txtfees.value))<=0)
		{
			alert("Please Enter Course Fees Greater Than 0");
			form1.txtfees.focus();
			return false;
		}
		else{
			if(!regex.test(form1.txtfees.value))
			{
				alert("Please Enter Only Digits in Course Fees");
				form1.txtfees.focus();
				return false;
			}
		}
		
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value=="")
		{
			alert("Please Select Course Banner Image");
			return false;
		}else{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp") ))
			{
				alert("Please Select Course Banner Image in proper format like jpeg, jpg, png or webp");
				return false;
			}
		}
	}
	
	
	function edit_validation()
	{
		var regex=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Course Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in  Course Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Course Description");
			form1.txtdesc.focus();
			return false;
		}
		
		var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txtduration.value=="")
		{
			alert("Please Enter Course Duration");
			form1.txtduration.focus();
			return false;
		}else{
			if(!regex.test(form1.txtduration.value))
			{
				alert("Please Enter Only Characters and Digits in Course Duration");
				form1.txtduration.focus();
				return false;
			}
		}
		
		var regex=/^[0-9]+$/
		if(form1.txtfees.value=="")
		{
			alert("Please Enter Course Fees");
			form1.txtfees.focus();
			return false;
		}else if((parseInt(form1.txtfees.value))<=0)
		{
			alert("Please Enter Course Fees Greater Than 0");
			form1.txtfees.focus();
			return false;
		}
		else{
			if(!regex.test(form1.txtfees.value))
			{
				alert("Please Enter Only Digits in Course Fees");
				form1.txtfees.focus();
				return false;
			}
		}
		
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value!="")
		{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp") ))
			{
				alert("Please Select Course Banner Image in proper format like jpeg, jpg, png or webp");
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$duration=$_POST['txtduration'];
	$fees=$_POST['txtfees'];
	
	//auto no code start..
	$qur1=mysqli_query("select max(course_id) from course_master");
	$cid=0;
	while($q1=mysqli_fetch_array($qur1))
	{
		$cid=$q1[0];
	}
	$cid++;
	//auto no code end..
	
	$tmppath=$_FILES['txtimg']['tmp_name'];
	$imgpath="course_img/CI".$cid."_".rand(1000,9999).".png";
	$query="insert into course_master values('$cid','$name','$desc','$duration','$fees','$imgpath')";
	if(mysqli_query($query))
	{
		move_uploaded_file($tmppath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Course Record Saved Successfull');";
		echo "window.location.href='admin_manage_course.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['ceid']))
{
	$cid1=$_REQUEST['ceid'];
	$qur2=mysqli_query($conn,"select * from course_master where course_id='$cid1'");
	$q2=mysqli_fetch_array($qur2);
	$name1=$q2[1];
	$desc1=$q2[2];
	$dura1=$q2[3];
	$fees1=$q2[4];
	$cimg1=$q2[5];
}

if(isset($_POST['btnedit']))
{
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$duration=$_POST['txtduration'];
	$fees=$_POST['txtfees'];
	
	$cid=$_REQUEST['ceid'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$tmppath=$_FILES['txtimg']['tmp_name'];
		$imgpath="course_img/CI".$cid."_".rand(1000,9999).".png";	
		move_uploaded_file($tmppath,$imgpath);
		$query="update course_master set course_name='$name',description='$desc',duration='$duration',fees='$fees',course_img='$imgpath' where course_id='$cid'";	
	}else{
		$query="update course_master set course_name='$name',description='$desc',duration='$duration',fees='$fees' where course_id='$cid'";	
	}
	
	
	if(mysqli_query($conn,$query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Course Record Updated Successfull');";
		echo "window.location.href='admin_manage_course.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['cdid']))
{
	$cid1=$_REQUEST['cdid'];
	$query="delete from course_master where course_id='$cid1'";
	if(mysqli_query($conn,$query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Course Record Deleted Successfull');";
		echo "window.location.href='admin_manage_course.php';";
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
                    <h2>MANAGE YOGA COURSES</h2>
                  
                </div>
                
                <div class="row">
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                           <form  name="form1" id="contactForm" method="post" enctype="multipart/form-data">
                               <div class="control-group">
                                    <input type="text" class="form-control" name="txtname" placeholder="Enter Course Name"  value="<?php echo $name1[1
								]; ?>"/>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <textarea class="form-control" name="txtdesc" rows="3" placeholder="Enter Course Description" ><?php echo $desc1; ?></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								
								
								
								
                               <br/><br/>
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                          <div class="control-group">
                                    <input type="text" class="form-control" name="txtduration" placeholder="Enter Course Duration" value="<?php echo $dura1; ?>" />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <input type="text" class="form-control" name="txtfees" placeholder="Enter Course Fees"  value="<?php echo $fees1; ?>"/>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <input type="file" class="form-control" name="txtimg" id="txtimg"  />
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
                                <div class="button">
								<?php
								if(isset($_REQUEST['ceid']))
								{
									?>
									<img src='<?php echo $cimg1; ?>' style="width:150px; height:150px;">
									<button type="submit" name="btnedit" onclick="return edit_validation();">EDIT</button>
									<?php
								}else{
									?>
									<button type="submit" name="btnsave" onclick="return validation();">SAVE</button>
									<?php
									
								}
								?>
								
								</div>
                            </form>
                        </div>
                    </div>
					
					<div class="col-md-12 contact-col">
					
                    <?php
					$res4=mysqli_query($conn,"select * from course_master");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>COURSE ID</th>
									<th>COURSE NAME</th>
									<th>DESCRIPTION</th>
									<th>DURATION</th>
									<th>COURSE FEES</th>
									<th>COURSE IMAGE</th>
									<th>EDIT</th>
									<th>DELETE</th>
								</tr>";
						while($r4=mysqli_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							echo "<td>$r4[1]</td>";
							echo "<td>$r4[2]</td>";
							echo "<td>$r4[3]</td>";
							echo "<td>$r4[4]</td>";
							echo "<td><img src='$r4[5]' style='width:150px; height:150px;'></td>";
							echo "<td><a href='admin_manage_course.php?ceid=$r4[0]'>EDIT</a></td>";
							echo "<td><a href='admin_manage_course.php?cdid=$r4[0]'>DELETE</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<h2>No Course Found</h2>";
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
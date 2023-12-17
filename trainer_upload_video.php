<?php
session_start();
include("trainer_header.php");
include("conn.php");

?>
<script type="text/javascript">
	function validation()
	{
		var regex=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Video Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Video Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Video Description");
			form1.txtdesc.focus();
			return false;
		}
				
		var fname=document.getElementById("txtvideo").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtvideo").value=="")
		{
			alert("Please Select Yoga Video");
			return false;
		}else{
			if(!(ext=="mp4"))
			{
				alert("Please Select Yoga Video in proper format like mp4");
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
	$udate = date("Y-m-d");
	$cid=$_REQUEST['cid'];
	$trainerid=$_SESSION['trainerid'];
	//auto no code start..
	$qur1=mysqli_query($conn,"select max(video_id) from video_detail");
	$vid=0;
	while($q1=mysqli_fetch_array($qur1))
	{
		$vid=$q1[0];
	}
	$vid++;
	//auto no code end..
	
	$tmppath=$_FILES['txtvideo']['tmp_name'];
	$vpath="yoga_video/YV".$vid."_".rand(1000,9999).".mp4";
	$query="insert into video_detail values('$vid','$udate','$name','$cid','$desc','$vpath','$trainerid')";
	if(mysqli_query($conn,$query))
	{
		move_uploaded_file($tmppath,$vpath);
		echo "<script type='text/javascript'>";
		echo "alert('Video Record Saved Successfull');";
		echo "window.location.href='trainer_upload_video.php?cid=$cid';";
		echo "</script>";
	}
}


if(isset($_REQUEST['vdid']))
{
	$vid1=$_REQUEST['vdid'];
	$cid=$_REQUEST['cid'];
	$qur2=mysqli_query($conn,"select * from video_detail where video_id='$vid1'");
	$q2=mysqli_fetch_array($qur2);

	$vpath=$q2[5];
	$query="delete from video_detail where video_id='$vid1'";
	if(mysqli_query($conn,$query))
	{
		unlink($vpath);
		echo "<script type='text/javascript'>";
		echo "alert('Video Deleted Successfull');";
		echo "window.location.href='trainer_upload_video.php?cid=$cid';";
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
                    <h2>UPLOAD YOGA VIDEO</h2>
                  
                </div>
                
                <div class="row contact-form">
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                           <form  name="form1" id="contactForm" method="post" enctype="multipart/form-data">
                               <div class="control-group">
                                    <input type="text" class="form-control" name="txtname" placeholder="Enter Video Name"  value="<?php echo $name1; ?>"/>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
                                    <textarea class="form-control" name="txtdesc" rows="3" placeholder="Enter Video Description" ><?php echo $desc1; ?></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								
								
								
								
                             
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                        
								
								<div class="control-group">
								<span style='color:white; float:left;'>Select Yoga Video</span>
                                    <input type="file" class="form-control" name="txtvideo" id="txtvideo"  />
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
					
					
                </div>
				<div class="row">
				<div class="col-md-12 contact-col">
					
                    <?php
					$cid=$_REQUEST['cid'];
					$trainerid=$_SESSION['trainerid'];
					$res4=mysqli_query($conn,"select * from video_detail where course_id='$cid' and trainer_id='$trainerid'");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>VIDEO ID</th>
									<th>UPLOAD DATE</th>
									<th>VIDEO NAME</th>
									<th>COURSE NAME</th>
									<th>VIDEO DESCRIPTION</th>
									
									<th>VIEW VIDEO</th>
									
									<th>DELETE</th>
								</tr>";
						while($r4=mysqli_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							echo "<td>$r4[1]</td>";
							echo "<td>$r4[2]</td>";
							//echo "<td>$r4[3]</td>";
							$res5=mysqli_query($conn,"select * from course_master where course_id='$r4[3]'");
							$r5=mysqli_fetch_array($res5);
							echo "<td>$r5[1]</td>";
							echo "<td>$r4[4]</td>";
							echo "<td><a href='$r4[5]' target='_blank'>VIEW VIDEO</a></td>";
							
							echo "<td><a href='trainer_upload_video.php?cid=$r4[3]&vdid=$r4[0]'>DELETE</a></td>";
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
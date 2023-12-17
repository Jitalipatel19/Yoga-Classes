<?php
session_start();
include("trainer_header.php");
include("conn.php");

?>
<script type="text/javascript">
	function validation()
	{
		var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Diet Chart Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters and Digits in Diet Chart Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Diet Chart Description");
			form1.txtdesc.focus();
			return false;
		}
		
		
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value=="")
		{
			alert("Please Select Diet Chart Image");
			return false;
		}else{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp") ))
			{
				alert("Please Select Diet Chart Image in proper format like jpeg, jpg, png or webp");
				return false;
			}
		}
	}
	
	
	function edit_validation()
	{
		var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Diet Chart Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters and Digits in Diet Chart Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Diet Chart Description");
			form1.txtdesc.focus();
			return false;
		}
		
		
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value!="")
		{
			
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp") ))
			{
				alert("Please Select Diet Chart Image in proper format like jpeg, jpg, png or webp");
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

	$udate=date("Y-m-d");
	$trainerid=$_SESSION['trainerid'];
	
	//auto no code start..
	$qur1=mysqli_query($conn,"select max(diet_chart_id) from diet_chart_detail");
	$dcid=0;
	while($q1=mysqli_fetch_array($qur1))
	{
		$dcid=$q1[0];
	}
	$dcid++;
	//auto no code end..
	
	$tmppath=$_FILES['txtimg']['tmp_name'];
	$imgpath="diet_img/DCI".$dcid."_".rand(1000,9999).".png";
	$query="insert into diet_chart_detail values('$dcid','$udate','$name','$desc','$imgpath','$trainerid')";
	if(mysqli_query($conn,$query))
	{
		move_uploaded_file($tmppath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Diet Chart Record Saved Successfull');";
		echo "window.location.href='trainer_manage_diet_chart.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['edcid']))
{
	$dcid1=$_REQUEST['edcid'];
	$qur2=mysqli_query($conn,"select * from diet_chart_detail where diet_chart_id='$dcid1'");
	$q2=mysqli_fetch_array($qur2);
	
	$name1=$q2[2];
	$desc1=$q2[3];

	$dcimg1=$q2[4];
}

if(isset($_POST['btnedit']))
{
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	
	$dcid=$_REQUEST['edcid'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$tmppath=$_FILES['txtimg']['tmp_name'];
		$imgpath="diet_img/DCI".$dcid."_".rand(1000,9999).".png";	
		move_uploaded_file($tmppath,$imgpath);
		$query="update diet_chart_detail set diet_chart_name='$name',description='$desc',diet_chart_img='$imgpath' where diet_chart_id='$dcid'";	
	}else{
		$query="update diet_chart_detail set diet_chart_name='$name',description='$desc' where diet_chart_id='$dcid'";	
	}
	
	
	if(mysqli_query($conn,$query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Diet Chart Record Updated Successfull');";
		echo "window.location.href='trainer_manage_diet_chart.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ddcid']))
{
	$dcid1=$_REQUEST['ddcid'];
	$qur2=mysqli_query($conn,"select * from diet_chart_detail where diet_chart_id='$dcid1'");
	$q2=mysqli_fetch_array($qur2);
	
	
	$dcimg1=$q2[4];
	$query="delete from diet_chart_detail where diet_chart_id='$dcid1'";
	if(mysqli_query($conn,$query))
	{
		unlink($dcimg1);
		echo "<script type='text/javascript'>";
		echo "alert('Diet Chart Record Deleted Successfull');";
		echo "window.location.href='trainer_manage_diet_chart.php';";
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
                    <h2>MANAGE DIET CHART</h2>
                  
                </div>
                
                <div class="row contact-form">
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                           <form  name="form1" id="contactForm" method="post" enctype="multipart/form-data">
                               <div class="control-group">
								<span style='color:#FFFFFF; float:left;' >Enter Diet Chart Name</span>
                                    <input type="text" class="form-control" name="txtname" placeholder="Enter Diet Chart Name"  value="<?php echo $name1; ?>"/>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="control-group">
								<span style='color:#FFFFFF; float:left;' >Enter Diet Chart Description</span>
                                    <textarea class="form-control" name="txtdesc" rows="3" placeholder="Enter Diet Chart Description" ><?php echo $desc1; ?></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								
                               <br/><br/>
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
								
							
								<div class="control-group">
									<span style='color:#FFFFFF; float:left;' >Select Diet Chart Images</span>
                                    <input type="file" class="form-control" name="txtimg" id="txtimg"  />
                                    <p class="help-block text-danger"></p>
                                </div>
								<br/>
								
                                <div class="button">
								<?php
								if(isset($_REQUEST['edcid']))
								{
									?>
									<img src='<?php echo $dcimg1; ?>' style="width:150px; height:150px;">
									<button type="submit" name="btnedit" onclick="return edit_validation();">EDIT</button>
									<?php
								}else{
									?>
									<button type="submit" name="btnsave" onclick="return validation();">SAVE</button>
									<br/>
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
					$trainerid=$_SESSION['trainerid'];
					$res4=mysqli_query($conn,"select * from diet_chart_detail where trainer_id='$trainerid'");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>CHART ID</th>
									<th>UPLOAD DATE</th>
									<th>DIET CHART NAME</th>
									<th>DESCRIPTION</th>
									
								
									<th>DIET CHART IMAGE</th>
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
							
							echo "<td><a href='$r4[4]' target='_blank'><img src='$r4[4]' style='width:150px; height:150px;'></a></td>";
							echo "<td><a href='trainer_manage_diet_chart.php?edcid=$r4[0]'>EDIT</a></td>";
							echo "<td><a href='trainer_manage_diet_chart.php?ddcid=$r4[0]'>DELETE</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<h2>No Diet Chart Found</h2>";
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
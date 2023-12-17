<?php
include("admin_header.php");
include("conn.php");

?>
<script type="text/javascript">
	function validation()
	{
		var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Event Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters and Digits in Event Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Event Description");
			form1.txtdesc.focus();
			return false;
		}
		
		var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txttimings.value=="")
		{
			alert("Please Enter Event Timings");
			form1.txttimings.focus();
			return false;
		}else{
			if(!regex.test(form1.txttimings.value))
			{
				alert("Please Enter Only Characters and Digits in Event Timings");
				form1.txttimings.focus();
				return false;
			}
		}
		
		var sdate = new Date(form1.txtsdate.value);
		var edate = new Date(form1.txtedate.value);
		if(edate<sdate)
		{
			alert("Please Select Proper End Date");
			return false;
		}
		
		
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value=="")
		{
			alert("Please Select Event Banner Image");
			return false;
		}else{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp") ))
			{
				alert("Please Select Event Banner Image in proper format like jpeg, jpg, png or webp");
				return false;
			}
		}
	}
	
	
	function edit_validation()
	{
			var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Event Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!regex.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters and Digits in Event Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Event Description");
			form1.txtdesc.focus();
			return false;
		}
		
		var regex=/^[a-zA-Z0-9 ]+$/
		if(form1.txttimings.value=="")
		{
			alert("Please Enter Event Timings");
			form1.txttimings.focus();
			return false;
		}else{
			if(!regex.test(form1.txttimings.value))
			{
				alert("Please Enter Only Characters and Digits in Event Timings");
				form1.txttimings.focus();
				return false;
			}
		}
		
		var sdate = new Date(form1.txtsdate.value);
		var edate = new Date(form1.txtedate.value);
		if(edate<sdate)
		{
			alert("Please Select Proper End Date");
			return false;
		}
		
		
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value!="")
		{
			
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp") ))
			{
				alert("Please Select Event Banner Image in proper format like jpeg, jpg, png or webp");
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
	$timings=$_POST['txttimings'];
	$udate=date("Y-m-d");
	$sdate=date("Y-m-d",strtotime($_POST['txtsdate']));
	$edate=date("Y-m-d",strtotime($_POST['txtedate']));
	
	//auto no code start..
	$qur1=mysqli_query("select max(event_id) from event_master");
	$eid=0;
	while($q1=mysqli_fetch_array($qur1))
	{
		$eid=$q1[0];
	}
	$eid++;
	//auto no code end..
	
	$tmppath=$_FILES['txtimg']['tmp_name'];
	$imgpath="event_img/EI".$eid."_".rand(1000,9999).".png";
	$query="insert into event_master values('$eid','$udate','$name','$desc','$sdate','$edate','$timings','$imgpath')";
	if(mysqli_query($query))
	{
		move_uploaded_file($tmppath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Event Record Saved Successfull');";
		echo "window.location.href='admin_manage_events.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['eeid']))
{
	$eid1=$_REQUEST['eeid'];
	$qur2=mysqli_query("select * from event_master where event_id='$eid1'");
	$q2=mysqli_fetch_array($qur2);
	
	$name1=$q2[2];
	$desc1=$q2[3];
	$sdate1=$q2[4];
	$edate1=$q2[5];
	$timings1=$q2[6];
	$eimg1=$q2[7];
}

if(isset($_POST['btnedit']))
{
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$timings=$_POST['txttimings'];
	$udate=date("Y-m-d");
	$sdate=date("Y-m-d",strtotime($_POST['txtsdate']));
	$edate=date("Y-m-d",strtotime($_POST['txtedate']));
	
	$eid=$_REQUEST['eeid'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$tmppath=$_FILES['txtimg']['tmp_name'];
		$imgpath="event_img/EI".$eid."_".rand(1000,9999).".png";	
		move_uploaded_file($tmppath,$imgpath);
		$query="update event_master set event_name='$name',event_description='$desc',event_start_date='$sdate',event_end_date='$edate',event_timings='$timings',event_img='$imgpath' where event_id='$eid'";	
	}else{
		$query="update event_master set event_name='$name',event_description='$desc',event_start_date='$sdate',event_end_date='$edate',event_timings='$timings' where event_id='$eid'";	
	}
	
	
	if(mysqli_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Event Record Updated Successfull');";
		echo "window.location.href='admin_manage_events.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['edid']))
{
	$eid1=$_REQUEST['edid'];
	$query="delete from event_master where event_id='$eid1'";
	if(mysqli_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Event Record Deleted Successfull');";
		echo "window.location.href='admin_manage_events.php';";
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
                    <h2>MEMBER WISE EVENT BOOKING DETAIL REPORT</h2>
                  
                </div>
                
               
                  
				<div class="row">
				<div class="col-md-12 contact-col">
					
                    <?php
					$mid=$_REQUEST['mid'];
					$res4=mysqli_query($conn,"select * from book_event_detail where member_id='$mid'");
					if(mysqli_num_rows($res4)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>BOOK EVENT ID</th>
									
									<th>EVENT NAME</th>
									<th>MEMBER NAME</th>
									<th>TRAINER NAME</th>
									
									
									<th>BOOKING DATE</th>
								</tr>";
						while($r4=mysqli_fetch_array($res4))
						{
							echo "<tr>";
							echo "<td>$r4[0]</td>";
							//echo "<td>$r4[1]</td>";
							$res5=mysqli_query($conn,"select * from event_master where event_id='$r4[1]'");
							$r5=mysqli_fetch_array($res5);
							echo "<td>$r5[2]</td>";
							if($r4[2]=="0")
							{
								echo "<td>-------</td>";
							}else{
								$res6=mysqli_query($conn,"select * from member_regis where member_id='$r4[2]'");
								$r6=mysqli_fetch_array($res6);
								echo "<td>$r6[1]</td>";
							}
							if($r4[3]=="0")
							{
								echo "<td>-------</td>";
							}else{
								$res7=mysqli_query($conn,"select * from trainer_dietian_regis where trainer_id='$r4[3]'");
								$r7=mysqli_fetch_array($res7);
								echo "<td>$r7[1]</td>";
							}
							
							echo "<td>$r4[4]</td>";
							
							
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<h2>No Booking Found</h2>";
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
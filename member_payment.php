<?php
session_start();
include("member_header.php");
include("conn.php");

$bid=$_REQUEST['bid'];
$amt=$_REQUEST['amt'];
?>
<script type="text/javascript">
	function validation()
	{
		if(form1.selcardtype.value=="0")
		{
			alert("Please Select Card Type");
			form1.selcardtype.focus();
			return false;
		}
		
		var v=/^[0-9]+$/;
		if(form1.txtcardno.value=="")
		{
			alert("Please Enter 16 Digit Card No");
			form1.txtcardno.focus();
			return false;
		}else if(form1.txtcardno.value.length!=16){
			alert("Please Enter Your Card No 16 Digit Long");
			form1.txtcardno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcardno.value))
			{
				alert("Please Enter Only Digits in Your Card No");
				form1.txtcardno.focus();
				return false;
			}
		}
	
		if(form1.txtcvvno.value=="")
		{
			alert("Please Enter 3 Digit CVV No");
			form1.txtcvvno.focus();
			return false;
		}else if(form1.txtcvvno.value.length!=3){
			alert("Please Enter Your CVV No 3 Digit Long");
			form1.txtcvvno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcvvno.value))
			{
				alert("Please Enter Only Digits in Your CVV No");
				form1.txtcvvno.focus();
				return false;
			}
		}
	
		var v=/^[a-zA-Z ]+$/
		if(form1.txtbname.value=="")
		{
			alert("Please Enter Bank Name");
			form1.txtbname.focus();
			return false;
		}else{
			if(!v.test(form1.txtbname.value))
			{
				alert("Please Enter Only Alphabets in Bank Name");
				form1.txtbname.focus();
				return false;
			}
		}
		
		
		if(form1.txtname.value=="")
		{
			alert("Please Enter Card Holder Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets in Card Holder Name");
				form1.txtname.focus();
				return false;
			}
		}
	
		
	}
</script>
<?php
if(isset($_POST['btnpay']))
{
	$ctype=$_POST['selcardtype'];
	$cardno=$_POST['txtcardno'];
	$cvvno=$_POST['txtcvvno'];
	$name=$_POST['txtname'];
	$bname=$_POST['txtbname'];
	$exdate=$_POST['selexmonth']."-".$_POST['selexyear'];
	
	

	
	//auto number code start...
	$res2=mysqli_query($conn,"select max(pay_id) from payment");
	$payid=0;
	while($r2=mysqli_fetch_array($res2))
	{
		$payid=$r2[0];
	}
	$payid++;
	
	//auto number code end...
	$pdate=date("Y-m-d");
	$query="insert into payment values('$payid','$pdate','$bid','$ctype','$cardno','$cvvno','$bname','$name','$exdate','$amt')";
	if(mysqli_query($conn,$query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Payment Done Successfully');";
		echo "window.location.href='member_view_booking_detail.php';";
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
                    <h2>PAYMENT</h2>
                   
                </div>
                
                <div class="row">
                    <div class="col-md-6 contact-col">
                        <div class="contact-map">
                           <img src="img/pay1.webp" style="width:450px; height:350px;">
                        </div>
                    </div>
                    <div class="col-md-6 contact-col">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="form1"  id="contactForm" method="post">
                               <div class="control-group">
                                    <select name="selcardtype" class="form-control" >
											<option value="0">--Select Card Type--</option>
											<option value="DEBIT CARD">DEBIT CARD</option>
											<option value="CREDIT CARD">CREDIT CARD</option>
											
										</select>
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								 <div class="form-row">
                                    <div class="control-group col-md-6">
                                         <input type="text" class="form-control" name="txtcardno" placeholder="Enter Card No"  />
										<p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-md-6">
                                         <input type="text" class="form-control" name="txtcvvno" placeholder="Enter CVV No"  />
										<p class="help-block text-danger"></p>
                                    </div>
                                </div>
								 <div class="form-row">
                                    <div class="control-group col-md-6">
                                        <input type="text" class="form-control" name="txtbname" placeholder="Enter Bank Name"  />
										<p class="help-block text-danger"></p></p>
                                    </div>
                                    <div class="control-group col-md-6">
                                        <input type="text" class="form-control" name="txtname" placeholder="Enter CARD HOLDER NAME"  />
										<p class="help-block text-danger"></p>
                                    </div>
                                </div>
								<div class="form-row">
                                    <div class="control-group col-md-6">
										<span style='color:#FFFFFF; float:left;'>Select Expiry Month</span>
                                         <select name="selexmonth" class="form-control">
				  
						<option value="Jan">JAN</option>
						<option value="Feb">FEB</option>
						<option value="Mar">MAR</option>
						<option value="April">April</option>
						<option value="May">MAY</option>
						<option value="June">JUNE</option>
						<option value="July">JULY</option>
						<option value="Aug">AUG</option>
						<option value="Sep">SEP</option>
						<option value="Oct">OCT</option>
						<option value="Nov">NOV</option>
						<option value="Dec">DEC</option>
					</select>
										<p class="help-block text-danger"></p></p>
                                    </div>
                                    <div class="control-group col-md-6">
                                        <span style='color:#FFFFFF; float:left;'>Select Expiry Year</span>
                                          <select name="selexyear" class="form-control">
						
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
						<option value="2029">2029</option>
						<option value="2030">2030</option>
					</select>
										<p class="help-block text-danger"></p>
                                    </div>
                                </div>
								
                                <div class="button">
								<button type="submit" name="btnpay" onclick="return validation();">PAY Rs. <?php echo $amt; ?> /-</button>
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
<?php
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<?php 
echo "<script>
	
if(window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD){
	window.location.replace('../php/dashboard.php');
}
else{
	
}
</script>";
include 'otp_page.inc.php';
//if by mistake after logging in user clicks back button
//otp page will not open again
	include 'errors.php';

	//if (isset($_SESSION['uid'])) {
	//	header('Location: ../php/dashboard.php');
	  //}
			
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/otp_page.css">
	<link rel="stylesheet" href="../css/w3.css">

	<link rel="icon" href="../images/logo.png">


	<!--JQuery link -->
	<script src="../js/jquery.min.js"></script>

	<title>OTP VERIFICATION</title>
</head>

<body>

	<!--College Logo-->
	<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <span class="w3-bar-item w3-left" style="position:relative;left:4.5%;FONT-FAMILY: initial;font-size: 28.5px;"><img src ="../images/logo1.png" width="70px" height="60px"><span class=""><b class="w3-hide-small"> &nbsp;&nbsp;ENGINEERING COLLEGE </b><b class="w3-hide-large w3-hide-medium">&nbsp;&nbsp;EC</b></span></span>
    </div>

	<div class="w3-row" style="position:relative;top:50px;">
		<div class="w3-quarter">
			<p></p>
		</div>
		<div class="w3-panel w3-display-container w3-half w3-pale-yellow w3-bottombar w3-border-yellow w3-border">
			<span onclick="this.parentElement.style.display='none'"
				class="w3-button w3-large w3-display-topright">&times;</span>
			<p><strong>Warning...!</strong> Don't try to refresh this page</p>
		</div>
		<div class="w3-quarter">
			<p></p>
		</div>
	</div>

	<form action="otp_page.php" method="post" enctype="multipart/form-data">
		<div class="w3-card-4 w3-animate-opacity w3-content " style="position:relative;top:50px;">
			<div class="w3-container w3-center w3-xlarge w3-black w3-padding-large">OTP VERIFICATION</div>
			<div class="w3-padding w3-center w3-margin ">
				<?php echo" Please Enter the OTP send to your email address <strong>".$email." </strong> and Mobile Number <strong>".$mobile."</strong>";?>
			</div>
			<div class="w3-container w3-center">
				<input id="otp" type="text" name="otp" class="w3-input otp" id="otp" maxlength="6">
			</div>
			<div id="alert_box" class="w3-padding w3-center w3-margin ">You can click on Resend OTP after <span
					id="count_down" class="w3-text-teal"></span> </div>
			<div class="w3-row w3-padding">
				<a id="change_mobile" class="w3-button w3-hover-none w3-half w3-hover-text-teal" href="#">Send OTP to
					another Mobile Number</a>
				<a id="change_email" class="w3-button w3-hover-none w3-half w3-hover-text-teal" href="#">Send OTP to
					another Email Address</a>
			</div>
			<div class=" w3-row w3-container w3-center w3-padding-24 w3-margin">
				<input id="submit_otp" name="verify" type="submit" class="w3-btn w3-teal content">
				<a id="resend_otp" name="resend" class="w3-btn w3-teal w3-content w3-hide"
					href='../php/otp_page.php'>RESEND OTP</a>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		var timeLeft = 15;
		var count_down = document.getElementById('count_down');
		var resend_otp = document.getElementById('resend_otp');
		var alert_box = document.getElementById('alert_box');
		var timerId = setInterval(countdown, 1000);


		function countdown() {
			if (timeLeft == -1) {
				clearTimeout(timerId);
				resend_otp.className += 'w3-show';
				alert_box.className += 'w3-hide';

			} else {
				count_down.innerHTML = '00.' + timeLeft + ' seconds';
				timeLeft--;
			}
		}

		// slight update to account for browsers not supporting e.which
		function disableF5(e) {
			if ((e.which || e.keyCode) == 116) e.preventDefault();
		};
		// To disable f5
		/* jQuery < 1.7 */
		$(document).bind("keydown", disableF5);
		/* OR jQuery >= 1.7 */
		$(document).on("keydown", disableF5);

		// To re-enable f5
		/* jQuery < 1.7 */
		//$(document).unbind("keydown", disableF5);
		/* OR jQuery >= 1.7 */
		//$(document).off("keydown", disableF5);
	</script>
</body>

</html>
var timeLeft = 30;
var countdown = document.getElementById('countdown');
var resend_otp = document.getElementById('resend_otp');
var timeID = setInterval(count_down,1000);

function count_down()
{
	if (timeLeft == -1) {
		clearTimeout(timeID);
		resend_otp.className += 'w3-show';
	}
	else{
		countdown.innerHTML = timeleft;
		timeleft--;
	}
}
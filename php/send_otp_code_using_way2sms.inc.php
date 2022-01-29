<?php

if(isset($_SERVER['HTTP_REFERER'])){
    if(!stristr($_SERVER['HTTP_REFERER'],".php")){
        header("Location: 403-forbidden-error.php");
    }
    else{
        //echo "Good";
    }
}
else{
    header("Location: 403-forbidden-error.php");
    echo "Not Supported";
}

//post

//7021944679  API key:- J68QTG2DUO9W50ZIE5U2JUKFV27CKOCB Secret key:- 8HXF3TIL4G1IE0NN
$url="http://www.way2sms.com/api/v1/sendCampaign";
$message = urlencode($otp_msg);// urlencode your message
$senderid = "TXTLCL";
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=J68QTG2DUO9W50ZIE5U2JUKFV27CKOCB&secret=8HXF3TIL4G1IE0NN&usetype=stage&phone=$mobile&senderid=$senderid&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
if ($result == "true") {
	//header("Location: ../php/otp_page.php?otp_send_successfully");
	echo "otp_send_successfully";
}
else{
	//header("Location: ../php/otp_page.php?error=otp_not_send");
	echo "otp_not_send";
}
curl_close($curl);
echo $result;


//9757169996 API key:- FSSHKOE49T76LWT3T7DBAJP2YI77OBYS Secret key:- 3EC5W9T2AZMAPJ86
/*$url="http://www.way2sms.com/api/v1/sendCampaign";
$message = urlencode("message-text");// urlencode your message
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=[povided-api-key]&secret=[provided-secret-key]&usetype=[stage or prod]&phone=[to-mobile]&senderid=[active-sender-id]&message=[$message]");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;*/
?>
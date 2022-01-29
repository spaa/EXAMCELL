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

//9757169996
$field = array(
    "sender_id" => "FSTSMS",
    "language" => "english",
    "route" => "qt",
    "numbers" => $mobile,
    "message" => #"9036",
    "variables" => "{#BB#}",
    "variables_values" => $otp_no
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: eAkEBxYutojKqRm4fn0h2Q83MIvXHTJywGV1gDa6CPrOz9ZLsl1VIWursw6HShz4NCUGMZoOj2yX7Le8",
    "cache-control: no-cache",
    "accept: */*",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

//7021944679
/*  
  $field = array(
    "sender_id" => "FSTSMS",
    "language" => "english",
    "route" => "qt",
    "numbers" => $mobile,
    "message" => "9040",
    "variables" => "{#BB#}",
    "variables_values" => $otp_no
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: UpjAk96TFGeIh1oRnuL4KqMylvBg3QZPJ2SV5NXHwtYfdD0am8JewUZ795MKYqEF6WCmQszASpHkg0NI",
    "cache-control: no-cache",        */
//    "accept: */*",
/*    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;

}*/

?>
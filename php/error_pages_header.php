<?php
//this contains the details that will be common every where
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="../css/w3.css">
<link rel="icon" href="../images/logo.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--JQuery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<style>
  html,
  body,
  h1,
  h2,
  h3,
  h4,
  h5 {
    font-family: "Raleway", sans-serif
  }
</style>

<body class="w3-white">

  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i
        class="fa fa-bars"></i> Menu</button>
    <span class="w3-bar-item w3-left" style="position:relative;left:3.5%;"><img src="../images/logo.png" width="70px"
        height="60px"><span class="" style="font-size:30px;"><b class="w3-hide-small w3-hide-medium"> &nbsp;&nbsp;MAHATMA GANDHI
          MISSION'S COLLEGE OF ENGINEERING AND TECHNOLOGY </b><b class="w3-hide-large">&nbsp;&nbsp;MGM
          CET</b></span></span>
  </div>

  <div class="w3-main" style="margin-left:30px;margin-top:43px;">
    <br><br>

    <!-- Back button to go back to previous page -->

    <button id="back_button" class="w3-btn w3-margin-left w3-large w3-padding"
      onclick="window.history.back()">BACK</button>
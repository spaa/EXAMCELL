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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
<!--JQuery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<style>
    /*======================
    404 page
=======================*/


    .page_404 {
        /*padding: 40px 0;*/
        background: #fff;
        font-family: 'Arvo', serif;
    }

    .page_404 img {
        width: 100%;
    }

    .four_zero_four_bg {

        background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        height: 400px;
        background-position: center;
    }


    .four_zero_four_bg h1 {
        font-size: 80px;
    }

    .four_zero_four_bg h3 {
        font-size: 80px;
    }

    .link_404 {
        color: #fff !important;
        padding: 10px 20px;
        background: #39ac31;
        margin: 20px 0;
        display: inline-block;
    }

    .contant_box_404 {
        margin-top: -50px;
    }
</style>

<body class="w3-white">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4;">
        <span class="w3-bar-item w3-left" style="position:relative;left:3.5%;"><img src="../images/logo.png"
                width="70px" height="60px"><span class="" style="font-size:30px;font-family: 'Raleway', sans-serif;"><b
                    class="w3-hide-small w3-hide-medium"> &nbsp;&nbsp;MAHATMA GANDHI
                    MISSION'S COLLEGE OF ENGINEERING AND TECHNOLOGY </b><b class="w3-hide-large">&nbsp;&nbsp;MGM
                    CET</b></span></span>
    </div>

    <div class="w3-main" style="margin-left:30px;margin-top:43px;">
        <br><br>

        <!-- Back button to go back to previous page -->

        <button id="back_button" class="w3-btn w3-margin-left w3-large w3-padding w3-green"
            onclick="window.history.back()">BACK</button>

        <section class="page_404">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-sm-10 col-sm-offset-1  text-center">
                            <div class="four_zero_four_bg">
                                <h1 class="text-center ">404</h1>


                            </div>

                            <div class="contant_box_404">
                                <h3 class="h2">
                                    Look like you're lost
                                </h3>

                                <p><b id="link" class="w3-text-red"></b> the page you are looking for not avaible!</p>

                                <a href="login.php" class="link_404">Go to Login Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<script>
    document.getElementById("link").innerHTML = window.location.pathname;
</script>
</html>
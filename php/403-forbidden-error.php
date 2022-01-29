<?php
include 'error_pages_header.php';
?>
<title>403 - Forbidden</title>
<body>
<div >
    <img class="error_gif" src="../images/403_error.gif" alt="page not found">
</div>
<script>
    var back_button = document.getElementById("back_button");
    back_button.style.backgroundColor = "#f2466c";
    back_button.style.color = "#f2bc46";
</script>
</body>
    <style>
        .error_gif {
            display: block;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  top: -100px;
  z-index: -10;
        }
    </style>

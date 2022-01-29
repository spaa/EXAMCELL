<?php
include 'error_pages_header.php';
?>
<title>404 - Page Not Found</title>
<body>
<div >
    <img class="error_gif" src="../images/404-page_not_found.gif" alt="page not found">
</div>
<script>
    var back_button = document.getElementById("back_button");
    back_button.style.backgroundColor = "#548245";
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
function check(sem,branch) {
  var x = document.getElementById(sem);
  var y = document.getElementById(branch);
  if (x.value<2) {
    if (y.className.indexOf("w3-disabled") == -1) {
      y.className += " w3-disabled";
    } 
  }
  else { 
    if (y.className.indexOf("w3-disabled") == 1) {
      y.className = x.className.replace(" w3-show", "");
    } 
  }
}
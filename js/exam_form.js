function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace("w3-black", "w3-teal");
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace("w3-teal", "w3-black");
  }
}

//Previous Container Hiding
function hide_show(id1,id2){
  var x = document.getElementById(id1);
  var y = document.getElementById(id2);
  var r = confirm('Is all data entered correct');
  if(r == true)
  {   
    if (y.className.indexOf("w3-show") == -1) 
    {
      y.className += " w3-show";
      y.previousElementSibling.className = 
      y.previousElementSibling.className.replace("w3-black", "w3-teal");
      x.className = x.className.replace(" w3-show", "");
      x.previousElementSibling.className = 
      x.previousElementSibling.className.replace("w3-teal", "w3-black");
    } else { 
      y.className = x.className.replace(" w3-show", "");
      y.previousElementSibling.className = 
      y.previousElementSibling.className.replace("w3-teal", "w3-black");
      
    }
  }
}

//Capatilize each character
function capatilize(id){
  var ch = document.getElementById(id);
  //var ch = document.getElementByClassNames(id);
  ch.value = ch.value.toUpperCase();
}

//Uploading photo and Signature
$(document).ready(function() {

  //photo
  $("#photo_img").click(function () {
  $("#photo").trigger('click');
  });

  $("#photo_change").click(function () {
  $("#photo").trigger('click');
  });

  //signature
  $("#signature_img").click(function () {
  $("#signature").trigger('click');
  });

  $("#signature_change").click(function () {
  $("#signature").trigger('click');
  });

  //12.final accept signature 

  $("#accept_signature_upload").click(function () {
  $("#accept_signature").trigger('click');
  });

});

//photo
function preview_photo(input) {
  if (input.files && input.files[0]) {
    var freader = new FileReader();
      freader.onload = function (e) {
        $("#photo_img").show();
        $('#photo_img').attr('src', e.target.result);
        $('#photo_img').attr('height', "100%");
        $('#photo_img').attr('width', "100%");
    }
      freader.readAsDataURL(input.files[0]);
  }
}
    
$("#photo").change(function(){
  preview_photo(this);
});

//signature
function preview_signature(input) {
  if (input.files && input.files[0]) {
    var freader = new FileReader();
      freader.onload = function (e) {
        $("#signature_img").show();
        $('#signature_img').attr('src', e.target.result);
        $('#signature_img').attr('height', "100%");
        $('#signature_img').attr('width', "100%");
    }
      freader.readAsDataURL(input.files[0]);
  }
}
    
$("#signature").change(function(){
  preview_signature(this);
});

//12.final accept signature 
function preview_accept_signature(input) {
  if (input.files && input.files[0]) {
    var freader = new FileReader();
      freader.onload = function (e) {
        $("#accept_signature_img").show();
        $('#accept_signature_img').attr('src', e.target.result);
        $('#accept_signature_img').attr('height', "100%");
        $('#accept_signature_img').attr('width', "100%");
    }
      freader.readAsDataURL(input.files[0]);
  }
}

$("#accept_signature").change(function(){
  preview_accept_signature(this);
});



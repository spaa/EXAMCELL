$('#dob').dateDropper({
	format: 'd-m-Y',
	largeDefault: true,
	maxYear: 2005,
  	minYear: 1950,
  	largeDefault: true
});

$('#joining_date').dateDropper({
	format: 'd-m-Y',
	largeDefault: true,
  	minYear: 1950,
  	largeDefault: true
});

//Capatilize each character
function capatilize(id){
  var ch = document.getElementById(id);
  //var ch = document.getElementByClassNames(id);
  ch.value = ch.value.toUpperCase();
}




$('#baju').on('change', function () {
      if ( this.value == '1')
      {
        $("#kurung").show();
        $("#moden").hide();
        $("#kebaya").hide();
      }
      else if (this.value == '2')
      {
        $("#kurung").hide();
        $("#moden").show();
        $("#kebaya").hide();
      }
      else if {
      	$("#kurung").hide();
        $("#moden").hide();
        $("#kebaya").show();
     
      }
    });
});

/*
$("#baju").change(function() {
  if ($(this).val() == "1") {
    $('#kurung').show();
    $('#kurungField').attr('required', '');
    $('#kurungField').attr('data-error', 'This field is required.');
	
		
  } else if ($(this).val() == "2"){
    $('#moden').show();
    $('#modenField').attr('required', '');
    $('#modenField').attr('data-error', 'This field is required.');
	
		
  } else {
    $('#kebaya').show();
    $('#kebayaField').attr('required', '');
    $('#kebayaField').attr('data-error', 'This field is required.');
	
	
});
$("#baju").trigger("change");

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<style type="text/css">
 
#div1,#div2,#div3 {
display: none
}
 
</style>
<script type="text/javascript">
 
function showHide(elem) {
    if(elem.selectedIndex != 0) {
         //hide the divs
         for(var i=0; i < divsO.length; i++) {
             divsO[i].style.display = 'none';
        }
        //unhide the selected div
        document.getElementById('div'+elem.value).style.display = 'block';
    }
}
 
window.onload=function() {
    //get the divs to show/hide
    divsO = document.getElementById("frmMyform").getElementsByTagName('div');
}
</script>
</head>
<body>
 
<form action="#" method="post" id="frmMyform">
 
 <select name="selMyList" onchange="showHide(this)">
        <option value="">Select an option</option>
        <option value="1">Show div 1</option>
        <option value="2">Show div 2</option>
        <option value="3">Show div 3</option>
 </select>
 
 <div id="div1">This is Div 1</div>
 <div id="div2">This is Div 2</div>
 <div id="div3">This is Div 3</div>
 
</form>
 
</body>
</html>
**/
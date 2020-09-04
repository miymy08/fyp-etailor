<!DOCTYPE HTML>
<html lang='en'>	<head profile="http://www.w3.org/2005/10/profile">
	<link rel='shortcut icon' href='//www.easycalculation.com/favicon.ico' type='image/x-icon' />

	<title>Body Shape Calculator | Female Body Type Calculator </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0"> 
	<meta name="keywords" content="Body Shape Calculator" /> 
	<meta name="description" content="Body shape is one of the aspect used to describe a person's outlook or skeletal structure. Females has different body shapes (figure)." />
 		<script type='text/javascript' src="//www.easycalculation.com/jquery.js"> </script>
		<script language=javascript src="//www.easycalculation.com/numeric.js"></script>
		<script language=javascript src="//www.easycalculation.com/common.js"></script>
		<style>
.bodyShape { max-width:578px; text-align:center; color:#fff; font:bold 14px/45px Arial, Helvetica, sans-serif; }
.bodyShape div { float:left; width:125px; }
.bodyShape div:nth-child(1) img {  }
.bodyShape div:nth-child(2) img { }
.bodyShape div:nth-child(3) img { }
.bodyShape div:nth-child(4) img {}
.bodyShape div:nth-child(5) img {}
@media screen and (max-width: 650px) 
{
.bodyShape div { float:left; width:60px; }
.bodyShape { font:normal 8px/20px Arial, Helvetica, sans-serif; }
.bodyShape {  width:64%;height:150px; opacity:100;filter:alpha(opacity=40); }
</style>

<script>
$( document ).ready(function() {
$('#bVal').val('12');
$('#wVal').val('10');
$('#hVal').val('12');
calculate();
});

function calculate()
{    
    bVal=$('#bVal').val();
    wVal=$('#wVal').val();
    hVal=$('#hVal').val();
    
for(var c=1;c<=8;c++)
{
	$('#s'+c).css('opacity',100);
}

    if((parseFloat(bVal)<parseFloat(wVal))&&(parseFloat(wVal)<parseFloat(hVal))){
cont=1;
    }
    else if((parseFloat(bVal)==parseFloat(wVal))&&(parseFloat(wVal)==parseFloat(hVal))&&(parseFloat(bVal)==parseFloat(hVal))){        
cont=2;
    }    
    else if((parseFloat(bVal)>parseFloat(wVal))&&(parseFloat(bVal)>parseFloat(hVal))){
cont=3;
    }
    else if((parseFloat(wVal)<parseFloat(bVal))&&(parseFloat(wVal)<parseFloat(hVal))&&((parseFloat(bVal)+2)>parseFloat(hVal))){ 
        if((parseFloat(bVal)==(parseFloat(wVal)+1))&&(parseFloat(hVal)==(parseFloat(wVal)+1))){ 
   cont=4;
        }
        else if((parseFloat(bVal)==(parseFloat(wVal)+2))&&(parseFloat(hVal)==(parseFloat(wVal)+2))){    
cont=5;
        }
        else{
cont=6;
        }
    }
    else if((parseFloat(wVal)<parseFloat(bVal))&&(parseFloat(wVal)<parseFloat(hVal))&&(parseFloat(bVal)<parseFloat(hVal))){
        if((parseFloat(wVal)+2)>parseFloat(bVal)){
cont=7;
        }
        else{
cont=8;
        }
    }
    else if((parseFloat(bVal)==parseFloat(wVal))&&(parseFloat(wVal)<parseFloat(hVal))&&(parseFloat(bVal)<parseFloat(hVal))){
cont=7;
    }
    else{
        var shpVal='Not matched';
cont=9;
    }
    $('#resVal').val(shpVal);

for(var c=1;c<=9;c++)
{
    if(c!=cont)
    {
    $('#s'+c).css('opacity',0.15);  
    }
if(cont==9)
{
alert('Not Matched')
}
}

}

function rst()
{
for(var c=1;c<=8;c++)
{
	$('#s'+c).css('opacity',0.15);
}
$('#name').hide();
$('#sImage').html('');
}
 </script>
<link href="//www.easycalculation.com/css/style.css" rel="stylesheet" type="text/css">
			<link href="//www.easycalculation.com/css/embedded.css" rel="stylesheet" type="text/css">
			<div class="ec_calculator_gen clearfix" style="position:relative; margin:0px !important;">
			    <div class="ec_frame_logo"><a href="https://www.easycalculation.com" target="_blank"><img src="//www.easycalculation.com/images/logo-iframe.png" width="236" height="23" alt="ec frame logo"></a></div>
			    <form name=first><div id="dispCalcConts">
				<h2 style="text-align:left">Body Shape Calculator</h2><div class='group clearfix' id=ss>
<span><b>Measurements in &nbsp;&nbsp;</b></span>
<span><input type='radio' id='in' name='time' checked value='0'>Inches &nbsp;&nbsp;</span>
<span><input type='radio' id='cm' name='time' value='1'>Centimetre</span>
</div>

<div class='group clearfix'>
<label>Enter the Bust Size</label>
<span class='width_100'><input id=bVal type='text'>
</span> <span class='units' id='bUnit'></span>
</div>

<div class='group clearfix'>
<label>Enter Waist Size</label>
<span class='width_100'><input id=wVal type='text'>
</span> <span class='units' id='wUnit'></span>
</div>

<div class='group clearfix'>
<label>Enter the Hip Size</label>
<span class='width_100'><input id=hVal type='text'>
</span> <span class='units' id='hUnit'></span>
</div>

<div class='group clearfix' align='center' style='font-size:17px;color:#B82E00;'> 
<input type=button value='Calculate' onclick=calculate()><input type=reset value=Reset onclick=rst()>
</div>
 <div id='sImage' align='center'></div>

<center><div class='bodyShape clearfix'>
    <div id='s1'><img alt=Diamond Body Shape src=images/diamond.png></div>
    <div id='s2'><img alt=Oval Body Shape src=images/oval.png></div>
    <div id='s3'><img alt=Inverted Triangle Shape src=images/inverted-triangle.png></div>
    <div id='s4'><img alt=Straight Body Shape src=images/straight.png></div>
    <div id='s5'><img alt=Hourglass Shape src=images/hourglass.png></div>
    <div id='s6'><img alt=Top Hourglass Shape src=images/top-hourglass.png></div>
    <div id='s7'><img alt=Pear Body Shape src=images/pear.png></div>
    <div id='s8'><img alt=Spoon Body Shape src=images/spoon.png></div>
</div></center>
</div> </form><script type="text/javascript">onkeyupValidationClass();</script>			
			</div>			    <script type="text/javascript">
				function alert(val)
				{
				    $("#dynErrDisp").show();
				    $("#dynErrDisp").html(val);
				}
			    </script>
<!doctype html>
<?php
    $servername = "localhost";
    $username = "workshe3_test";
    $password = "Cats8000";
    $dbname = "workshe3_test";
	
    $conn = new mysqli($servername,$username,$password,$dbname);
	$Name = $_GET['id'];
?>
<html>
<head>
<meta charset="utf-8">
<title> <?php echo "$Name's"?> Schedule</title>
<link rel="stylesheet" href="TutorCSS.css?<?php date('l jS \of F Y h:i:s A');?>">
</head>
<body onLoad="GetCurrentDate();">

<!--Days-->
<div class="Wrapper">
 <div class="Flex SpaceEven Center">
 	
 	 <div class="Days" onclick="OnClick(1);" id="1">
 		<p class="FontSize">S</p>
     </div>
 	
     <div class="Days" onclick="OnClick(2);" id="2">
 		<p class="FontSize">M</p>
     </div>
     
     <div class="Days" onclick="OnClick(3);" id="3">
 		<p class="FontSize">T</p>
     </div>
     
     <div class="Days" onclick="OnClick(4);" id="4">
 		<p class="FontSize">W</p>
     </div>
     
     <div class="Days" onclick="OnClick(5);" id="5">
 		<p class="FontSize">T</p>
     </div>
     
     <div class="Days" onclick="OnClick(6);" id="6">
 		<p class="FontSize">F</p>
     </div>
     
     <div class="Days" onclick="OnClick(7);" id="7">
 		<p class="FontSize">S</p>
     </div>
     
 </div>
	<div>
	 	<h3 id="Day"></h3>
	 </div>
</div>
	
<div class="Wrapper">
 <div class="TimeSlot">
	
	<p>Time Schedule Goes Here</p>
		
 </div>
</div>

<script>

	function OnClick(id){
		
		for(var i = 1; i < 8; i++){
			document.getElementById(i).style = "background-color: background-color: rgba(227,227,227,1.00);;";
		}
		
		document.getElementById(id).style = "background-color: rgba(204,204,204,1.00);";
		
		var Day = null;
		switch(id){
			case 1:
				Day = "Sunday";
				break;
				
			case 2:
				Day = "Monday";
				break;
				
			case 3:
				Day = "Tuesday";
				break;
				
			case 4:
				Day = "Wednesday";
				break;
				
			case 5:
				Day = "Thursday";
				break;
				
			case 6:
				Day = "Friday";
				break;
				
			case 7: 
				Day = "Saturday";
				break;
		}

		document.getElementById("Day").innerHTML = Day;
	}
	
	function GetCurrentDate(){
		var weekdays = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
		var date = new Date();
		var CurrentDay = weekdays[date.getDay()];
		
		document.getElementById(date.getDay()+1).style = "background-color: rgba(204,204,204,1.00);";
		document.getElementById("Day").innerHTML = CurrentDay;
	}
	
</script>
</body>
</html>
<!doctype html>
<?php
    $servername = "localhost";
    $username = "workshe3_test";
    $password = "Cats8000";
    $dbname = "workshe3_test";
	
    $conn = new mysqli($servername,$username,$password,$dbname);
	$ID = $_GET['id'];

	$sql = "SELECT * From Tutors WHERE ID = '$ID'";
	$res = $conn->query($sql);
    $Day = $_GET['day']-1;
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> <?php echo $row['FirstName'] . $row['LastName']?> Schedule</title>
<link rel="stylesheet" type="text/css" href="TutorCSS.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
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
    
    <div class="TimeBar">
        <?php
        
        //Echos out the times of day and color codes for avalibility
			
        	$row = $res->fetch_assoc();
			$TimesString = $row['Times'];
            $DaysArray = explode('|', $TimesString);
			$TimesArray = explode(';', $DaysArray[$Day]);
		
			foreach($TimesArray as $Time){
				
				$Times = explode(':', $Time);
				
				
				if($Times[1] == 'A'){
					echo "<div class='TimeHolder tooltip'><div>$Times[0]</div><div class='ColorSlot' style='background-color: greenyellow;' onclick='ChangePage($Times[0]);'></div><span class='tooltiptext tooltip-bottom'>Available</span></div>";
                    }
				else if ($Times[1] == 'NA'){
					echo "<div class='TimeHolder tooltip'><div>$Times[0]</div><div class='ColorSlot' style='background-color: darkred;' onclick=''> </div><span class='tooltiptext tooltip-bottom'>Not Available</span></div>";
				}
				else if ($Times[1] == 'TK'){
					echo "<div class='TimeHolder tooltip'><div>$Times[0]</div><div class='ColorSlot' style='background-color: goldenrod;' onclick=''> </div><span class='tooltiptext tooltip-bottom'>Already Booked</span></div>";
				}
				else{
					echo "<div class='TimeHolder'><div>Error Fetching Schedule</div><div class='ColorSlot' style='background-color: orange;'></div></div>";
				}
			}
        ?>
    </div>
 </div>
	
	<div class="KeyDiv"><div style="background-color: greenyellow;" class='Key tooltip'>Available</div><div style="background-color: goldenrod;" class='Key tooltip'>Already Booked</div><div style="background-color: darkred;" class='Key tooltip'>Not Available</div></div>
    
    
    <div class="InfoForm Flex">
        <form>
        1
            <input type='text' placeholder="Notes" required>
        </form>
            <h3 id = 'Name'></h3>
            <h3 id = 'Subject'></h3>
            <h3 id = 'Time'></h3>
    </div>
	
</div>

<script>

    var weekdays = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

	function OnClick(id){
		
		for(var i = 1; i < 8; i++){
			document.getElementById(i).style = "background-color:rgba(227,227,227,1.00);";
		}
		
		document.getElementById(id).style = "background-color: rgba(204,204,204,1.00);";
		
       
		var Day = weekdays[id-1];
		

		document.getElementById("Day").innerHTML = Day;
        window.location = "Schedule.php?id=<?php echo $ID;?>&day=" + id;
	}
	
	function GetCurrentDate(){
        if('<?php echo $_GET['day'];?>' == ''){
        
		    var date = new Date();
		    var CurrentDay = weekdays[date.getDay()];
		
		    document.getElementById(date.getDay()+1).style = "background-color: rgba(204,204,204,1.00);";
		    document.getElementById("Day").innerHTML = CurrentDay;
            window.location = "Schedule.php?id=<?php echo $ID;?>&day=" + (date.getDay()+1);
            ChangeFormInfo();
        }
        else {
        
            document.getElementById(<?php echo $_GET['day'];?>).style = "background-color: rgba(204,204,204,1.00);";
		    document.getElementById("Day").innerHTML = weekdays[<?php echo $_GET['day'];?>-1];
            ChangeFormInfo();
        }
	}
    
    function ChangePage(TimeID){
        var id = '<?php echo $ID;?>';
        
        ChangeFormInfo(TimeID);
    }
	
    
    function ChangeFormInfo(Time = 0){
        var Name = '<?php echo $row['FirstName'] . $row['LastName'];?>';
        var Subject = '<?php echo $row['Subject']?>';
        
        document.getElementById("Name").innerHTML = Name;
        document.getElementById("Subject").innerHTML = Subject;
        document.getElementById("Time").innerHTML = Time;
        
    }
    
</script>
</body>
</html>
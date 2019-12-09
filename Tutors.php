<!doctype html>
<?php
    $servername = "localhost";
    $username = "workshe3_test";
    $password = "Cats8000";
    $dbname = "workshe3_test";
	
    $conn = new mysqli($servername,$username,$password,$dbname);
    
    $sql = "SELECT * FROM Tutors ORDER BY Subject ASC";
    $res = $conn->query($sql);
    
    
   /*$sql = "INSERT INTO Tutors (FirstName, LastName, Subject, Days, Times, Who) VALUES ('Connor', 'Baxter', 'Programming', 'Monday', '1:A;2:A;3:NA;4:A;5:TK;6:A;7:A;8:A;9:A;10:NA;11:NA;12:TK;13:TK;14:TK;15:NA;16:A;17:A;18:A;19:A;20:A;21:A;22:A;23:A;24:NA|1:NA;2:NA;3:NA;4:A;5:TK;6:A;7:A;8:TK;9:A;10:NA;11:NA;12:TK;13:TK;14:TK;15:NA;16:TK;17:NA;18:NA;19:A;20:A;21:TK;22:TK;23:A;24:NA|1:A;2:A;3:NA;4:A;5:TK;6:A;7:A;8:A;9:A;10:NA;11:NA;12:TK;13:TK;14:TK;15:NA;16:A;17:A;18:A;19:A;20:A;21:A;22:A;23:A;24:NA|1:NA;2:NA;3:NA;4:A;5:TK;6:A;7:A;8:TK;9:A;10:NA;11:NA;12:TK;13:TK;14:TK;15:NA;16:TK;17:NA;18:NA;19:A;20:A;21:TK;22:TK;23:A;24:NA|1:A;2:A;3:NA;4:A;5:TK;6:A;7:A;8:A;9:A;10:NA;11:NA;12:TK;13:TK;14:TK;15:NA;16:A;17:A;18:A;19:A;20:A;21:A;22:A;23:A;24:NA|1:NA;2:NA;3:NA;4:A;5:TK;6:A;7:A;8:TK;9:A;10:NA;11:NA;12:TK;13:TK;14:TK;15:NA;16:TK;17:NA;18:NA;19:A;20:A;21:TK;22:TK;23:A;24:NA|1:NA;2:NA;3:NA;4:A;5:TK;6:A;7:A;8:TK;9:A;10:NA;11:NA;12:TK;13:TK;14:TK;15:NA;16:TK;17:NA;18:NA;19:A;20:A;21:TK;22:TK;23:A;24:NA', 'Madison')";
   $conn->query($sql);*/

?>


<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Available Tutors</title>
<link rel="stylesheet" href="TutorCSS.css?<?php date('l jS \of F Y h:i:s A');?>" />
</head>

<body>

<div class="Flex Center">

 <div style="text-align: center">
  <h1 class="Text" style="border-bottom: 3px solid black; padding:0px 25px;">Tutors</h1><br>

  
  <?php 
  echo "<table>";
     while($TutorList = $res->fetch_assoc()){
        $FName = $TutorList['FirstName'];
        $LName = $TutorList['LastName'];
        
        $OldSubject = $Subject;
        $Subject = $TutorList['Subject'];
		$ID = $TutorList['ID'];
        
        
        if($Subject == $OldSubject){
            echo "<tr><td>$FName $LName</td> <td><a href='Schedule.php?id=$ID' class='Link'>View Schedule</a></td></tr>";
        }
        else {
            echo "</table>";
            echo "<h3 class='Text'><b>$Subject</b></h3><br>";
            
            echo "<table>";
            echo "<tr><td>$FName $LName</td> <td><a href='Schedule.php?id=$ID' class='Link'>View Schedule</a></td></tr>";
        }
     }
     echo "</table>";
     
     $conn->close();
  ?> 
 </div>
 
 




</div>

</body>
</html>
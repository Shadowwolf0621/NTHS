<!doctype html>
<?php
    $servername = "localhost";
    $username = "workshe3_test";
    $password = "Cats8000";
    $dbname = "workshe3_test";
	
    $conn = new mysqli($servername,$username,$password,$dbname);
    
    $sql = "SELECT * FROM Tutors ORDER BY Subject ASC";
    $res = $conn->query($sql);
    
  /*  
    $sql = "INSERT INTO Tutors (FirstName, LastName, Subject, Days, Times, Who) VALUES ('Connor', 'Baxter', 'Math', 'Monday', '11-5', 'Madison')";
     $conn->query($sql);*/

?>


<html>
<head>
<meta charset="utf-8">
<title>Available Tutors</title>
<link rel="stylesheet" href="TutorCSS.css?<?php date('l jS \of F Y h:i:s A');?>">
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
        
        
        if($Subject == $OldSubject){
            echo "<tr><td>$FName $LName</td> <td><a href='Schedule.php?id=$FName $LName' class='Link'>View Schedule</a></td></tr>";
        }
        else {
            echo "</table>";
            echo "<h3 class='Text'><b>$Subject</b></h3><br>";
            
            echo "<table>";
            echo "<tr><td>$FName $LName</td> <td><a href='Schedule.php?id=$FName $LName' class='Link'>View Schedule</a></td></tr>";
        }
     }
     echo "</table>";
     
     $conn->close();
  ?> 
 </div>
 
 




</div>

</body>
</html>
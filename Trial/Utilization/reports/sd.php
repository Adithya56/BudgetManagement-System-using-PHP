<html>
<body>
<table cellpadding='8' align='center' border='1'>
<tr>
    <th>Date</th>
    <th>Participation in Seminars</th>
    <th>Participation in Seminars</th>
    <th>Guest Lectures</th>
    <th>Total</th>
    <th>Description</th>
</tr>    
<?php
$host="localhost";
$username="root";
$password="";
$dbname="miniproject";
$conn=mysqli_connect($host,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql="select date,seminars,industry,guest,total,disc from student1";
  $result=$conn->query($sql);
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>".$row['date']."</td><td>". $row["seminars"]."</td><td>".$row["industry"]."</td><td>".$row['guest']."</td><td>".$row['total']."</td><td>".$row['disc']."</td></tr>";
      }
        echo "</table>";
    }
$conn->close();
?>
</table>
</body>
</html>
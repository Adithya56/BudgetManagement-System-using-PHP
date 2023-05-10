<html>
<body>
<table cellpadding='8' align='center' border='1'>
<tr>
    <th>Date</th>
    <th>Department Meetings</th>
    <th>Almin visits</th>
    <th>Visited Guests</th>
    <th>Parent Meetings</th>
    <th>Boss Meetings</th>
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
  $sql="select date,deptmeet,alminvisit,visitguest,parentmeet,bossmeet,total,disc from hospitality1";
  $result=$conn->query($sql);
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>".$row['date']."</td><td>". $row["deptmeet"]."</td><td>".$row["alminvisit"]."</td><td>".$row['visitguest']."</td><td>".$row['parentmeet']."</td><td>".$row['bossmeet']."</td><td>".$row['total']."</td><td>".$row['disc']."</td></tr>";
      }
        echo "</table>";
    }
$conn->close();
?>
</table>
</body>
</html>
<html>
<body>
<table cellpadding='8' align='center' border='1'>
<tr>
    <th>Date</th>
    <th>Seminars Organised</th>
    <th>Seminars Participation</th>
    <th>Internships</th>
    <th>Industrial Visits</th>
    <th>Professional Body Registration-Institutional</th>
    <th>Professional Body Registration-Faculty</th>
    <th>Research Incentives</th>
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
  $sql="select date,seminar,seminarpart,intern,industryvis,profissional,profissional2,research,total,disc from faculty1";
  $result=$conn->query($sql);
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>".$row['date']."</td><td>". $row["seminar"]."</td><td>".$row["seminarpart"]."</td><td>".$row['intern']."</td><td>".$row['industryvis']."</td><td>".$row['profissional']."</td><td>". $row["profissional2"]."</td><td>". $row["research"]."</td><td>".$row['total']."</td><td>".$row['disc']."</td></tr>";
      }
        echo "</table>";
    }
$conn->close();
?>
</table>
</body>
</html>
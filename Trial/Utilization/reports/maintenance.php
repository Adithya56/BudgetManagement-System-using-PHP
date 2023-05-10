<html>
<body>
<table cellpadding='8' align='center' border='1'>
<tr>
    <th>Date</th>
    <th>Laboratory Consumables</th>
    <th>Repairs</th>
    <th>Operational Cost</th>
    <th>Stationary</th>
    <th>Copier Maintenance Cost</th>
    <th>Printers Maintenance Cost</th>
    <th>Other Department Maintenance Cost</th>
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
  $sql="select date,labcon,repair,opcost,stationary,mcost,printerco,deptcost,total,disc from maintainance1";
  $result=$conn->query($sql);
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>".$row['date']."</td><td>". $row["labcon"]."</td><td>".$row["repair"]."</td><td>".$row['opcost']."</td><td>".$row['stationary']."</td><td>".$row['mcost']."</td><td>". $row["printerco"]."</td><td>". $row["deptcost"]."</td><td>".$row['total']."</td><td>".$row['disc']."</td></tr>";
      }
        echo "</table>";
    }
$conn->close();
?>
</table>
</body>
</html>
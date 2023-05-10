<?php

$host="localhost";
$username="root";
$password="";
$dbname="miniproject";
$conn=mysqli_connect($host,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
$sql = "SELECT * FROM Allocating";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM Utilized";
$result1 = $conn->query($sql1);

$tot_all="SELECT sum(Amount) FROM Allocating";
$result3=$conn->query($tot_all);


$tot_uti="SELECT sum(Amount) FROM Utilized";
$result4=$conn->query($tot_uti);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
    <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <h1>Reports</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th style="background-color:#FF8040;">Resources</th>
                <th style="background-color:#FF8040;">Allocated Amount</th>
                <th style="background-color:#FF8040;">Utilized Amount</th>
                <th style="background-color:#FF8040;">Remaining Amount</th>
            </tr>
            <tr>
                <th>Software</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Equipment</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Library</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Maintenance</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Rennovation/Relocation</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>R&D</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Faculty Development</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Student Development</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Hospitality</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Furniture</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Proposal to Central Library</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Any Other Items</th>
                <td><?php echo $x=mysqli_fetch_array($result)['Amount'];?></td>
                <td><?php echo $y=mysqli_fetch_array($result1)['Amount'];?></td>
                <td><?php echo $x-$y;?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td style="background-color:#FFFF00;"><?php echo $x=mysqli_fetch_array($result3)[0];?></td>
                <td style="background-color:#FFA500;"><?php echo $y=mysqli_fetch_array($result4)[0];?></td>
                <td style="background-color:#00FF00;"><?php echo $x-$y;?></td>
            </tr>
           
        </table>
    </section>
</body>
 
</html>

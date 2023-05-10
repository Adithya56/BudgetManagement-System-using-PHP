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

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Allocated amount</title>
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
        <h1>Allocated Budget</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Software</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Equipment</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Library</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Maintenance</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Rennovation/Relocation</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>R&D</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Faculty Development</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];;?></td>
            </tr>
            <tr>
                <th>Student Development</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Hospitality</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Furniture</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Proposal to Central Library</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
            <tr>
                <th>Any Other Items</th>
                <td><?php echo mysqli_fetch_array($result)['Amount'];?></td>
            </tr>
           
        </table>
    </section>
</body>
 
</html>

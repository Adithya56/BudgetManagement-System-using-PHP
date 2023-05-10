<?php
$host="localhost";
$username="root";
$password="";
$dbname="miniproject";
$conn=mysqli_connect($host,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
if(isset($_POST['submit'])){
    $aquery = "SELECT Amount FROM Allocating where Id='i'";
    $result = $conn->query($aquery);
    $ahosp=mysqli_fetch_array($result)[0];

    $uquery = "SELECT Amount FROM utilized where Id='i'";
    $result1 = $conn->query($uquery);
    $uhosp=mysqli_fetch_array($result1)[0];

    $curr=$_POST['number5'];
    if ($curr+$uhosp>$ahosp) {
        echo "<script>alert('Utilization crossed the limit !! Please enter the amount with in the limit.');</script>";
    }
    else{
        $query = "update utilized set Amount=($curr+$uhosp) where Id='i'";
        $conn->query($query);
        $n1=$_POST['number0'];
		$n2=$_POST['number1'];
		$n3=$_POST['number2'];
		$n4=$_POST['number3'];
		$n5=$_POST['number4'];
		$n6=$_POST['number5'];
		$n7=$_POST['text'];
        $time=date("d-m-Y H:i:s");
		$query =$conn->prepare("insert into  hospitality1 (deptmeet,alminvisit,visitguest,parentmeet,bossmeet,total,disc,date) values(?,?,?,?,?,?,?,?)");
		$query->bind_param("iiiiiiss",$n1,$n2,$n3,$n4,$n5,$n6,$n7,$time);
		$query->execute();
}
}
$conn->close(); 
?>


<html>
<head>
    <title>Utilization amount validation</title>
    <script>
        function sum(){
            var total=0;
            for(var i=0;i<5;i++){
                var name='number'+i;
                var z=document.forms['myform'][name].value;
                if(z!=""){
                    total=total+parseInt(z);
                }
            }
            document.forms["myform"]["number5"].value=total;
        }
    </script>
</head>
<body>
    <form action="#" method="POST" name="myform">
        <table cellpadding='8' align='center' style="margin-top:40px;">
            <tr>
                <th style="font-size:20px;">Hospitality</th>
            </tr>
            <tr>
                <td><label>Department Meetings</label><br></td>
                <td><input type='number' name='number0' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Almin visits</label><br></td>
                <td><input type='number' name='number1' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Visited Guests</label><br></td>
                <td><input type='number' name='number2' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Parent Meetings</label><br></td>
                <td><input type='number' name='number3' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Boss Meetings</label><br></td>
                <td><input type='number' name='number4' onkeyup="sum();" /></td>
            </tr>
            <tr>
                <td><label>Total</label></td>
                <td><input type='text' name='number5' id='num1' readonly/></td>
            </tr>
            <tr>
                <td><label>Description</label></td>-
                <td><input type='text' name='text' /></td>
            </tr>
            <tr>
                <td align='center' colspan='3'><button type='submit' name='submit'>Submit</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
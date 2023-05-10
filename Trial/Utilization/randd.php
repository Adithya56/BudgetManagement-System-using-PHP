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
    $aquery = "SELECT Amount FROM Allocating where Id='f'";
    $result = $conn->query($aquery);
    $arandd=mysqli_fetch_array($result)[0];

    $uquery = "SELECT Amount FROM utilized where Id='f'";
    $result1 = $conn->query($uquery);
    $urandd=mysqli_fetch_array($result1)[0];

    $curr=$_POST['number3'];
    if ($curr+$urandd>$arandd) {
        echo "<script>alert('Utilization crossed the limit !! Please enter the amount with in the limit.');</script>";
    }
    else{
        $query = "update utilized set Amount=($curr+$urandd) where Id='f'";
        $conn->query($query);
        $n1=$_POST['number0'];
		$n2=$_POST['number1'];
		$n3=$_POST['number2'];
		$n4=$_POST['number3'];
		$n5=$_POST['text'];
        $time=date("d-m-Y H:i:s");
		$query =$conn->prepare("insert into rd2 (rd,addon,internalrd,total,disc,date) values(?,?,?,?,?,?)");
		$query->bind_param("iiiiss",$n1,$n2,$n3,$n4,$n5,$time);
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
            for(var i=0;i<3;i++){
                var name='number'+i;
                var z=document.forms['myform'][name].value;
                if(z!=""){
                    total=total+parseInt(z);
                }
            }
            document.forms["myform"]["number3"].value=total;
        }
    </script>
</head>
<body>
    <form action="#" method="POST" name="myform">
        <table cellpadding='8' align='center' style="margin-top:40px;">
            <tr>
                <th style="font-size:20px;">R and D</th>
            </tr>
            <tr>
                <td><label>R and D Investment Cost</label><br></td>
                <td><input type='number' name='number0' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Investment in addon</label><br></td>
                <td><input type='number' name='number1' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Internal R and D</label><br></td>
                <td><input type='number' name='number2' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Total</label></td>
                <td><input type='number' name='number3' readonly/></td>
            </tr>
            <tr>
                <td><label>description</label></td>
                <td><input type='text' name='text' /></td>
            </tr>
            <tr>
                <td align='center' colspan='3'><button type='submit' name='submit'>Submit</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
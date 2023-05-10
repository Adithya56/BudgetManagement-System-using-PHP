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
    $aquery = "SELECT Amount FROM Allocating where Id='a'";
    $result = $conn->query($aquery);
    $asoft=mysqli_fetch_array($result)[0];
    
    $uquery = "SELECT Amount FROM utilized where Id='a'";
    $resula = $conn->query($uquery);
    $usoft=mysqli_fetch_array($resula)[0];
    
    $curr=$_POST['number2'];
    if ($curr+$usoft>$asoft) {
        echo "<script>alert('Utilization crossed the limit !! Please enter the amount with in the limit.');</script>";
    }
    else{
        $query = "update utilized set Amount=($curr+$usoft) where Id='a'";
        $conn->query($query);   
        $number=$_POST['number0'];
        $number1=$_POST['number1'];
        $number2=$_POST['number2'];
        $text=$_POST['text'];
        $time=date("d-m-Y H:i:s");
        $query =$conn->prepare("insert into softwares1 (lab,deptoffice,total,disc,date) values(?,?,?,?,?)");
        $query->bind_param("iiiss",$number,$number1,$number2,$text,$time);
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
            for(var i=0;i<2;i++){
                var name='number'+i;
                var z=document.forms['myform'][name].value;
                if(z!=""){
                    total=total+parseInt(z);
                }
            }
            document.forms["myform"]["number2"].value=total;
        }
    </script>
</head>
<body>
    <form action="#" method="POST" name="myform" >
        <table cellpadding='8' align='center' style="margin-top:40px;">
            <tr>
                <th style="font-size:20px;">Software</th>
            </tr>
            <tr>
                <td><label>Laboratory</label><br></td>
                <td><input type='number' name='number0' id='x1' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Department office</label><br></td>
                <td><input type='number' name='number1' id='x2' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Total</label></td>
                <td><input type='text' name='number2' readonly id='x3'/></td>
            </tr>
            <tr>
                <td><label>Description</label></td>
                <td><input type='text' name='text' /></td>
            </tr>
            <tr>
                <td align='center' colspan='3'><button type='submit' name='submit'>Submit</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
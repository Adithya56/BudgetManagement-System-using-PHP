<?php

$host="localhost";
$username="root";
$password="";
$dbname="miniproject";
$conn=mysqli_connect($host,$username,$password,$dbname);


if(isset($_POST['n6'])){
	if(!empty($_POST['number0']) && !empty($_POST['number1']) && !empty($_POST['number2'])&& !empty($_POST['number3'])&& !empty($_POST['text'])){
		$n1=$_POST['number0'];
		$n2=$_POST['number1'];
		$n3=$_POST['number2'];
		$n4=$_POST['number3'];
		$n5=$_POST['text'];
		$query =$conn->prepare("insert into library (books,magazine,onlineser,total,disc) values(?,?,?,?,?)");
		$query->bind_param("iiiis",$n1,$n2,$n3,$n4,$n5);
		$query->execute();
	    if($query){
		    $ins =$conn->prepare("update tab set c =(?)");
		    $ins->bind_param("i",$n4);
		    $ins->execute();
    }
	}
}
?>
<html>
<head>
    <title>Utilization amount validation</title>
    <script>
        function sum(){
            var total=0;
            for(var i=0;i<3;i++){
                var name='number'+i;
                var z=document.forms['myform1'][name].value;
                if(z!=""){
                    total=total+parseInt(z);
                }
            }
            document.forms["myform1"]["number3"].value=total;
        }
    </script>
</head>
<body>
    <form action="#" method="POST" name="myform1">
        <table cellpadding='8' align='center' style="margin-top:40px;">
            <tr>
                <th style="font-size:20px;">Library</th>
            </tr>
            <tr>
                <td><label>Books</label><br></td>
                <td><input type='number' name='number0' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Magazines</label><br></td>
                <td><input type='number' name='number1' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Online Services-Subscriptions</label><br></td>
                <td><input type='number' name='number2' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Total</label></td>
                <td><input type='text' name='number3' id='num1' readonly/></td>
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
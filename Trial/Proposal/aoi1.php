<?php

$host="localhost";
$username="root";
$password="";
$dbname="miniproject";
$conn=mysqli_connect($host,$username,$password,$dbname);


if(isset($_POST['n4'])){
	if(!empty($_POST['number0']) && !empty($_POST['number1']) && !empty($_POST['text'])){
		$n1=$_POST['number0'];
		$n2=$_POST['number1'];
		$n3=$_POST['text'];
		$query =$conn->prepare("insert into others (other,total,disc) values(?,?,?)");
		$query->bind_param("iis",$n1,$n2,$n3);
		$query->execute();
	    if($query){
		    $ins =$conn->prepare("update tab set t12 =(?)");
		    $ins->bind_param("i",$n2);
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
            for(var i=0;i<1;i++){
                var name='number'+i;
                var z=document.forms['myform1'][name].value;
                if(z!=""){
                    total=total+parseInt(z);
                }
            }
            document.forms["myform1"]["number1"].value=total;
        }
    </script>
</head>
<body>
    <form action="#" method="POST" name="myform1">
        <table cellpadding='8' align='center' style="margin-top:40px;">
            <tr>
                <th style="font-size:20px;">Any Other Items</th>
            </tr>
            <tr>
                <td><label>Any Other Item</label><br></td>
                <td><input type='number' name='number0' onkeyup="sum();"/></td>
            </tr>
            <tr>
                <td><label>Total</label></td>
                <td><input type='text' name='number1' readonly/></td>
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
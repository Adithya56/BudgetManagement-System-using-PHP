<?php

$host="localhost";
$username="root";
$password="";
$dbname="miniproject";
$conn=mysqli_connect($host,$username,$password,$dbname);

if(isset($_POST['submit'])){
    if(!empty($_POST['number0']) && !empty($_POST['number1']) && !empty($_POST['number2'])&& !empty($_POST['text'])){
		$number=$_POST['number0'];
		$number1=$_POST['number1'];
		$number2=$_POST['number2'];
		$text=$_POST['text'];
		$query=$conn->prepare("insert into software (lab,deptoffice,total,disc) values(?,?,?,?)");
		$query->bind_param("iiis",$number,$number1,$number2,$text);
		$query->execute();
        if($query){
            $ins =$conn->prepare("insert into tab (a) values(?)");
            $ins->bind_param("i",$number2);
            $ins->execute();
        }
    }
}

?>
<html>
<head>
<script>
        function sum(){
            var total=0;
            for(var i=0;i<2;i++){
                var name='number'+i;
                var z=document.forms['myform1'][name].value;
                if(z!=""){
                    total=total+parseInt(z);
                }
            }
            document.forms["myform1"]["number2"].value=total;
        }
    </script>
</head>
<body>
    <form action="#" method="POST" name="myform1" >
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
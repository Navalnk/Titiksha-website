<html>

<body>
<?php
try{
	include("public\php\connect.php");
	if(isset($_REQUEST["conf"])&&isset($_REQUEST["em"]))
	{
		$qu="Select * from tempaccount where email='"+$_REQUEST["em"]+"' and confirm_code='"+$_REQUEST["conf"]+"';";
		$res=mysql_query($qu);
		while($row=mysql_fetch_array($res))
		{
			$query="Insert into useraccount (username,password,email,phone,college)values('".$row["username"]."','".$row["password"]."','".$row["email"]."','".$row["phone"]."','".$row["college"]."')";
            $result=mysql_query($query)
            	or die("Error Occured");
           	$removing="delete from tempaccount where email='"+$_REQUEST["em"]+"' and confirm_code='"+$_REQUEST["conf"]+"';";
            $com_re=mysql_query($removing);
            echo "<input type='hidden' style='display:none' id ='first' value='success'></input>";

            break;	
		}
	}
	else
		echo "<input type='hidden' style='display:none' id='first' value='invalid'></input>";		
}
catch(Exception $e)
{
	echo "<input type='hidden' style='display:none' id='first' value='invalid'></input>";
}
mysql_close($mysql);
?>

<script>
function myFunction() {
    var ty=document.getElementById("first").value;
    if(ty=="success")
    	ty="User created successfully";
    else
    	ty="Invalid Confirmation Code"	
    if (confirm(ty) == true) {
         window.location.assign("index.php");
    } else {
        window.location.assign("index.php");
    }
}
window.onload = myFunction;
</script>
</body>
</html>
<?php
try{

	include("connect.php");
	if(isset($_REQUEST["na"])&&isset($_REQUEST["em"])&&isset($_REQUEST["pas"])&&isset($_REQUEST["pho"])&&isset($_REQUEST["col"]))
	{
		if($_REQUEST["na"]!="" && $_REQUEST["em"]!="" && $_REQUEST["pas"]!="" && $_REQUEST["pho"]!=""&&$_REQUEST["col"])
		{
			$confirm_code=md5(uniqid(rand()));
			$query="Insert into tempaccount (confirm_code,username,password,email,phone,college)values('".$confirm_code."','".$_REQUEST["na"]."','".$_REQUEST["pas"]."','".$_REQUEST["em"]."','".$_REQUEST["pho"]."','".$_REQUEST["col"]."')";
                    $result=mysql_query($query)
                    or die("Invalid Entry");
                  echo "Confirmation code has been sent to your email address";
                  	try
                  	{
                        $message="Thankyou for registering in Titksha2k14\n your confirmation code is:\n http://titiksha.smvdu.net.in/reg.php/em="+$_REQUEST["em"]+"&conf="+$confirm_code+"\n This confirmation code will be valid for only 24 hours";
                  		mail($_REQUEST["em"],"Confirmation Email : Titksha2k14",$message,"Titksha2k14 SMVDU");
					}
					catch(Exception $en)
					{
						echo "";
					}
		
		}
			else
			echo "Some Fields are empty";
	}
}
catch(Exception $e)
{
	echo "Invalid Entry";
}
mysql_close($mysql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Alert</title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>
<body>



	<div id="main2">

								<h1><font color='green'>Congratulation! <br>Your Order submitted Successfully..</font></h1>

<?php
require_once '../connection/dbconfig.php';



						 $a = $_POST['a'];
						 $b = $_POST['b'];
					   $ans = $_POST['ans'];
						 $spam = $a + $b;
if($ans == $spam)
{

	if($_POST)
	{

    $uid = $_POST['uid'];
		$mg = $_POST['img'];
		$name = $_POST['name'];
		$mb = $_POST['mobile'];
		$em = $_POST['email'];
		$addr = $_POST['addr'];
		$cdate = $_POST['cdate'];
		$ordr = $_POST['ordr'];
		$pr = $_POST['pr'];
		$sts = "Pending";




		try{

			$stmt = $db_con->prepare("INSERT INTO ordrs(img, name, mobile, email, addr, ordr, sts, cdate, pr, uid)
			VALUES(:mg, :nm, :mb, :em, :ad, :ord, :st, :cd, :pr, :usid)");
		  $stmt->bindParam(":mg", $mg);
			$stmt->bindParam(":nm", $name);
			$stmt->bindParam(":mb", $mb);
			$stmt->bindParam(":em", $em);
			$stmt->bindParam(":ad", $addr);
			$stmt->bindParam(":ord", $ordr);
			$stmt->bindParam(":st", $sts);
			$stmt->bindParam(":cd", $cdate);
			$stmt->bindParam(":pr", $pr);
			$stmt->bindParam(":usid", $uid);

			if($stmt->execute())
			{
				echo "<p>Thank you</p>";
			}
			else{
				echo "Query Problem";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


//	header("Location: track.php?myid=$myid");


?>

<?php
require_once '../connection/dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM ordrs ORDER BY myid DESC LIMIT 1");
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$lid = $row['myid'];

	header("Location: ../track.php?myid=$lid");

?>







               <p><b><?php   }



							 else{

	echo '<p> Wrong Answer! <br/> Please calculate the number again and try  to give correct answer. </p>';



							 	} ?></b></p>


								<p><a href="../index.php" ><button class="button" >Back</button</a>
</p>
        </div>







</body>
</html>

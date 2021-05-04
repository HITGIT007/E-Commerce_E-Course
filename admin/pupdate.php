<?php

	require_once("../session.php");

	require_once("../class.user.php");
	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $id = $userRow['user_id'];
	if ($id == 1){
	}

	else{
		header("location: ../member/home.php");
	}

	if(!$_SESSION['user_session']){

		header("location: ../login/denied.php");
	}

?>


<?php
require_once '../connection/dbconfig.php';


	if(isset($_POST['name']))
	{

   $pid = $_POST['pid'];
		$name = $_POST['name'];

		$des = $_POST['des'];
		$pr =  $_POST['pr'];
		$cdate = $_POST['cdate'];


	$mg = $_POST['img'];

		$stmt = $db_con->prepare("UPDATE product SET img=:mg, name=:en,
			 des=:ds, pr=:pr,  cdate=:cd
 WHERE pid=:id");

 	  $stmt->bindParam(":mg", $mg);
		$stmt->bindParam(":en", $name);
		$stmt->bindParam(":ds", $des);
		$stmt->bindParam(":pr", $pr);
		$stmt->bindParam(":cd", $cdate);
		$stmt->bindParam(":id", $pid);

		if($stmt->execute())
		{
			//echo "<p>Product Successfully updated<p>";
		}
		else{
			echo "Query Problem";
		}
	}

?>

<?php

	require_once("../session.php");

	require_once("../class.user.php");
	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access Denied</title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>
<body>



	<div id="main2">

								<h1><font color='green'>Congratulation!</font></h1>

               <p><b>Product Successfully Updated.</b></p>


								<p><a href="product.php" ><button class="button" >Back</button</a>
</p>
        </div>







</body>
</html>

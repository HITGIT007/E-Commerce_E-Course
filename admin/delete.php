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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete </title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>
<body>
<?php
	include_once '../connection/dbconfig.php';

	if(isset($_GET['pid']))
	{
		$id = $_GET['pid'];
		$stmt=$db_con->prepare("DELETE FROM product WHERE pid=:id");
		$stmt->execute(array(':id'=>$id));


			echo '	<div id="main2">

											<h1><font color="red">Product Deleted !</font></h1>

			               <p><b>Single Product Deleted permenatly from record.</b></p>


											<p><a href="product.php" ><button class="button" >Back</button</a>
			</p>
			        </div>';

	}



?>




<?php
	include_once '../connection/dbconfig.php';

	if(isset($_GET['myid']))
	{
		$id = $_GET['myid'];
		$stmt=$db_con->prepare("DELETE FROM ordrs WHERE myid=:id");
		$stmt->execute(array(':id'=>$id));


		echo '	<div id="main2">

										<h1><font color="red">Order Deleted !</font></h1>

		               <p><b>Single Order Deleted permenatly from record.</b></p>


										<p><a href="order.php" ><button class="button" >Back</button</a>
		</p>
		        </div>';


	}


?>




<?php
	include_once '../connection/dbconfig.php';

	if(isset($_GET['mid']))
	{
		$id = $_GET['mid'];
		$stmt=$db_con->prepare("DELETE FROM message WHERE mid=:id");
		$stmt->execute(array(':id'=>$id));


		echo '	<div id="main2">

										<h1><font color="red">Message Deleted !</font></h1>

		               <p><b>Single Message Deleted permenatly from record.</b></p>


										<p><a href="message.php" ><button class="button" >Back</button</a>
		</p>
		        </div>';


	}


?>


<?php
	include_once '../connection/dbconfig.php';

	if(isset($_GET['uid']))
	{
		$id = $_GET['uid'];
		$stmt=$db_con->prepare("DELETE FROM users WHERE user_id=:id");
		$stmt->execute(array(':id'=>$id));


		echo '	<div id="main2">

										<h1><font color="red">User Deleted !</font></h1>

		               <p><b>User Deleted permenatly from record.</b></p>


										<p><a href="user.php" ><button class="button" >Back</button</a>
		</p>
		        </div>';


	}


?>




</body>
</html>

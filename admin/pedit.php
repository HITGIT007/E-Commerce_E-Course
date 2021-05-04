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
include_once '../connection/dbconfig.php';

if(isset($_GET['pid']))
{
	$id = $_GET['pid'];
	$stmt=$db_con->prepare("SELECT * FROM product WHERE pid=:pid");
	$stmt->execute(array(':pid'=>$id));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prdoduct Edit</title>
<link href="../style/style.css" rel="stylesheet" type="text/css">



</head>

<body>



    <div id="main2">




	 <form method='post' action="pupdate.php">

    <table class='table table-bordered'>


<tr>
	    <td colspan="2"><h1>Edit Information </h1></td>
</tr>
<tr>
<td>Product ID</td>
<td>
	<input type='text' name='pid' value="<?php echo $row['pid']; ?>" />

	<input type='hidden' name='img' value="<?php echo $row['img']; ?>" />


</td>




</tr>
<tr>
				<td>Name</td>
				<td><input type='text' name='name' value="<?php echo $row['name']; ?>" class='form-control' placeholder='' /></td>
		</tr>
		<tr>
				<td>Description</td>
				<td><input type='text' name='des'  value="<?php echo $row['des']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
				<td>Price</td>
				<td><input type='text' name='pr'  value="<?php echo $row['pr']; ?>"  class='form-control' placeholder='' ></td>
		</tr>


		<tr>
				<td>Date</td>
				<td><input type='text' name='cdate' value="<?php echo $row['cdate']; ?>"  class='form-control' placeholder='' ></td>
		</tr>


			<tr>

            <td></td><td>
            <button type="submit" class="button" >Save Updates
			</button>

            </td>
        </tr>

    </table>
</form>
</div>
</body>
</html>

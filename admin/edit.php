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

if(isset($_GET['myid']))
{
	$id = $_GET['myid'];
	$stmt=$db_con->prepare("SELECT * FROM ordrs WHERE myid=:id");
	$stmt->execute(array(':id'=>$id));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Form</title>
<link href="../style/style.css" rel="stylesheet" type="text/css">



</head>

<body>



    <div id="main2">




	 <form method='post' action="update.php">

    <table class='table table-bordered'>


<tr>
	    <td colspan="2"><h1>Edit Information </h1></td>
</tr>
<input type='hidden' name='myid' value="<?php echo $row['myid']; ?>" />

<tr>
				<td>Name</td>
				<td><input type='text' name='name' value="<?php echo $row['name']; ?>" class='form-control' placeholder='' /></td>
		</tr>
		<tr>
				<td>Mobile</td>
				<td><input type='text' name='mobile'  value="<?php echo $row['mobile']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
				<td>Email</td>
				<td><input type='text' name='email'  value="<?php echo $row['email']; ?>"  class='form-control' placeholder='' ></td>
		</tr>

		<tr>
				<td>Address</td>
				<td><input type='text' name='addr'  value="<?php echo $row['addr']; ?>"  class='form-control' placeholder='' ></td>
		</tr>

		<tr>
				<td>Order</td>
				<td><input type='text' name='ordr'  value="<?php echo $row['ordr']; ?>" class='form-control' placeholder=''></td>
		</tr>

		<tr>
				<td>Date</td>
				<td><input type='text' name='cdate' value="<?php echo $row['cdate']; ?>"  class='form-control' placeholder='' ></td>
		</tr>

					<tr>
							<td>Status: </td>
							<td> <div class="selector"> <select name="sts" >
			<option value="<?php echo $row['sts']; ?>"><?php echo $row['sts']; ?></option>
			<option value="Pending">Pending</option>
			<option  value="Dispatched">Dispatched</option>
			<option  value="Cancelled">Cancelled</option>
			</select>
			</tr>

			<tr>

            <td></td><td>
            <button type="submit"  name="oupdate" class="button" >Save Updates
			</button>

            </td>
        </tr>

    </table>
</form>
</div>
</body>
</html>

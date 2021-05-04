
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact</title>
<link rel="stylesheet" href="style/style1.css" type="text/css"  />
<style>
ul.pagination {
    text-align:center;
    color:#1f447f;
}
ul.pagination li {
    display:inline;
    padding:0 3px;
}
ul.pagination a {
    color:#1f447f;
    display:inline-block;
    padding:5px 10px;
    border:1px solid #1f447f;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current {
    background:#1f447f;
    color:#fff;
}



</style>

</head>
<body>

<div id="main2">

    <div id="header"><img src="img/logo.png"></div>

<div id="manu">
<ul>
<li><a  href="index.php">HOME</a></li>
<li><a href="track.php">TRACK ORDER</a></li>
<li><a style="background:#1f447f; color:#fff;" href="contact.php">CONTACT</a></li>
<li><a href="login/login.php">SING IN / SIGN UP</a></li>
</ul>
</div>


<div id="content">

<center>


   <h1 >Contact Us</h1>

<form method="post" action="contact.php">
   <input type="text"  name="name" placeholder="Name" required /><br><br>
   <input type="text"  name="email" placeholder="Email" required /><br><br>
   <input type="text"  name="mobile" placeholder="Mobile" required /><br><br>
   <textarea type="text" cols="10" rows="10" name="mssg" placeholder="Message" required /></textarea><br>

<br>

       <button  type="submit" name="ccontact"  class="button"> SEND </button>



 </form>

 <br><br>

<?php
 require_once 'connection/dbconfig.php';


 	if(isset($_POST['ccontact'])){


 		$name = $_POST['name'];
 		$mb = $_POST['mobile'];
 		$em = $_POST['email'];
 		$mssg = $_POST['mssg'];

 		try{

 			$stmt = $db_con->prepare("INSERT INTO message(name, mobile, email, mssg)
 			VALUES(:nm, :mb, :em, :sms)");

 			$stmt->bindParam(":nm", $name);
 			$stmt->bindParam(":mb", $mb);
 			$stmt->bindParam(":em", $em);
 			$stmt->bindParam(":sms", $mssg);



 			if($stmt->execute())
 			{
 				echo '<b><font color="green">Congratulation! <br>Your Message submitted Successfully. Admin will contact you shortly.</font></b>';

 			}
 			else{
 				echo "Query Problem";
 			}
 		}
 		catch(PDOException $e){
 			echo $e->getMessage();
 		}
 	}





 ?>


</center>
    <br>

</div>




    <div id="footer">
<center>
      <p>Home . Product . Contact Us . Services </p>

      <p><img src="img/facebook.png"> <img src="img/twitter.png">  <img src="img/u.png"></p>
</center>
    <b>Designed By Prateek Priyadarshi</b>

    </div>

</div>

</body>
</html>

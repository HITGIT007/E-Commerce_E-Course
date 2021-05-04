
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign In</title>
<link rel="stylesheet" href="style/style1.css" type="text/css"  />
</head
<body>

<div id="main2">

    <div id="header"><img src="img/logo.png"></div>

    <div id="manu">
    <ul>
    <li><a href="index.php">HOME</a></li>
    <li><a style="background:#1f447f; color:#fff;" href="track.php">TRACK ORDER</a></li>
    <li><a href="contact.php">CONTACT</a></li>
    <li><a href="login/login.php">SING IN / SIGN UP</a></li>
    </ul>
    </div>


<div id="content">

<center>
  <form method='post'  action="track.php">

   <table >

   <tr>
       <td colspan="2">	<h1>Track Your Order </h1></td>
   </tr>


   <tr>
       <td>Order No</td>
       <td><input type='text' name='search'   placeholder='' required /></td>
   </tr>

   <tr>
      <td></td><td>
    <button type="submit" class="button" >
TRACK
  </button>
        </td>
    </tr>

</table>
</form>

</center>
<br><br>

  <?php
  require_once 'connection/dbconfig.php';


  //**********************************************
  require_once 'connection/dbconfig.php';

  if(isset($_GET['myid'])){

  $myid = $_GET['myid'];

  $stmt = $db_con->prepare("SELECT * FROM ordrs WHERE myid = $myid");
  $stmt->execute();
  $row=$stmt->fetch(PDO::FETCH_ASSOC);


  $img = $row['img'];
  $name =  $row['name'];
  $ordr = $row['ordr'];
  $pr = $row['pr'];
  $cdate =  $row['cdate'];
  $sts = $row['sts'];


  echo '
  <div class="item1">

  <span><img src="'.$img.'"><span>

  </div>
  ';

  echo '
  <div class="item1">
  <button class="button"> Price '.$pr.'</button><br>
  <span><b>Order No</b><br>'.$myid.'<span><br>
  <span><b>Name</b><br>'.$name.'<span><br>
  <span><b>Order</b><br>'.$ordr.'<span><br>
  <b><b>Order Date </b>'.$cdate.'</b><br>
  <button class="button"> '.$sts.' </button>
  </div>

  ';



  }

  if(isset($_POST['search'])){


  $myid = $_POST['search'];


  $stmt = $db_con->prepare("SELECT * FROM ordrs WHERE myid = $myid");
  $stmt->execute();
  $row=$stmt->fetch(PDO::FETCH_ASSOC);


  $img = $row['img'];
  $name =  $row['name'];
  $ordr = $row['ordr'];
  $pr = $row['pr'];
  $cdate =  $row['cdate'];
  $sts = $row['sts'];


  echo '
  <div class="item1">

  <span><img src="'.$img.'"><span>

  </div>
  ';

  echo '
  <div class="item1">
  <button class="button"> Price '.$pr.'</button><br>
  <span><b>Course No</b><br>'.$myid.'<span><br>
  <span><b>Name</b><br>'.$name.'<span><br>
  <span><b>Course</b><br>'.$ordr.'<span><br>
  <b><b>Order Date </b>'.$cdate.'</b><br>
  <button class="button"> '.$sts.' </button>
  </div>

  ';



  }









  //**********************************************



 ?>




</div>

</div>


  </div>
    <div id="footer">
<center>
      <p>Home . Product . Contact Us . Services </p>

      <p><img src="img/facebook.png"> <img src="img/twitter.png">  <img src="img/u.png"></p>
</center>
    <b> Designed By Prateek Priyadarshi </b>

    </div>

</div>

</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign In</title>
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
<li><a style="background:#1f447f; color:#fff;" href="index.php">HOME</a></li>
<li><a href="track.php">TRACK ORDER</a></li>
<li><a href="contact.php">CONTACT</a></li>
<li><a href="login/login.php">SING IN / SIGN UP</a></li>
</ul>
</div>


<div id="content">

  <?php
  require_once 'connection/dbconfig.php';

  include_once('connection/connectionz.php');
  include_once('function/functionz.php');

  $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
    if ($page <= 0) $page = 1;

    $per_page = 6; // Set how many records do you want to display per page.

    $startpoint = ($page * $per_page) - $per_page;

    $statement = "`product` ORDER BY `pid` ASC";


//**********************************************
$stmt = $db_con->prepare("SELECT * FROM product ORDER BY pid DESC  LIMIT {$startpoint} , {$per_page} ");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

  $img = $row['img'];
  $pid = $row['pid'];
  $pr = $row['pr'];

  echo '
  <div class="item">
  <button class="button">Price '.$pr.' </button><br>
  <span><img src="'.$img.'"><span><br>
    <span class="more"><a href="detail.php?pid='.$pid.'" >More Detail</a></span>
     <span class="order"><a href="add-order.php?pid='.$pid.'" >Order Now</a></span>
</div>';

} // While loop End
//**********************************************
?>


<br>
<br>



    </div>
<div id="nav">
    <br>
    <center>
    <?php

            // displaying paginaiton.
            echo pagination($statement,$per_page,$page,$url='?');
            ?>
    </center>
    <br>

</div>




    <div id="footer">
<center>
      <p>Home . Product . Contact Us . Services </p>

      <p><img src="img/facebook.png"> <img src="img/twitter.png">  <img src="img/u.png"></p>
</center>
    <b>  Designed By Prateek Priyadarshi </b>

    </div>

</div>

</body>
</html>

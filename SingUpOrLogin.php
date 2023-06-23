<?php 
session_start();
	$user_id = explode("-",$_COOKIE[user_id]);
	if(isset($_GET['logout']) || isset($_SESSION["logout"])){
	setcookie('user_id', null, time() - 3600, "/");
	unset($_SESSION["logout"]);
	header("location:SingUpOrLogin.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="css/img/BananaLogoTwo.png" />
<title>SingUpOrLogin</title>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/CssSingUpOrLogin.css">
	<link rel="stylesheet" type="text/css" href="css/CssSingUpOrLogin.css" media="(min-width: 320px) and (max-width: 480px)">
    <link rel="stylesheet" type="text/css" href="css/CssSingUpOrLogin.css" media="(min-width: 481px) and (max-width: 900px)">

    <script src="JSSnigUpOrLogin.js" type="text/javascript"></script>
</head>
<div class="header">
<img id="pic" src="css/img/BananaLogoTwo.png" alt="BananaLogoSite" width="80px" height="80px">
<h1>BANANA</h1>

<p style="font-weight: bold">سورس کدهای رایگان و اطلاعاتی برای برنامه نویسان </p>
</div>

<div class="navbar">
<a href="index.php" class="active">صفحه اصلی</a>
<a href="SourceCode.html">سورس کد</a>
<a href="Books.html">کتابهای آموزشی</a>
<a href="IDE.html">IDE</a>
<?php echo (isset($_COOKIE['user_id'])) ? '<a href="SingUpOrLogin.php" class="right"> خوش آمدید </h2>' : '<a href="SingUpOrLogin.php" class="right">عضویت/ورود</a>'; ?> 
    <a href="AboutBananaSite.html" class="right">درباره ما/ ارتباط با ما</a>
</div>

<div class="cotn_principal">
<div class="cont_centrar">
<?php 
if(!isset($_COOKIE['user_id'])){ ?> 
  <div class="cont_login">
  <?php if(isset($_SESSION["eror"])){
	  echo '<h2>'.$_SESSION["eror"].'</h2>';
	  unset($_SESSION["eror"]);
  } ?>
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">

    <h2>ورود به سایت</h2>
  <p>جهت ورود به سایت ایمیل و پسوردی که در هنگام عضویت وارد کردید را وارد کنید.</p>
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>عضویت در سایت</h2>
  <p>جهت عضویت در سایت بر روی قسمت زیر کلیک کنید.</p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</div>
  </div>
       </div>


    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="css\img\LogandsingBS.jpg" alt="" />
       </div>

    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="css\img\LogandsingBS.jpg" alt="" />
       </div>
  <form action="login-singup.php" name="actionLogin" method="post">
 <div class="cont_form_login" >
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
 <input type="email" placeholder="email" id="email" name="email"/>
<input type="password" placeholder="password" id="password" name="password" />
<button class="btn_login" name="btn_login" onclick="cambiar_login()" id="btnLogin" name="btnLogin">LOGIN</button>
  </div>
  </form>
<form action="login-singup.php" name="actionSing" method="post" >
   <div class="cont_form_sign_up" >
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>SIGN UP</h2>
<input type="email" placeholder="Enter email" id="email" name="email"required />
<input type="text" placeholder="Enter username" id="username" name="username" required/>
<input type="password" placeholder="Enter password" id="password" name="password" required />
<button class="btn_sign_up" onclick="cambiar_sign_up()" id="btnSingup" name="btnSingup">SIGN UP</button>

  </div>
  </form>
    </div>

  </div>
  <?php } 

  else{
	// check user
	$user_id = explode("-",$_COOKIE[user_id]);
	if($user_id[1]==md5("user-idvs-".$user_id[0])){
	// get user meta
	include 'db.php';
	$sql = "SELECT * FROM `users` WHERE `ID` = $user_id[0]";
	$user = mysqli_fetch_array(mysqli_query($conn, $sql));
	if($user){
	echo '<h2> شما وارد شده اید</h2>';
	echo '<h2>'.$user['username'] .' خوش آمدید </h2>';
	echo "<a href='?logout'>خروج</h2>";
	}
	else{
	$_SESSION["logout"] = true;
	}}
	else{
	$_SESSION["logout"] = true;
	}
  }?>
 </div>
</div>
</html>

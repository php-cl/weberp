<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>weberp | ERP </title>
  <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">


  <?php  include_once("assets/include/function.php") ?>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body>

<?php printmenu(); ?>



<div class="wrapper-main">
  <div class="container">
    <br><br><br>
    <div class="col-lg-4 col-lg-offset-4">
    <form class="form-signin" action="assets/include/function.php" method="POST">
      <div class="mykey">
      <i class="fa fa-key fa-5x"></i>
      </div>
      <label class="sr-only" for="inputEmail">Email address</label>

       <select name="fusuario" id="fpass" class="form-control" placeholder="Usuario" autofocus="">
             <?php printUser(); ?>
       </select>


      <br>
      <label class="sr-only" for="inputPassword">Password</label>
      <input id="inputPassword" class="form-control" name="fpass"  type="password" required="" placeholder="pass">
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
   </div>
  </div>
</div> <!-- wrapper-main-->



<?php  printfooter()  ?>	
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>weberp | Salidas </title>  
  <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <?php  require_once("assets/include/function.php") ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body>


      <?php
      printmenu();
      $estalogeando = false;
      session_start(); 
      if (isset($_SESSION['name_erp'])) 
      {
       $estalogeando = true;
     }

       else{ 
           header('location:login.php');       
     }


     ConectarBD();

     ?>

<div class="wrapper-main">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 col-lg-offset-3">

         <div class="panel panel-success">
             	 <div class="panel-heading"><h3 class="panel-title">4.1 Facturar Producto</h3></div>             	
             	 <div class="panel-body">
                <form class="form-signin" action="assets/include/function.php" method="POST">
             	 	<div class="form-group ">          
             	 		 <select class="form-control inputfill  botonsup" type="text" name="tproducto_s" placeholder="" autofocus>
                      <?php rellenarProductos() ?>
                  </select><br><input class="form-control inputfill  botonsup" type="text" name="tcant" placeholder="Cantidad" autofocus><br>
             	    <select class="form-control inputfill  botonsup" type="text" name="tproveedor" placeholder="Proveedor" autofocus>
                      <?php rellenarCientes() ?>
                  </select>
                    <br>
                  <input class="form-control inputfill  botonsup" type="text" name="tfactura" placeholder="Factura" autofocus><br>               	</div>             	 	
             	 	<div class="form-group">
             	 		<input class="botones btn btn-default" type="submit" value="Insertar">
             	 	</div>
             	 	</form>
             	 </div>
         </div>
        </div>   
      </div>
  </div>
</div> <!-- wrapper-main-->

<?php  printfooter();  
//ob_end_flush();
?>
	
</body>
</html>
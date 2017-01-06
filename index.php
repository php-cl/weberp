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
  <?php  require_once("assets/include/function.php") ?>
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <!-- Libreria morris -->

  <script type="text/javascript" src="assets/js/morris/raphael-min.js"></script>
  <script type="text/javascript" src="assets/js/morris/morris.js"></script>
  <link rel="stylesheet" href="assets/js/morris/morris.css">


</head>

<body>
 <?php
$estalogeando = false;
?>
      <?php
      printmenu();
    
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
       <div class="container menu-prin">
            <div class="row">
                <div class="col-lg-10">
                   <div class="col-lg-2 esc">
                     <a href="clientes.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <p><?php echo INDEX_CLIENTE ?></p>
                        <br>
                      </div>
                    </a>
                   </div>

                   <div class="col-lg-2 esc">
                     <a href="proveedores.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                        <p><?php echo INDEX_PROVEEDORES ?></p>
                        <br>
                      </div>
                    </a>
                   </div>
                  
                   <div class="col-lg-2 esc">
                     <a href="productos.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        <p><?php echo INDEX_PRODUCTOS ?></p>
                        <br>
                      </div>
                    </a>
                   </div>


                   <div class="col-lg-2 esc">
                     <a href="entradas.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>
                        <p><?php echo INDEX_ENTRADAS ?></p>
                        <br>
                      </div>
                    </a>
                   </div>

                   <div class="col-lg-2 esc">
                     <a href="salidas.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>
                        <p><?php echo INDEX_SALIDAS ?></p>
                        <br>
                      </div>
                    </a>
                   </div>

                 <div class="col-lg-2 esc">
                     <a href="movimientos.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                        <p><?php echo TEXT_MOVIMIENTOS ?></p>
                        <br>
                      </div>
                    </a>
                   </div>



                 </div>
                 <div class="col-lg-2">
                   <ul class="list-group">
                    <li class="list-group-item">
                      <span class="badge"><?php echo mysqlCantiFilas("tclientes") ?></span>
                      <?php echo INDEX_CLIENTE ?>
                    </li>
                    <li class="list-group-item">
                      <span class="badge"><?php echo mysqlCantiFilas("tproveedores") ?></span>
                      <?php echo INDEX_PROVEEDORES ?>
                       </li>

                    <li class="list-group-item">
                      <span class="badge"><?php echo mysqlCantiFilas("tproductos") ?></span>
                      <?php echo INDEX_PRODUCTOS ?>
                    </li>

                     <li class="list-group-item">
                      <span class="badge"><?php echo mysqlCantiFilas("crm") ?></span>
                      <?php echo TEXT_CRM ?>
                    </li>

                  </ul>                 
                </div>
              </div>

            <div class="row">
                <div class="col-lg-10">
                 <div class="col-lg-2 esc">
                     <a href="conf.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                        <p><?php echo TEXT_CONF ?></p>
                        <br>
                      </div>
                    </a>
                   </div>


                   
                   <div class="col-lg-2 esc">
                     <a href="inventario.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <p><?php echo TEXT_INVENTARIO ?></p>
                        <br>
                      </div>
                    </a>
                   </div>
                

                <div class="col-lg-2 esc">
                     <a href="reporte-compras-por-proveedores.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                        <p><?php echo INDEX_COMPRAS ?></p>
                        <br>
                      </div>
                    </a>
                   </div>


                 <div class="col-lg-2 esc">
                     <a href="reporte-ventas-clientes.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
                        <p><?php echo INDEX_VENTAS ?></p>
                        <br>
                      </div>
                    </a>
                   </div>   

 
                <div class="col-lg-2 esc">
                     <a href="crm.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                        <p><?php echo TEXT_CRM ?></p>
                        <br>
                      </div>
                    </a>
                   </div>  

                                   <div class="col-lg-2 esc">
                     <a onclick="return confirm('¿Quieres realmente salir?');"  href="assets/include/logout.php">
                      <div class="thumbnail">
                        <br>
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        <p><?php echo TEXT_CERRAR ?></p>
                        <br>
                      </div>
                    </a>
                   </div>  



               </div>
                <div class="col-lg-2">
                    <li class="list-group-item">
                      <span class="badge"><?php echo mysqlCantiFilas("tmov") ?></span>
                      <?php echo TEXT_MOVIMIENTOS ?>
                    </li>              
                </div>

  

            </div>

<br>

<div class="alert alert-info" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>WEB-ERP! <?php echo ":"?></strong> <?php echo INDEX_TEXT_FULL ?>
</div>




<div class="row foot-index">
   <div class="col-lg-4">
    <a class="mylink" href="reporte-compras-por-proveedores.php"><h3 class="text-big"><?php echo INDEX_COMPRAS_TXT ?></h3></a>
<div id="graph"></div>
<?php
 printGrafProve("graph");
?>

   </div>

      <div class="col-lg-4">
        <a class="mylink" href="reporte-ventas-clientes.php"><h3 class="text-big"><h3 class="text-big"><?php echo INDEX_VENTAS_TXT ?></h3></a>
     <div id="graph1"></div>

<?php
  printGrafClientes("graph1");
?>
   </div>

      <div class="col-lg-4">

       <a class="mylink" href="inventario.php"><h3 class="text-big"><h3 class="text-big"><?php echo INDEX_INVENTARIO_TXT ?></h3></a>
   <div id="graph2"></div>


<?php
 printGrafProductos("graph2");
?>

   </div>

</div>


       </div>       
</div> <!-- wrapper-main-->






<?php  printfooter();  
//ob_end_flush();
?>



	
</body>
</html>
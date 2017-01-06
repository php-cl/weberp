<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>weberp | Inventario </title>  
  <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="assets/js/morris/raphael-min.js"></script>
  <script type="text/javascript" src="assets/js/morris/morris.js"></script>
  <link rel="stylesheet" href="assets/js/morris/morris.css">
  <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">



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


<?php
  if(isset($_GET['id_clie_cod']))
   {
     ConectarBD();
     $numero=$_GET['id_clie_cod'];
   }

else{
     $numero= DameElPrimerCodigoCliente();
    }
   $id = DameIdCliente($numero);
   $numero = DameNombreCliente($numero);
?>




<div class="wrapper-main">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">


         

      <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Venta de productos para :<?php echo $numero ?></h3> 
               </div>               
               <div class="panel-body">
                           <div class="tabla">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>No DOCUMENTO</th>
             <th>IMPORTE</th>
             <th>CANT</th>
             <th>FECHA</th>
             <th>COD</th>
             <th>PRODUCTO</th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM tmov WHERE quie = '$numero' ORDER BY fid";
              $result = mysql_query($sql);
              $i=0;
              $a=0;
              $arrayNombres = array();
              $arrayImportes = array();
              $total = 1;

         while($row = mysql_fetch_assoc($result))
         { 
          $i++;

          $mycod_2 = DamePrecioProducto($row['fcodigoproducto']) * $row['fcan']*-1 ;
          echo "<tr>"; 
          echo "<td>".$row['fnodocumento']."</td>";
          echo "<td>".$mycod_2."</td>";
          echo "<td>".$row['fcan']."</td>";
          echo "<td>".$row['fecha']."</td>";
          echo "<td>".$row['fcodigoproducto']."</td>";
          $temp = DameNombreProducto($row['fcodigoproducto']);
          echo "<td>".$temp."</td>";        
          echo "</tr>";          
          $a = $a + $mycod_2;  
          $tempProvee = DameComprasProveedor($row['quie'])*-1;          
          $total = $tempProvee + $total;
          $fecha =  $row['fecha'];
          $fecha = strtotime($fecha);
          $fecha = date('Y-m-d',$fecha);
          array_push($arrayNombres,$fecha);
          array_push($arrayImportes,$a); 
         } 
          echo "<tr>"; 
          echo "<td>Ventas:</td>";
          echo "<td>".$a."</td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";      
          echo "</tr>";
        ?>
        </tbody>  

     </table>

               </div>
               </div>
      </div>

 <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Gráfico de venta de producto al cliente</h3></div>               
                  <div class="panel-body">
                    <div id="graph1"></div>
                    <script>
                    Morris.Line({
  element: 'graph1',
  data: [
                    <?php                      
                      $longitud = count($arrayNombres);
                      $cadena ="";
                      $cadena2 ="'";
                  echo("{ y:'");
                      for($i=0; $i<$longitud; $i++){
                       $cadena = $cadena.$arrayNombres[$i]."',a:".$arrayImportes[$i]."}, { y:'";
                       $cadena2 = "y:".$cadena2.$arrayNombres[$i]."','";
                     }

                     $cadena = substr($cadena, 0,-8);
                     //$cadena2 = substr($cadena2, 0,-2);
                     $cadena = $cadena."}";
                     echo $cadena;                       
                     ?> 
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Series A']
});
                   </script>
                 </div>                
              </div>
          </div>

</div>
  <div class="panel panel-primary unoInve">              
             <div class="panel-body">           

               <?php 
               ConectarBD();
               $sql = "SELECT * FROM tclientes";
               $result = mysql_query($sql);
                 while($row = mysql_fetch_assoc($result))
                   { 
                      echo "<a href=\"reporte-ciclo_cliente.php?id_clie_cod=".$row['fid']."\" type=\"button\" class=\"btn btn-default navbar-btn Boton-inf\"> ".$row['fnombre']." </a>";
                   } 
               ?>
             </div> 
           </div> 
  </div>
</div> <!-- wrapper-main-->

<?php  printfooter(); ?>
	
</body>
</html>
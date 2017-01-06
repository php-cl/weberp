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
  <!-- Libreria morris -->
  <script type="text/javascript" src="assets/js/morris/raphael-min.js"></script>
  <script type="text/javascript" src="assets/js/morris/morris.js"></script>
  <link rel="stylesheet" href="assets/js/morris/morris.css">


 

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
          <div class="col-lg-12">

       <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Inventario: <?php echo Date("Y-m-d"); ?></h3></div>               
               <div class="panel-body">
                      <div class="tabla">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>COD</th>
             <th>PRODUCTO</th>
             <th>CANT</th>
             <th>PRO</th>
             <th>U$/un</th> 
             <th>U$ totales</th>             
             <th>kg totales</th>
           </tr>
        </thead>
        <tbody>
            <?php            
              $sql="SELECT fcodigoproducto,sum(fcan) FROM tmov GROUP BY(fcodigoproducto)";
              $result = mysql_query($sql);
              $i=0;
              $PrecioTotal=0;
              $PesoTotal=0;
              $arrayNombres = array();
              $arrayImportes = array();

         while($row = mysql_fetch_assoc($result))
         { 
          if ($row['sum(fcan)'] > 0 ){
          $i++;          
          $codmy =$row['fcodigoproducto'];
          $nombre = DameNombreProducto($codmy);
          $myprecio = DamePrecioProducto($codmy);          
          $mypeso = DamePesoProducto($codmy);
          $Puntor = DamePuntoReorden($codmy);
          $PrecioTotal = $PrecioTotal+ $myprecio*$row['sum(fcan)'];
          $PesoTotal = $PesoTotal + $mypeso*$row['sum(fcan)'];
          
          if ($Puntor < $row['sum(fcan)'] ){
            echo "<tr>";  
          }
          else {
             echo "<tr class=\"danger\">";
          } 

          echo "<td>".$codmy."</td>";
          echo "<td>".$nombre."</td>";
          echo "<td>".$row['sum(fcan)']."</td>";
          echo "<td>".$Puntor."</td>";
          echo "<td>$".$myprecio."</td>";
          echo "<td>$".$myprecio*$row['sum(fcan)']."</td>";
          echo "<td>".$mypeso*$row['sum(fcan)']."</td>";
          echo "</tr>"; 
          array_push($arrayNombres,$nombre);
          array_push($arrayImportes,$row['sum(fcan)']);
          }   
         }     
            
          echo "<tr>"; 
          echo "<td> </td>";
          echo "<td> </td>";
          echo "<td> </td>";
          echo "<td> Total: </td>";
          echo "<td>$".$PrecioTotal."</td>";
          echo "<td>".$PesoTotal."</td>";
          echo "</tr>"; 


            ?>


        </tbody>  

     </table>

               </div>
             </div>
         </div>

         <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Gráfico de Inventario</h3></div>               
                  <div class="panel-body">
                    <div id="graph"></div>
                    <script>
                 Morris.Bar({
  element: 'graph',
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
  labels: ['Series A'],
  xLabelAngle: 70
});
                    </script>
                 </div>                
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
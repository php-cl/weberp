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

<div class="wrapper-main">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">

            <div class="panel panel-primary unoInve">              
             <div class="panel-body">
                 <button type="button" class="btn btn-default navbar-btn"><i class="fa fa-file-excel-o"></i> Excel</button>
                 <button type="button" class="btn btn-default navbar-btn"><i class="fa fa-file-pdf-o"></i>  PDF</button>
             </div> 
           </div> 


       <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Valores facturados por clientes:</h3> 
               </div>               
               <div class="panel-body">
                            <table class="table table-hover">
         <thead>
           <tr>
             <th>COD</th>
             <th>NOMBRE</th>
             <th>PAIS</th>
             <th>TELEFONO</th>
             <th>MAIL</th>
             <th>U$ totales</th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM tclientes WHERE 1";
              $result = mysql_query($sql);
              $i=0;
              $total=0;
              $arrayNombres = array();
              $arrayImportes = array();
         while($row = mysql_fetch_assoc($result))
         { 
          $i++;
          echo "<tr>"; 
          echo "<td>".$i."</td>";
          echo "<td>".$row['fnombre']."</td>";
          echo "<td>".$row['fpais']."</td>";
          echo "<td><a href=tel:\"".$row['ftelefono']."\">".$row['ftelefono']."</a></td>";   
          echo "<td> <a href=\"mailto:".$row['fmail']."\">".$row['fmail']."</a></td>";          
          $tempProvee = DameComprasProveedor($row['fnombre'])*-1;
          $total = $tempProvee + $total;
          echo "<td>$ ".$tempProvee."</td>";
          echo "</tr>"; 
          array_push($arrayNombres,$row['fnombre']);
          array_push($arrayImportes,$tempProvee); 
         }  
         echo "<td> </td>";
         echo "<td> </td>"; 
         echo "<td> </td>"; 
         echo "<td> </td>"; 
         echo "<td> Total:  </td>"; 
         echo "<td>$ ".$total."</td>";
            ?>
        </tbody>  

     </table>
               </div>
      </div>



            <div class="panel panel-primary dosInve">              
             <div class="panel-body">
                 <button type="button" class="btn btn-default navbar-btn"><i class="fa fa-file-excel-o"></i> Excel</button>
                 <button type="button" class="btn btn-default navbar-btn"><i class="fa fa-file-pdf-o"></i>  PDF</button>
             </div> 
           </div> 



 <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Gráfico de ventas por Clientes</h3></div>               
                  <div class="panel-body">
                    <h4>Clientes</h4>
                    <div id="graph1"></div>
                    <script>
                    Morris.Bar({
                      element: 'graph1',
                      data: [
                      <?php                      
                      $longitud = count($arrayNombres);
                      $cadena ="";
                      $cadena2 ="'";
                      echo("{x: 'Cantidades','");
                      for($i=0; $i<$longitud; $i++){
                       $cadena = $cadena.$arrayNombres[$i]."': ".$arrayImportes[$i].",'";
                       $cadena2 = $cadena2.$arrayNombres[$i]."','";
                     }
                     $cadena = substr($cadena, 0,-2);
                     $cadena2 = substr($cadena2, 0,-2);
                     $cadena = $cadena."}";
                     echo $cadena;                       
                     ?>                      
                      ],
                      xkey: 'x',
                      ykeys: [<?php echo $cadena2 ?>],
                      labels: [<?php echo $cadena2 ?>]
                    }).on('click', function(i, row){
                      console.log(i, row);
                    })
                    </script>
                 </div>                
              </div>
          </div>

</div>



       <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Valores de compras por Proveedor:</h3></div>               
               <div class="panel-body">
                     <table class="table table-hover">
         <thead>
           <tr>
             <th>COD</th>
             <th>NOMBRE</th>
             <th>PAIS</th>
             <th>TELEFONO</th>
             <th>MAIL</th>
             <th>U$ totales</th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM tproveedores WHERE 1";
              $result = mysql_query($sql);
              $i=0;
              $total=0;
              $arrayNombres = array();
              $arrayImportes = array();
         while($row = mysql_fetch_assoc($result))
         { 
          $i++;
          echo "<tr>"; 
          echo "<td>".$i."</td>";
          echo "<td>".$row['fnombre']."</td>";
          echo "<td>".$row['fpais']."</td>";
          echo "<td><a href=tel:\"".$row['ftelefono']."\">".$row['ftelefono']."</a></td>";
   
          echo "<td> <a href=\"mailto:".$row['fmail']."\">".$row['fmail']."</a></td>";
          
          $tempProvee = DameComprasProveedor($row['fnombre']);
          $total = $tempProvee + $total;
          echo "<td>$ ".$tempProvee."</td>";
          echo "</tr>";
          array_push($arrayNombres,$row['fnombre']);
          array_push($arrayImportes,$tempProvee);    
         }     
            
         echo "<td> </td>";
         echo "<td> </td>"; 
         echo "<td> </td>"; 
         echo "<td> </td>"; 
         echo "<td> Total:  </td>"; 
         echo "<td>$ ".$total."</td>";
            ?>
        </tbody>  

     </table>
               </div>
      </div>



         <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Gráfico de compras por Proveedores</h3></div>               
                  <div class="panel-body">
                    <h4>Proveedores</h4>
                    <div id="graph"></div>
                    <script>
                    Morris.Bar({
                      element: 'graph',
                      data: [
                      <?php                      
                      $longitud = count($arrayNombres);
                      $cadena ="";
                      $cadena2 ="'";
                      echo("{x: 'Cantidades','");
                      for($i=0; $i<$longitud; $i++){
                       $cadena = $cadena.$arrayNombres[$i]."': ".$arrayImportes[$i].",'";
                       $cadena2 = $cadena2.$arrayNombres[$i]."','";
                     }
                     $cadena = substr($cadena, 0,-2);
                     $cadena2 = substr($cadena2, 0,-2);
                     $cadena = $cadena."}";
                     echo $cadena;                       
                     ?>                      
                      ],
                      xkey: 'x',
                      ykeys: [<?php echo $cadena2 ?>],
                      labels: [<?php echo $cadena2 ?>]
                    }).on('click', function(i, row){
                      console.log(i, row);
                    })
                    </script>
                 </div>                
              </div>
         


             <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title">Temp</h3></div>               
               <div class="panel-body">
                <div id="graph31232"></div>
                <script>
                Morris.Bar({
                      element: 'graph31232',
                      data: [ 
                      {x: 'uno', y: 0},{x: 'dos', y: 1},{x: 'tres', y: 3}
                      ],
                      xkey: 'x',
                      ykeys: ['y'],
                      labels: ['y']
                    })
                    </script>
              </div> 
            </div> 











          </div> 

        </div>

      </div>






        </div>   
      </div>
  </div>
</div> <!-- wrapper-main-->

<?php  printfooter(); ?>
	
</body>
</html>
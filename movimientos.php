<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>weberp | Movimientos </title>  
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
          <div class="col-lg-12">

       <div class="panel panel-success">
               <div class="panel-heading"><h3 class="panel-title">Movimientos</h3></div>               
               <div class="panel-body">
                      <div class="tabla">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>No DOCUMENTO</th>
             <th>CANT</th>
             <th>CLIENTE/PROVEEDOR</th>
             <th>ID</th>
             <th>FECHA</th>
             <th>COD</th>
             <th>PRODUCTO</th>
             <th>DEL</th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM tmov WHERE 1 ORDER BY fid";
              $result = mysql_query($sql);
              $i=0;
         while($row = mysql_fetch_assoc($result))
         { 
          $i++;
          echo "<tr>"; 
          echo "<td>".$row['fnodocumento']."</td>";
          echo "<td>".$row['fcan']."</td>";
          echo "<td>".$row['quie']."</td>";
          echo "<td>".$row['id_quien']."</td>";
          echo "<td>".$row['fecha']."</td>";
          echo "<td>".$row['fcodigoproducto']."</td>";
          $temp = DameNombreProducto($row['fcodigoproducto']);
          echo "<td>".$temp."</td>";          
          echo "<td class=\"img_class\"><a onclick=\"return confirm('¿Quieres eliminar el Registro?');\" href=\"assets/include/function.php?fid_mov=".$row['fid']."\"><img src=\"assets/img/bdelete.png\"></a></td>";
          echo "</tr>";    
         }     
        ?>
        </tbody>  

     </table>

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
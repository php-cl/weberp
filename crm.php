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


     <script>
   $(document).ready(function(){

   }) 
   </script>





<div class="wrapper-main">

  <div class="container">
      <div class="row">

          <div class="col-lg-4">
   
         <div class="panel panel-success">
               <div class="panel-heading"><h3 class="panel-title">4.2 Insertar Tarea</h3></div>              
               <div class="panel-body">
                <form class="form-signin" action="assets/include/function.php" method="POST">
                <div class="form-group">          
                  <input class="form-control inputfill  botonsup" type="text" name="tNombretarea" placeholder="NOMBRE" autofocus required><br>
                  <input class="form-control inputfill  botonsup" type="text" name="testado" placeholder="ESTADO" required><br>
               </div> 
                  <div class="form-group">
                    <textarea name="tpasos" id="" rows="10" placeholder="PASOS" class="mytexare form-control" required></textarea>
                  </div>

                  <input class="form-control inputfill  botonsup" type="text" name="tfecha" placeholder="FECHA" required><br>
                                 
                <div class="form-group">
                  <input class="botones btn btn-default" type="submit" value="Insertar">
                </div>
                </form>
               </div>
         </div>
          </div>

          <div class="col-lg-8">
             <div class="panel panel-success">
               <div class="panel-heading"><h3 class="panel-title">4.3 Customer Relationship Management: <?php echo Date("Y-m-d"); ?></h3></div>               
               <div class="panel-body">
                      <div class="tabla">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>ID</th>
             <th>NOMBRE</th>
             <th>ESTADO</th>
             <th>PASOS</th>
             <th>FECHA</th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM crm WHERE 1 ORDER by fnombreTarea";
              $result = mysql_query($sql);
              $i=0;
         while($row = mysql_fetch_assoc($result))
         { 
          $i++;

                    $datetime1 = date_create(Date("Y-m-d"));
          $datetime2 = date_create($row['fecha']);
          $interval = date_diff($datetime1,$datetime2);
          $temp = substr($interval->format('%R%a'),1); 


                  if ($temp < 30 ){
            echo "<tr>";  
          }
          else {
             echo "<tr class=\"danger\">";
          }
          echo "<td>".$i."</td>";
          echo "<td>".$row['fnombreTarea']."</td>";
          echo "<td>".$row['festado']."%"."</td>";
          
          


          echo "<td>".nl2br($row['fpasos'])."</br>"."<p class=\"testrojo\">Cantidad de días:".substr($interval->format('%R%a'),1)."</p>"."</td>";

          echo "<td>".$row['fecha']."</td>";
                   //echo "<td>".$row['fmail']."</td>";
          echo '<th scope="row">'.'<a href="assets/include/function.php?fid_tarea='.$row['fid'].'"><img src="assets/img/bedit.png"></a>'.'</th>';
          echo "<td class=\"img_class\"><a onclick=\"return confirm('¿Quieres eliminar el Registro?');\" href=\"assets/include/function.php?fid_taream=".$row['fid']."\"><img src=\"assets/img/bdelete.png\"></a></td>";
          


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
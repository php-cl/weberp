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
          <div class="col-lg-12">

       <div class="panel panel-primary">
               <div class="panel-heading"><h3 class="panel-title"><?php echo CONF_TEXT ?></h3></div>               
               <div class="panel-body">
                <form class="form-signin" action="assets/include/function.php" method="POST">
                  <div class="form-group "> 
                  <p><?php echo CONF_IDIOMA ?>: <?php echo DameIdiomaActual() ?></p>  
              
                  <div class="input-group" ><span class="input-group-addon"><?php echo CONF_IDIOMA_SEL ?></span>
                         <select class="form-control inputfill  botonsup" type="text" name="tlang" placeholder="Idioma" autofocus>
                           <?php rellenarIdioma() ?>
                       </select>
                   </div>
                 <br>
                  <input class="botones btn btn-default" type="submit" value="<?php echo CONF_SALVAR ?>">
                  </div>
                </form>
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
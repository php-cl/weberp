<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>weberp | Cliente </title>  
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
   <!-- Libreria angular -->
  <script type="text/javascript" src="assets/js/angular.min.js"></script>     


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
          <div class="col-lg-4">
         <div class="panel panel-primary">
             	 <div class="panel-heading"><h3 class="panel-title"><?php echo CLIENTE_TEXT ?></h3></div>             	
             	 <div class="panel-body">
                <form class="form-signin" action="assets/include/function.php" method="POST" name="nform" ng-app>
                  <div class="form-group ">

                    <div class="input-group" > 
                      <span class="input-group-addon"><?php echo CLIENTE_NOMBRE ?></span>         
                      <input class="form-control inputfill  botonsup" type="text" name="tfnombre" placeholder="<?php echo CLIENTE_NOMBRE ?>" ng-model="m.Nombre" required  >
                    </div> <br>

                    <div class="input-group">
                     <span class="input-group-addon"><?php echo CLIENTE_EMPRESA ?></span>  
                     <input class="form-control inputfill  botonsup" type="text" name="tfempresa" ng-model="m.Empresa" required placeholder="<?php echo CLIENTE_EMPRESA ?>"><br>              	 		
                   </div> <br>
                   <div class="input-group">
                     <span class="input-group-addon"><?php echo CLIENTE_DIRECCION ?></span> 
                     <input class="form-control inputfill  botonsup" type="text" name="tfdireccion" ng-model="m.Direccion" required placeholder="<?php echo CLIENTE_DIRECCION ?>"><br>
                   </div>	<br>
                   <div class="input-group">
                     <span class="input-group-addon"><?php echo CLIENTE_PAIS ?></span>                
                     <input class="form-control inputfill  botonsup" type="text" name="tfpais" ng-model="m.Pais" required placeholder="<?php echo CLIENTE_PAIS ?>"><br>
                   </div>  <br>	

                   <div class="input-group">
                     <span class="input-group-addon"><?php echo CLIENTE_TELEFONO ?></span>  
                     <input class="form-control inputfill  botonsup" type="text" name="tftelefono" ng-model="m.Telefono" required placeholder="<?php echo CLIENTE_TELEFONO ?>"><br>
                   </div>  <br>	
                   <div class="input-group">
                     <span class="input-group-addon"><?php echo CLIENTE_MAIL ?></span> 
                     <input class="form-control inputfill  botonsup" type="email" name="tfmail" ng-model="m.Mail"  required placeholder="<?php echo CLIENTE_MAIL ?>"><br>
                   </div>  <br> 
                   <div class="input-group">
                     <span class="input-group-addon"><?php echo CLIENTE_FECHA_NAC ?></span>   
                     <input class="form-control inputfill  botonsup" type="text" name="tfnacimiento" required placeholder="<?php echo CLIENTE_FECHA_NAC ?>"><br>
                   </div>  <br>
                   <div class="input-group">
                     <span class="input-group-addon"><?php echo CLIENTE_TIPO_CLIENTE ?></span>   
                     <input class="form-control inputfill  botonsup" type="text" name="tTipo" required placeholder="<?php echo CLIENTE_TIPO_CLIENTE ?>"><br>
                   </div>  <br>
                   
                 </div>             	 	
                 <div class="form-group">
                   <input class="botones btn btn-default" type="submit" value="<?php echo CLIENTE_INSERTAR ?>" ng-disabled="nform.$invalid">
                 </div>
               </form>
             </div>
           </div>
         </div>

          <div class="col-lg-8">
             <div class="panel panel-primary">
             	 <div class="panel-heading"><h3 class="panel-title"><?php echo CLIENTE_LISTADO ?></h3></div>             	
             	 <div class="panel-body">
                      <div class="tabla">
       <table class="table table-hover">
         <thead>
           <tr>
             <th><?php echo CLIENTE_CODIGO ?></th>
             <th><?php echo CLIENTE_NOMBRE1 ?></th>
             <th><?php echo CLIENTE_TELEFONO1 ?></th>
             <th><?php echo CLIENTE_MAIL1?></th>
             <th><?php echo CLIENTE_EDT ?></th>
             <th><?php echo CLIENTE_DEL ?></th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM tclientes WHERE 1 ORDER BY fnombre";
              $result = mysql_query($sql);
              $i=0;
         while($row = mysql_fetch_assoc($result))
         { 
          $i++;
          echo "<tr>"; 
          echo "<td>".$i."</td>";
          echo "<td><a class=\"link-black\" href=\"reporte-ciclo_cliente.php?id_clie_cod=".$row['fid']."\">".$row['fnombre']."</a></td>";
          echo "<td><a href=tel:\"".$row['ftelefono']."\">".$row['ftelefono']."</a></td>";   
          echo "<td> <a href=\"mailto:".$row['fmail']."\">".$row['fmail']."</a></td>";
          echo '<th scope="row">'.'<a id='.$row['fid'].' class="vinculo" href="assets/include/function.php?id_cliente_editar='.$row['fid'].'"><img src="assets/img/bedit.png"></a>'.'</th>';
          echo "<td class=\"img_class\"><a onclick=\"return confirm('¿Quieres eliminar el Registro?');\" href=\"assets/include/function.php?id_usuario=".$row['fid']."\"><img src=\"assets/img/bdelete.png\"></a></td>";
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


<!-- Button trigger modal 
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
-->

<script>
var a = 0;
</script>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:2000">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Cliente</h4>
      </div>
      <div class="modal-body">
        <?php //echo "kaka" ?>
        <script> 
             // document.write('Hola');
             // document.write(a);
             // alert(a);
        </script>

        <form class="form-signin" action="assets/include/function.php" method="POST" name="nform" id="formulario" ng-app>
                <div class="form-group ">
               
                <div class="input-group" > 
                  <span class="input-group-addon">ID</span>         
                  <input class="form-control inputfill  botonsup" id="fid" type="text" name="tfid" placeholder="" ng-model="m.id" readonly required >
                </div> <br>


                <div class="input-group" > 
                  <span class="input-group-addon">Nombre</span>         
                  <input class="form-control inputfill  botonsup" id="fnombre" type="text" name="tfnombre1" placeholder="" ng-model="m.Nombre" required  >
                </div> <br>
               
               <div class="input-group">
               <span class="input-group-addon">Empresa</span>  
                  <input class="form-control inputfill  botonsup" id="fempresa"  type="text" name="tfempresa1" ng-model="m.Empresa" required><br>                   
                </div> <br>
               <div class="input-group">
               <span class="input-group-addon">Direccion</span> 
                  <input class="form-control inputfill  botonsup" id="fdireccion"  type="text" name="tfdireccion1" ng-model="m.Direccion" required><br>
               </div> <br>
               <div class="input-group">
               <span class="input-group-addon">Pais</span>                
                  <input class="form-control inputfill  botonsup" id="fpais"  type="text" name="tfpais1" ng-model="m.Pais" required><br>
                </div>  <br>  
                 
               <div class="input-group">
               <span class="input-group-addon">Teléfono</span>  
                  <input class="form-control inputfill  botonsup" id="ftelefono"  type="text" name="tftelefono1" ng-model="m.Telefono" required><br>
               </div>  <br> 
               <div class="input-group">
               <span class="input-group-addon">Mail</span> 
                  <input class="form-control inputfill  botonsup" id="fmail" type="email" name="tfmail1" ng-model="m.Mail"  required><br>
                </div>  <br> 
                               <div class="input-group">
               <span class="input-group-addon">Fecha nacimiento</span>   
                  <input class="form-control inputfill  botonsup" id="fnacimiento" type="text" name="tfnacimiento1" required><br>
               </div>  <br> 


                                              <div class="input-group">
               <span class="input-group-addon">Tipo</span>   
                  <input class="form-control inputfill  botonsup" id="Tipo" type="text" name="tfTipo" required><br>
               </div>  <br> 

                </div> 

                <script>

                </script>             
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary salvar" type="submit" data-dismiss="modal">Save changes</button>
        <p id="#status"></p>
      </div>
    </div>
  </div>
</div>

<?php  printfooter();  
//ob_end_flush();
?>

<script>
var a = 12334;
var c = 12334;
$(document).ready(function(){  

$(".salvar").click(function(e){
     var datos = $("#formulario").serialize();//Serializamos los datos a enviar
     $.ajax({
   type: "POST", //Establecemos como se van a enviar los datos puede POST o GET
   url: "assets/include/function.php", //SCRIPT que procesara los datos, establecer ruta relativa o absoluta
   data: datos, //Variable que transferira los datos
   beforeSend: function() {//Función que se ejecuta antes de enviar los datos
      $("#status").html("Enviando...."); //Mostrar mensaje que se esta procesando el script
   },
   dataType: "html",
   success: function(datos){ //Funcion que retorna los datos procesados del script PHP
      if(datos == 1){ //Dato que proviene del script php
         $("#status").html("Script procesado satisfactoriamente"); //Mensaje de Satisfacción
         location.reload();
      }else{ //Dato que proviene del script php

         $("#status").html("Error al procesar script"); //Mensaje de error
         alert(datos);
      }
   }
   });
     //alert('Salvado');
});

 /////////////// 1- Boton Abrir Editar Cliente  ///////////////////
  $(".vinculo").click(function(e){
    e.preventDefault();
    a =  $(this).attr('id');
    function rellenar(atemp){
     $.ajax({
      type: "GET",
      url: "assets/include/function.php",
      data: {imgsrc: a , tipo: atemp}
    }).done(function(data) {
       //alert(data);
       c = data;
       $(atemp).val(c);
     });    
  }
  rellenar("#fid");
  rellenar("#fdireccion");
  rellenar("#fempresa");
  rellenar("#fmail");
  rellenar("#fnacimiento");
  rellenar("#fnombre");
  rellenar("#fpais");
  rellenar("#ftelefono");
  rellenar("#Tipo");
  $('#myModal').modal('show');
})
 /////////////// 1- Boton Abrir Editar Cliente  ///////////////////

})
</script>


</body>
</html>
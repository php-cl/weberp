<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>weberp | Proveedores </title>  
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
         <div class="panel panel-success">
             	 <div class="panel-heading"><h3 class="panel-title"><?php echo PROVEEDOR_TEXT ?></h3></div>             	
             	 <div class="panel-body">
                <form class="form-signin" action="assets/include/function.php" method="POST" name="nform" ng-app>
             	 	<div class="form-group ">          
             	 		 <div class="input-group" >
                    <span class="input-group-addon"><?php echo CLIENTE_NOMBRE ?></span> 
                     <input class="form-control inputfill  botonsup" type="text" name="tfnombrep" placeholder="<?php echo CLIENTE_NOMBRE1 ?>" required ng-model="m.Nombre"><br>
             	 		 </div> <br>                  
                  <div class="input-group" ><span class="input-group-addon"><?php echo CLIENTE_EMPRESA ?></span>
                  <input class="form-control inputfill  botonsup" type="text" name="tfempresa" placeholder="<?php echo CLIENTE_EMPRESA ?>" required ng-model="m.Empresa"><br>              	 		
             	 		</div> <br>
                  <div class="input-group" ><span class="input-group-addon"><?php echo CLIENTE_DIRECCION ?></span>
                  <input class="form-control inputfill  botonsup" type="text" name="tfdireccion" placeholder="<?php echo CLIENTE_DIRECCION1 ?>" required ng-model="m.Direccion"><br>
             	 		</div> <br>
                  <div class="input-group" ><span class="input-group-addon"><?php echo CLIENTE_PAIS ?></span>
                  <input class="form-control inputfill  botonsup" type="text" name="tfpais" placeholder="<?php echo CLIENTE_PAIS1 ?>" required ng-model="m.pais"><br>
             	 		</div> <br>
                  <div class="input-group" ><span class="input-group-addon"><?php echo CLIENTE_TELEFONO ?></span>
                  <input class="form-control inputfill  botonsup" type="text" name="tftelefono" placeholder="<?php echo CLIENTE_TELEFONO1 ?>" required ng-model="m.telefono"><br>
             	 		</div> <br>
                  <div class="input-group" ><span class="input-group-addon"><?php echo CLIENTE_MAIL ?></span>
                  <input class="form-control inputfill  botonsup" type="email" name="tfmail" placeholder="<?php echo CLIENTE_MAIL1 ?>" required ng-model="m.Mail"><br>
             	 		</div> <br>
                  <div class="input-group" ><span class="input-group-addon"><?php echo CLIENTE_FECHA_NAC ?></span>
                  <input class="form-control inputfill  botonsup" type="text" name="tfnacimiento" placeholder="<?php echo CLIENTE_FECHA_NAC ?>" required ng-model="m.fnac"><br>
             	 	  </div> <br>
                </div>             	 	
             	 	<div class="form-group">
             	 		<input class="botones btn btn-default" type="submit" value="<?php echo CLIENTE_INSERTAR ?>" ng-disabled="nform.$invalid">
             	 	</div>
             	 	</form>
             	 </div>
         </div>
          </div>

          <div class="col-lg-8">
             <div class="panel panel-success">
             	 <div class="panel-heading"><h3 class="panel-title"><?php echo PROVEEDOR_LISTADO ?></h3></div>             	
             	 <div class="panel-body">
                      <div class="tabla">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>COD</th>
             <th>NOMBRE</th>
             <th>PAIS</th>
             <th>TELEFONO</th>
             <th>MAIL</th>
             <th>EDT</th>
             <th>DEL</th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM tproveedores WHERE 1 ORDER BY fnombre";
              $result = mysql_query($sql);
              $i=0;
         while($row = mysql_fetch_assoc($result))
         { 
          $i++;
          echo "<tr>"; 
          echo "<td>".$i."</td>";
          echo "<td>".$row['fnombre']."</td>";
          echo "<td>".$row['fpais']."</td>";
          echo "<td><a href=tel:\"".$row['ftelefono']."\">".$row['ftelefono']."</a></td>";

   
          echo "<td> <a href=\"mailto:".$row['fmail']."\">".$row['fmail']."</a></td>";
         //echo "<td>".$row['fmail']."</td>";
          echo '<th scope="row">'.'<a id='.$row['fid'].' class="vinculo2" href="assets/include/function.php?id_usuarioe='.$row['fid'].'"><img src="assets/img/bedit.png"></a>'.'</th>';
          echo "<td class=\"img_class\"><a onclick=\"return confirm('¿Quieres eliminar el Registro?');\" href=\"assets/include/function.php?id_usuariop=".$row['fid']."\"><img src=\"assets/img/bdelete.png\"></a></td>";
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




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:2000">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Proveedores</h4>
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
                  <input class="form-control inputfill  botonsup" id="fid" type="text" name="tfid2" placeholder="" ng-model="m.id" readonly required >
                </div> <br>


                <div class="input-group" > 
                  <span class="input-group-addon">Nombre</span>         
                  <input class="form-control inputfill  botonsup" id="fnombre" type="text" name="tfnombre2" placeholder="" ng-model="m.Nombre" required  >
                </div> <br>
               
               <div class="input-group">
               <span class="input-group-addon">Empresa</span>  
                  <input class="form-control inputfill  botonsup" id="fempresa"  type="text" name="tfempresa2" ng-model="m.Empresa" required><br>                   
                </div> <br>
               <div class="input-group">
               <span class="input-group-addon">Direccion</span> 
                  <input class="form-control inputfill  botonsup" id="fdireccion"  type="text" name="tfdireccion2" ng-model="m.Direccion" required><br>
               </div> <br>
               <div class="input-group">
               <span class="input-group-addon">Pais</span>                
                  <input class="form-control inputfill  botonsup" id="fpais"  type="text" name="tfpais2" ng-model="m.Pais" required><br>
                </div>  <br>  
                 
               <div class="input-group">
               <span class="input-group-addon">Teléfono</span>  
                  <input class="form-control inputfill  botonsup" id="ftelefono"  type="text" name="tftelefono2" ng-model="m.Telefono" required><br>
               </div>  <br> 
               <div class="input-group">
               <span class="input-group-addon">Mail</span> 
                  <input class="form-control inputfill  botonsup" id="fmail" type="email" name="tfmail2" ng-model="m.Mail"  required><br>
                </div>  <br> 
                               <div class="input-group">
               <span class="input-group-addon">Fecha nacimiento</span>   
                  <input class="form-control inputfill  botonsup" id="fnacimiento" type="text" name="tfnacimiento2" required><br>
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
  $(".vinculo2").click(function(e){
    e.preventDefault();
    a =  $(this).attr('id');
    function rellenar2(atemp){
     $.ajax({
      type: "GET",
      url: "assets/include/function.php",
      data: {imgsrc2: a , tipo: atemp}
    }).done(function(data) {
       //alert(data);
       c = data;
       $(atemp).val(c);
     });    
  }
  rellenar2("#fid");
  rellenar2("#fdireccion");
  rellenar2("#fempresa");
  rellenar2("#fmail");
  rellenar2("#fnacimiento");
  rellenar2("#fnombre");
  rellenar2("#fpais");
  rellenar2("#ftelefono");
  $('#myModal').modal('show');
})
 /////////////// 1- Boton Abrir Editar Cliente  ///////////////////

})
</script>


<?php  printfooter();  

?>
	
</body>
</html>
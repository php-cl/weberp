<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>weberp | Productos</title>  
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
   
         <div class="panel panel-warning">
             	 <div class="panel-heading"><h3 class="panel-title">3.2 Insertar Producto</h3></div>             	
             	 <div class="panel-body">
                <form class="form-signin" action="assets/include/function.php" name="nform" method="POST" ng-app>
             	 	<div class="form-group ">          
             	 		<div class="input-group" ><span class="input-group-addon">Código</span>
                  <input class="form-control inputfill  botonsup" type="text" name="tCodigo" placeholder="CODIGO" autofocus required ng-model="m.cod"><br>                  
                  </div> <br><div class="input-group" ><span class="input-group-addon">Nombre</span>
                  <input class="form-control inputfill  botonsup" type="text" name="tNombre" placeholder="NOMBRE" required ng-model="m.Nombre"><br>
                  </div> <br><div class="input-group" ><span class="input-group-addon">UM</span>
                  <input class="form-control inputfill  botonsup" type="text" name="tUM" placeholder="UM" required ng-model="m.um"><br>
                </div> <br><div class="input-group" ><span class="input-group-addon">Peso</span>
                  <input class="form-control inputfill  botonsup" type="text" name="tPESO" placeholder="PESO(kg)" required ng-model="m.peso"><br>
                </div> <br><div class="input-group" ><span class="input-group-addon">Precio</span>
                  <input class="form-control inputfill  botonsup" type="text" name="tPRECIO" placeholder="PRECIO" required ng-model="m.Precio"><br>
                </div> <br><div class="input-group" ><span class="input-group-addon">Punto de Reorden</span>
                  <input class="form-control inputfill  botonsup" type="text" name="tPRO" placeholder="Punto de Reorden" required ng-model="m.Preorden"><br>
               	  </div> <br>
                 </div>             	 	
             	 	<div class="form-group">
             	 		<input class="botones btn btn-default" type="submit" value="Insertar" ng-disabled="nform.$invalid">
             	 	</div>
             	 	</form>
             	 </div>
         </div>
          </div>

          <div class="col-lg-8">
             <div class="panel panel-warning">
             	 <div class="panel-heading"><h3 class="panel-title">3.3 Listado de Productos</h3></div>             	
             	 <div class="panel-body">
                      <div class="tabla">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>COD</th>
             <th>NOMBRE</th>
             <th>UM</th>
             <th>Kg/un</th>
             <th>U$/un</th>
             <th>EDT</th>
             <th>DEL</th>
           </tr>
        </thead>
        <tbody>
            <?php 
              $sql="SELECT * FROM tproductos WHERE 1 ORDER BY fcodigo";
              $result = mysql_query($sql);
              $i=0;
         while($row = mysql_fetch_assoc($result))
         { 
          $i++;
          echo "<tr>"; 
          echo "<td>".$row['fcodigo']."</td>";
          echo "<td><a class=\"link-black\" href=\"reporte-ciclo_producto.php?id_prod_cod=".$row['fcodigo']."\">".$row['fnombre']."</a></td>";
          echo "<td>".$row['fum']."</td>";
          echo "<td>".$row['fpeso']."</td>";
          echo "<td>".$row['fprecio']."</td>";
          
         //echo "<td>".$row['fmail']."</td>";
          echo '<td scope="row">'.'<a id='.$row['id'].' class="vinculo3" href="#"><img src="assets/img/bedit.png"></a>'.'</td>';
          
          //echo '<th scope="row">'.'<a id='.$row['fid'].' class="vinculo" href="assets/include/function.php?id_cliente_editar='.$row['fid'].'"><img src="assets/img/bedit.png"></a>'.'</th>';    
          echo "<td class=\"img_class\"><a onclick=\"return confirm('¿Quieres eliminar el Registro?');\" href=\"assets/include/function.php?id_producto=".$row['id']."\"><img src=\"assets/img/bdelete.png\"></a></td>";
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
        <h4 class="modal-title" id="myModalLabel">Actualizar Producto</h4>
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
                  <input class="form-control inputfill  botonsup" id="id" type="text" name="PrID" placeholder="" ng-model="m.id" readonly required >
                </div> <br>


                <div class="input-group" > 
                  <span class="input-group-addon">Codigo</span>         
                  <input class="form-control inputfill  botonsup" id="fcodigo" type="text" name="PrCodigo" placeholder="" ng-model="m.codi" required  >
                </div> <br>
               
               <div class="input-group">
               <span class="input-group-addon">Nombre</span>  
                  <input class="form-control inputfill  botonsup" id="fnombre"  type="text" name="PrNombre" ng-model="m.nombre" required><br>                   
                </div> <br>
               <div class="input-group">
               <span class="input-group-addon">UM</span> 
                  <input class="form-control inputfill  botonsup" id="fum"  type="text" name="Prum" ng-model="m.um" required><br>
               </div> <br>
               <div class="input-group">
               <span class="input-group-addon">Peso</span>                
                  <input class="form-control inputfill  botonsup" id="fpeso"  type="text" name="PrPeso" ng-model="m.Peso" required><br>
                </div>  <br>  
                 
               <div class="input-group">
               <span class="input-group-addon">Precio</span>  
                  <input class="form-control inputfill  botonsup" id="fprecio"  type="text" name="PrPrecio" ng-model="m.Precio" required><br>
               </div>  <br> 
               <div class="input-group">
               <span class="input-group-addon">Punto de reorden</span> 
                  <input class="form-control inputfill  botonsup" id="Preorden" type="email" name="PrPuntoReorden" ng-model="m.Pr"  required><br>
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
           location.reload();
         }
   }
   });
     //alert('Salvado');
});

 /////////////// 1- Boton Abrir Editar Cliente  ///////////////////
  $(".vinculo3").click(function(e){
    e.preventDefault();
    a =  $(this).attr('id');
    function rellenar3(atemp){
     $.ajax({
      type: "GET",
      url: "assets/include/function.php",
      data: {idproducto: a , tipo: atemp}
    }).done(function(data) {       
       c = data;
       $(atemp).val(c);
       //$("#fid").val("12");
       //alert(c);
     });    
  }
  rellenar3("#id");
  rellenar3("#fcodigo");
  rellenar3("#fnombre");
  rellenar3("#fum");
  rellenar3("#fpeso");
  rellenar3("#fprecio");
  rellenar3("#Preorden");
  $('#myModal').modal('show');
})
 /////////////// 1- Boton Abrir Editar Cliente  ///////////////////

})
</script>


<?php  printfooter();  

?>
	
</body>
</html>
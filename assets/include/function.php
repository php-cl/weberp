<?php

require_once("ini.php");

if (file_exists("assets/lang/".DameIdiomaActual().".php"))
{
   require_once("assets/lang/".DameIdiomaActual().".php");
}


function notificar($text){
  echo "<div class=\"modal fade bs-example-modal-sm\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-sm\">
  <div class=\"modal-content\">
  <h1>Hello</h1>
  </div>
  </div>
  </div>
  ";
}

//
//  {0} Funciones generales  ------------------------------------------------
//

// {0.1} Funcion para conectar con la base de Datos
function ConectarBD(){ 
  $con = "";  
  $con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
  if(!$con){
    die("Error al conectarse:".mysql_error());
  }
  mysql_select_db(DB_NAME,$con); 
  mysql_query("SET NAMES 'utf8'",$con);
}



// {0.1} Funcion para login
if($_POST)
{
  if (isset($_POST['fusuario']))
  {
   session_start();
   $temp_usuario = $_POST['fusuario'];
   $temp_pass = md5($_POST['fpass']);

   ConectarBD();
   $sql = "SELECT * from tusuarios WHERE fname = '$temp_usuario' and  fpass = '$temp_pass'";
   $query = mysql_query($sql);
  if($row = mysql_fetch_assoc($query))
   {
    $_SESSION['name_erp'] = $temp_usuario;
    echo $_SESSION['name_erp'];
    header('location:../../index.php');
   } 

  else{
    echo $sql;
    header('location:../../index.php');
  } 

}
}






// {0.2} Funcion para imprimir el menu
function printmenu(){
  echo "<div class=\"wrapper-menu-sup\">";
  echo "<div class=\"container\">";
  echo "  <br> ";
  echo "  <nav class=\"navbar navbar-default\">";
  echo "    <div class=\"container-fluid\">";
  echo "      <div class=\"navbar-header\">";
  echo "        <button class=\"navbar-toggle collapsed\" data-target=\"#bs-example-navbar-collapse-2\" data-toggle=\"collapse\" type=\"button\">";
  echo "          <span class=\"sr-only\">Toggle navigation</span>";
  echo "          <span class=\"icon-bar\"></span>";
  echo "          <span class=\"icon-bar\"></span>";
  echo "          <span class=\"icon-bar\"></span>";
  echo "        </button>";
  echo "        <a class=\"navbar-brand\" href=\"index.php\">WEB-ERP</a>";
  echo "      </div>";
  echo "      <div id=\"bs-example-navbar-collapse-2\" class=\"collapse navbar-collapse\">";
  echo "        <nav>";
  echo "          <ul class=\"nav navbar-nav\">";


  echo " <li class=\"dropdown\">";
  echo "        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".TEXT_MAESTRO."<span class=\"caret\"></span></a>";
  echo "        <ul class=\"dropdown-menu\" role=\"menu\">";
  echo "            <li><a href=\"clientes.php\">".TEXT_MAESTROS_CLIENTES."</a></li>  ";               
  echo "            <li><a href=\"proveedores.php\">".TEXT_MAESTROS_PROVEEDORES."</a></li>";
  echo "            <li><a href=\"productos.php\">".TEXT_MAESTROS_PRODUCTOS."</a></li>";
  echo "       </ul>";
  echo "     </li>";

  echo " <li class=\"dropdown\">";
  echo "        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".TEXT_MOVIMIENTOS."<span class=\"caret\"></span></a>";
  echo "        <ul class=\"dropdown-menu\" role=\"menu\">";
  echo "            <li><a href=\"entradas.php\">".TEXT_MOVIMIENTOS_ENTRADAS."</a></li>";
  echo "            <li><a href=\"salidas.php\">".TEXT_MOVIMIENTOS_SALIDAS."</a></li>";
  echo "         <li class=\divider\"></li>";
  echo "        <li class=\"divider\"></li>";
  echo "            <li><a href=\"movimientos.php\">".TEXT_MOVIMIENTOS_MOV."</a></li>";
  echo "       </ul>";
  echo "     </li>";
  echo "            <li><a href=\"conf.php\">CONF</a></li>";
  echo "            <li><a href=\"inventario.php\">".TEXT_INVENTARIO."</a></li>";

  echo " <li class=\"dropdown\">";
  echo "        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".TEXT_REPORTES."<span class=\"caret\"></span></a>";
  echo "        <ul class=\"dropdown-menu\" role=\"menu\">";
  echo "            <li><a href=\"reporte-ventas-clientes.php\">".TEXT_VENTAS_POR_CLIENTES."</a></li>  ";               
  echo "            <li><a href=\"reporte-compras-por-proveedores.php\">".TEXT_COMP_POR_PROVEEDOR."</a></li>";
  echo "            <li class=\"divider\"></li>";
  echo "            <li><a href=\"reporte-ciclo_producto.php\">".TEXT_CICLOS."</a></li>";
  echo "            <li><a href=\"reporte-ciclo_cliente.php\">".TEXT_CICLOS2."</a></li>";
  echo "       </ul>";
  echo "     </li>";


  echo "            <li><a href=\"crm.php\">CRM</a></li>";
  
  echo "            <li><a onclick=\"return confirm('¿Quieres realmente salir?');\" href=\"assets/include/logout.php\"><span class=\"glyphicon glyphicon-off\" aria-hidden=\"true\"></span> ".TEXT_CERRAR."</a></li>";   
  echo "          </ul>";
  echo "        </nav>";
  echo "      </div>";
  echo "    </div>";
  echo "  </nav>";
  echo "</div> ";  
  echo "</div>";
 // echo " <script>";
 // echo "  $(document).ready(function(){ ";   
 // echo "    $('li').each(function(){";
 // echo "    if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1)";
 // echo "    {";
 // echo "      $(this).addClass('active').siblings().removeClass('active');";
 // echo "    }";
 // echo "    });";
 // echo "  })";
 // echo "  </script>";
}

// {0.3} Funcion para imprimir el pie de página
function printfooter(){


echo "   <div id=\"toTop\" class=\"back-to-top\" style=\"display:block;\">"; 
echo "   <span class=\"glyphicon glyphicon-chevron-up\" aria-hidden=\"true\"></span> "; 
echo " </div>";
echo " <script>";  
echo "  $(document).ready(function() {";
echo "   var offset = 220;";
echo "   var duration = 500;";
echo "   $(window).scroll(function() {";
echo "     if ($(this).scrollTop() > offset) {";
echo "       $('.back-to-top').fadeIn(duration);";
echo "     } else {";
echo "       $('.back-to-top').fadeOut(duration);";
echo "     }";
echo "   });";
echo "   $('.back-to-top').click(function(event) {";
echo "     event.preventDefault();";
echo "     $('html, body').animate({scrollTop: 0}, duration);";
echo "     return false;";
echo "   })";
echo " });";
echo " </script>";


  echo "  <div class=\"wrapper-footer\">";
  echo "  <div class=\"container\">";
  echo "    <div class=\"footer-int\">";
  echo "      <p>@ 2015 Marlon Falcón Hernández</p>";
  echo "      <a href=\"http://www.marlonfalcon.cl\"><p>www.marlonfalcon.cl</p></a>";
  echo "    </div>";
  echo "  </div>"; 
  echo " </div>";

  echo "<a class=\"orange_mar\" href=\"http://www.marlonfalcon.cl/\">";
  echo "<img id=\"marlon\" style=\"position: fixed; top: 0; right: 0; border: 0;z-index:9999;\" src=\"assets/img/right_orange.png\" alt=\"marlon\">";
  echo "</a>";

}


// {0.4} Funcion para cerrar secciones
function CerrarSession(){
  session_start();
  session_destroy();
  header('location:../../index.php');   
}




//
//  {1} Funciones Clientes ------------------------------------------------
//

// {1.1}  Funcion para Insertar Clientes
if($_POST)
{
  if (isset($_POST['tfnombre']))
  {
   $name1 = $_POST['tfnombre'];
   $empresa1 = $_POST['tfempresa'];
   $direccion1 = $_POST['tfdireccion'];
   $pais1 = $_POST['tfpais'];
   $telefono1 = $_POST['tftelefono'];
   $mail1 = $_POST['tfmail'];
   $nac1 = $_POST['tfnacimiento'];
   $tipo = $_POST['tTipo'];
   

   ConectarBD();
   $sql="INSERT INTO tclientes (fnombre,fempresa,fdireccion,fpais,ftelefono,fmail,fnacimiento,Tipo) VALUES ('".$name1."','".$empresa1."','".$direccion1."','".$pais1."','".$telefono1."','".$mail1."','".$nac1."','".$tipo."')";
   $query = mysql_query($sql);
   if ($query){
    header('location:../../clientes.php');
   }
  else
  {
    echo("No se pudo insertar <gr>");
    echo($sql);
  }
}
}

// {1.2}  Funcion para Borrar Clientes
if(isset($_GET['id_usuario']))
{
  ConectarBD();
  $numero=$_GET['id_usuario'];
  $sql = "DELETE FROM tclientes WHERE fid = '$numero'";
  mysql_query($sql);
  header('location:../../clientes.php');
}

   //
//  {2} Funciones Proveedores ------------------------------------------------
//

// {2.1}  Funcion para Insertar Proveedores
if($_POST)
{
  if (isset($_POST['tfnombrep']))
  {
    $name1 = $_POST['tfnombrep'];
    $empresa1 = $_POST['tfempresa'];
    $direccion1 = $_POST['tfdireccion'];
    $pais1 = $_POST['tfpais'];
    $telefono1 = $_POST['tftelefono'];
    $mail1 = $_POST['tfmail'];
    $nac1 = $_POST['tfnacimiento'];
    $id_qui = DameIdProveedores($name1);
    ConectarBD();
    $sql="INSERT INTO tproveedores (fnombre,fempresa,fdireccion,fpais,ftelefono,fmail,fnacimiento) VALUES ('".$name1."','".$empresa1."','".$direccion1."','".$pais1."','".$telefono1."','".$mail1."','".$nac1."')";

    $query = mysql_query($sql);  

    if ($query){
      header('location:../../proveedores.php');
    }

    else
    {
      echo("No se pudo insertar <gr>");
      echo($sql);
    }
  }
}


// {2.2}  Funcion para Borrar proveedores
if(isset($_GET['id_usuariop']))
{
  ConectarBD();
  $numero=$_GET['id_usuariop'];
  $sql = "DELETE FROM tproveedores WHERE fid = '$numero'";
  mysql_query($sql);
  header('location:../../proveedores.php');
}


function rellenarProveedores(){
  ConectarBD();
  $sql = "SELECT * FROM tproveedores WHERE 1";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result))
  {
    echo "<option value=\"".$row['fnombre']."\">".$row['fnombre']."</option>";
  }
}


function rellenarCientes(){
  ConectarBD();
  $sql = "SELECT * FROM tclientes WHERE 1";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result))
  {
    echo "<option value=\"".$row['fnombre']."\">".$row['fnombre']."</option>";
  }
}


function rellenarProductos(){
  ConectarBD();
  $sql = "SELECT * FROM tproductos WHERE 1";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result))
  {
    echo "<option value=\"".$row['fnombre']."\">".$row['fnombre']."</option>";
  }
} 


function rellenarIdioma(){
     listar_archivos('assets/lang/');
        //echo "<option value=\"".$archivo."\">".$archivo."</option>";
   
} 



function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                    //echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
                    $archivo = substr($archivo, 0 ,-4);
                    echo "<option value=\"".$archivo."\">".$archivo."</option>";
                }
            }
            closedir($dir);
        }
    }
}




function DameElPrimerCodigoCliente(){
  ConectarBD();
  $sql = "SELECT * FROM tclientes WHERE 1";
  $result = mysql_query($sql);
  $i=0;
  while($row = mysql_fetch_assoc($result))
  {
    $i++;
    if($i == 1){
                  return $row['fid'];
                }
  }
} 






function DameElPrimerCodigo(){
  ConectarBD();
  $sql = "SELECT * FROM tproductos WHERE 1";
  $result = mysql_query($sql);
  $i=0;
  while($row = mysql_fetch_assoc($result))
  {
    $i++;
    if($i == 1){
                  return $row['fcodigo'];
                }
  }
} 



//
//  {3} Funciones Productos ------------------------------------------------
//

// {3.1}  Funcion para Insertar Productos
if($_POST)
{
  if (isset($_POST['tCodigo']))
  {
    $codigo = $_POST['tCodigo'];
    $nombre = $_POST['tNombre'];
    $um = $_POST['tUM'];
    $Peso = $_POST['tPESO'];
    $Precio = $_POST['tPRECIO'];
    $PReorden = $_POST['tPRO'];

    

    ConectarBD();
    $sql="INSERT INTO tproductos (fcodigo,fnombre,fum,fpeso,fprecio,Preorden) VALUES ('".$codigo."','".$nombre."','".$um."','".$Peso."','".$Precio."','".$PReorden."')";

    $query = mysql_query($sql);  

    if ($query){
      header('location:../../productos.php');
    }

    else
    {
      echo("No se pudo insertar <gr>");
      echo($sql);
    }
  }
}


// {3.1}  Funcion para Insertar Tarea
if($_POST)
{
  if (isset($_POST['tNombretarea']))
  {

    $nombret = $_POST['tNombretarea'];
    $estadot = $_POST['testado'];
    $pasot = $_POST['tpasos'];
    $fechat = $_POST['tfecha'];

    

    ConectarBD();
    $sql="INSERT INTO crm (fnombreTarea,festado,fpasos,fecha) VALUES ('".$nombret."','".$estadot."','".$pasot."','".$fechat."')";

    $query = mysql_query($sql);  

    if ($query){
      header('location:../../crm.php');
    }

    else
    {
      echo("No se pudo insertar <gr>");
      echo($sql);
    }
  }
}



// {3.2}  Funcion para Borrar productos
if(isset($_GET['fid_taream']))
{
  ConectarBD();
  $numero=$_GET['fid_taream'];
  $sql = "DELETE FROM crm WHERE fid = '$numero'";
  mysql_query($sql);
  header('location:../../crm.php');
}




// {3.2}  Funcion para Borrar productos
if(isset($_GET['id_producto']))
{
  ConectarBD();
  $numero=$_GET['id_producto'];
  $sql = "DELETE FROM tproductos WHERE id = '$numero'";
  mysql_query($sql);
  header('location:../../productos.php');
}


// {4.1}  Funcion para Insertar productos en movimiento
if($_POST)
{
  if (isset($_POST['tproductos']))
  {
    $cod_producto = DameCodProducto($_POST['tproductos']);
    $cant = $_POST['tcant'];
    $proveedor = $_POST['tproveedor'];
    $factura = "F-".$_POST['tfactura'];
    $fecha =  date("F j, Y, g:i a");  

    ConectarBD();
    $sql="INSERT INTO tmov (fnodocumento,fcan,quie,fecha,fcodigoproducto) VALUES ('".$factura."','".$cant."','".$proveedor."','".$fecha."','".$cod_producto."')";

    $query = mysql_query($sql);  

    if ($query){
      header('location:../../entradas.php');
    }

    else
    {
      echo("No se pudo insertar <gr>");
      echo($sql);
    }
  }
}



if($_POST)
{
  if (isset($_POST['tlang']))
  {
   $idioma = $_POST['tlang'];
   ConectarBD();
   $sql = "UPDATE config SET idioma='$idioma' WHERE id = '1' ";
   $query = mysql_query($sql);
   if ($query){
      header('location:../../conf.php');
    }

    else
    {
      echo("No se pudo insertar <gr>");
      echo($sql);
    }
  }
}






function DameIdiomaActual(){
         ConectarBD();
         $sql="SELECT * FROM config WHERE id = '1'";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['idioma'];
} 





/*
if (isset($_POST['arrCesta'])){
    print_r($_POST["arrCesta"]);
}
*/

if($_POST)
{
  if (isset($_POST['tfnombre1']))
  {
      
      // Tomammos los datos del post
      
      $nombre = $_POST['tfnombre1'];
      $id = $_POST['tfid'];
      $empresa = $_POST['tfempresa1'];
      $dir = $_POST['tfdireccion1'];
      $pais = $_POST['tfpais1'];
      $telefono = $_POST['tftelefono1'];
      $tfmail = $_POST['tfmail1'];
      $nacimiento = $_POST['tfnacimiento1'];
      $tipo = $_POST['tfTipo'];
      ConectarBD();
      $sql_2 = "UPDATE tclientes SET fempresa='$empresa',fnombre='$nombre', fdireccion='$dir', fpais='$pais' , ftelefono='$telefono' , fnacimiento='$nacimiento' ,  fmail='$tfmail', Tipo='$tipo' WHERE fid = '$id' ";
      $query1 = mysql_query($sql_2) or die(mysql_error()); 

     if ($query1){
        echo "1";
    }

    else
    {
      echo "No:".$sql_2;
    }
      

   }  
}



if($_POST)
{
  if (isset($_POST['tfnombre2']))
  {
      
      // Tomammos los datos del post
      
      $nombre = $_POST['tfnombre2'];
      $id = $_POST['tfid2'];
      $empresa = $_POST['tfempresa2'];
      $dir = $_POST['tfdireccion2'];
      $pais = $_POST['tfpais2'];
      $telefono = $_POST['tftelefono2'];
      $tfmail = $_POST['tfmail2'];
      $nacimiento = $_POST['tfnacimiento2'];
      ConectarBD();
      $sql_2 = "UPDATE tproveedores SET fempresa='$empresa',fnombre='$nombre', fdireccion='$dir', fpais='$pais' , ftelefono='$telefono' , fnacimiento='$nacimiento' ,  fmail='$tfmail' WHERE fid = '$id' ";
      $query1 = mysql_query($sql_2) or die(mysql_error()); 

     if ($query1){
        echo "1";
    }

    else
    {
      echo "No:".$sql_2;
    }
      

   }  
}




if($_POST)
{
  if (isset($_POST['PrID']))
  {
      
      // Tomammos los datos del post
      
      $PrNombre = $_POST['PrNombre'];
      $PrID = $_POST['PrID'];
      $PrCodigo = $_POST['PrCodigo'];
      $Prum = $_POST['Prum'];
      $PrPeso = $_POST['PrPeso'];
      $PrPrecio = $_POST['PrPrecio'];
      $PrPuntoReorden = $_POST['PrPuntoReorden'];
     
      ConectarBD();
      $sql_2 = "UPDATE tproductos SET fcodigo='$PrCodigo',fnombre='$PrNombre', fum='$Prum', fpeso='$PrPeso' , fprecio='$PrPrecio' , Preorden='$PrPuntoReorden' WHERE id = '$PrID' ";
      $query1 = mysql_query($sql_2) or die(mysql_error()); 

     if ($query1){
        //echo "1";
    }

    else
    {
      echo "No:".$sql_2;
    }
      

   }  
}








function DameIdCliente($nombre){
         ConectarBD();
         $sql="SELECT * FROM tclientes WHERE fnombre = '$nombre'";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['fid'];
} 



function DameIdProveedores($nombre){
         ConectarBD();
         $sql="SELECT * FROM tproveedores WHERE fnombre = '$nombre'";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['fid'];
} 




$f_direccion = "direccion";
$f_fempresa = "empresa1";



if(isset($_GET['imgsrc']))
{
  $numero = $_GET['imgsrc'];
  $mytipo = substr($_GET['tipo'],1);  

  ConectarBD();
  $sql = "SELECT * FROM tclientes WHERE fid = '$numero'";
  $res = mysql_query($sql);
  $res2 = mysql_fetch_array($res);
  $f_fempresa = $res2[$mytipo];
  echo $f_fempresa;
} 


// Funcion para rellenar formulario
if(isset($_GET['imgsrc2']))
{
  $numero = $_GET['imgsrc2'];
  $mytipo = substr($_GET['tipo'],1);  
  ConectarBD();
  $sql = "SELECT * FROM tproveedores WHERE fid = '$numero'";
  $res = mysql_query($sql);
  $res2 = mysql_fetch_array($res);
  $f_fempresa = $res2[$mytipo];
  echo $f_fempresa;
}   



// Funcion para rellenar formulario
if(isset($_GET['idproducto']))
{
  $numero = $_GET['idproducto'];
  $mytipo = substr($_GET['tipo'],1); 
  ConectarBD();
  $sql = "SELECT * FROM tproductos WHERE id = '$numero'";
  $res = mysql_query($sql);
  $res2 = mysql_fetch_array($res);
  $f_fempresa = $res2[$mytipo];  
  echo $f_fempresa;
}   




   // {4.2}  Funcion para Salidas a productos
if($_POST)
{
  if (isset($_POST['tproducto_s']))
  {
    $cod_producto = DameCodProducto($_POST['tproducto_s']);
    $cant = $_POST['tcant']*-1;   
    $proveedor = $_POST['tproveedor'];
    $factura = "S-".$_POST['tfactura'];
    $fecha =  date("F j, Y, g:i a");  

    ConectarBD();
    $sql="INSERT INTO tmov (fnodocumento,fcan,quie,fecha,fcodigoproducto) VALUES ('".$factura."','".$cant."','".$proveedor."','".$fecha."','".$cod_producto."')";

    $query = mysql_query($sql);  

    if ($query){
      //echo $sql;
      header('location:../../salidas.php');
    }

    else
    {
      echo("No se pudo insertar <gr>");
      echo($sql);
    }
  }
}



// Editar Clientes
if(isset($_GET['id_cliente_editar']))
{ 
    $id = $_GET['id_cliente_editar'];
    echo $id;
header('location:../../clientes.php');

echo("<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">");
echo("  <div class=\"modal-dialog\">");
echo("    <div class=\"modal-content\">");
echo("      <div class=\"modal-header\">");
echo("        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>");
echo("        <h4 class=\"modal-title\" id=\"myModalLabel\">Modal title</h4>");
echo("      </div>");
echo("      <div class=\"modal-body\">");
echo("        ...");
echo("      </div>");
echo("      <div class=\"modal-footer\">");
echo("        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>");
echo("        <button type=\"button\" class=\"btn btn-primary\">Save changes</button>");
echo("      </div>");
echo("    </div>");
echo("  </div>");
echo(" </div>");
        
}


function DameNombreCliente($id){
         ConectarBD();
         $sql="SELECT * FROM tclientes WHERE fid= '$id'";
         $res = mysql_query($sql);
         $res2 = mysql_fetch_array($res);
         return $res2['fnombre'];
}




$idx= -1;


  if (isset($_POST['parametro1']))
  {
     echo  "ok:".$_POST['parametro1'];
   }




// {2.2}  Funcion para Borrar mov
if(isset($_GET['fid_mov']))
{
  ConectarBD();
  $numero=$_GET['fid_mov'];
  $sql = "DELETE FROM tmov WHERE fid = '$numero'";
  mysql_query($sql);
  header('location:../../movimientos.php');
}


// Funcion para inventario



// Funcion para calcular cantidad de filas

function mysqlCantiFilas($tabla){
        // Calculamos el total de registros
         $sqltemp = "SELECT * FROM ".$tabla;  // sentencia sql
         $resultemp = mysql_query($sqltemp);
         $total_registros = mysql_num_rows($resultemp);
         return $total_registros;
       }


function DamePrecioProducto($cod){
         ConectarBD();
         $sql="SELECT * FROM tproductos WHERE fcodigo = '$cod'";
         $res = mysql_query($sql);
         $res2 = mysql_fetch_array($res);
         return $res2['fprecio'];
       //return $sql;   
       }

function DamePesoProducto($cod){
         ConectarBD();
         $sql="SELECT * FROM tproductos WHERE fcodigo = '$cod'";
         $res = mysql_query($sql);
         $res2 = mysql_fetch_array($res);
         return $res2['fpeso'];
       //return $sql;   
       }


       function DameCodProducto($nombre){
         ConectarBD();
         $sql="SELECT * FROM tproductos WHERE fnombre = '$nombre'";
         $res = mysql_query($sql);
         $res2 = mysql_fetch_array($res);
         return $res2['fcodigo'];
       //return $sql;   
       }


      function DameNombreProducto($cod){
         ConectarBD();
         $sql="SELECT * FROM tproductos WHERE fcodigo = '$cod'";
         $res = mysql_query($sql);
         $res2 = mysql_fetch_array($res);
         return $res2['fnombre'];
       }


     function DamePuntoReorden($cod){
         ConectarBD();
         $sql="SELECT * FROM tproductos WHERE fcodigo = '$cod'";
         $res = mysql_query($sql);
         $res2 = mysql_fetch_array($res);
         return $res2['Preorden'];
       }


       function DameComprasProveedor($provedor){
        ConectarBD();
        $sql="SELECT * FROM tmov WHERE quie ='$provedor' ";
        $result = mysql_query($sql);
        $Importe = 0;
        while($row = mysql_fetch_assoc($result))
        {
          $nombreTempProd = DameNombreProducto($row['fcodigoproducto']);
          $precioTempProd = DamePrecioProducto($row['fcodigoproducto']);            
          $cantidad = $row['fcan'];
          $Importe = $Importe +  $precioTempProd * $cantidad;
        }
        return $Importe;
      }    


function printUser(){  
        $sql="SELECT * FROM tusuarios ";
        $result = mysql_query($sql);
        
        while($row = mysql_fetch_assoc($result))
        { 
            echo "<option>".$row['fname']."</option>";
        }

    }    


  function printGrafProductos($mydiv){  
        $sql="SELECT fcodigoproducto,sum(fcan) FROM tmov GROUP BY(fcodigoproducto) ";
        $result = mysql_query($sql);
        $PrecioTotal=0;
        $myprecio = 0;
        $importe = 0;
        
        while($row = mysql_fetch_assoc($result))
        { 
          if ($row['sum(fcan)'] > 0 ){   
            $myprecio = DamePrecioProducto($row['fcodigoproducto']);
            $PrecioTotal = $PrecioTotal+ $myprecio*$row['sum(fcan)'];      
          }   
        }

    
        $result1 = mysql_query($sql);
        echo " <script>";
        echo " Morris.Donut({";
        echo " element: '".$mydiv."',";
        echo " data: ["; 

        while($row= mysql_fetch_assoc($result1))
          { 
            if ($row['sum(fcan)'] > 0 ){ 
              $atemname= DameNombreProducto($row['fcodigoproducto']);    
              $myprecio = DamePrecioProducto($row['fcodigoproducto']);
              $importe = $myprecio *  $row['sum(fcan)'];             
              $porciento = $importe/$PrecioTotal*100;
              echo " {value: ".round($porciento,0).", label: '".$atemname."'},";           
            }   
          }
          echo " ],";
          echo " formatter: function (x) { return x + \"%\"}";
          echo "   }).on('click', function(i, row){";
          echo "  console.log(i, row);";
          echo " });";
          echo " </script>";
   }




  function printGrafClientes($mydiv){  
        $sql="SELECT * FROM tclientes WHERE 1";
        $result = mysql_query($sql);        
        $PrecioTotal=0;
        while($row = mysql_fetch_assoc($result))
          { 
            $PrecioTotal = $PrecioTotal+ DameComprasProveedor($row['fnombre']);   
          }

        $result1 = mysql_query($sql);
        echo " <script>";
        echo " Morris.Donut({";
          echo " element: '".$mydiv."',";
          echo " data: [";
          while($row1= mysql_fetch_assoc($result1))
          { 
              $myprecio = DameComprasProveedor($row1['fnombre']);
              $porciento = $myprecio/$PrecioTotal*100;
              echo " {value: ".round($porciento,0).", label: '".$row1['fnombre']."'},";           
          }
          echo " ],";
          echo " formatter: function (x) { return x + \"%\"}";
          echo "   }).on('click', function(i, row){";
          echo "  console.log(i, row);";
          echo " });";
echo " </script>";
}


function printGrafProve($mydiv){  
        $sql="SELECT * FROM tproveedores WHERE 1";
        $result = mysql_query($sql);        
        $PrecioTotal=0;
        while($row = mysql_fetch_assoc($result))
          { 
            $PrecioTotal = $PrecioTotal+ DameComprasProveedor($row['fnombre']);   
          }
        $result1 = mysql_query($sql);
        echo " <script>";
        echo " Morris.Donut({";
          echo " element: '".$mydiv."',";
          echo " data: [";
          while($row1= mysql_fetch_assoc($result1))
          { 
     
              $myprecio = DameComprasProveedor($row1['fnombre']);
              $porciento = $myprecio/$PrecioTotal*100;
              echo " {value: ".round($porciento,0).", label: '".$row1['fnombre']."'},";           
          }
          echo " ],";
          echo " formatter: function (x) { return x + \"%\"}";
          echo "   }).on('click', function(i, row){";
          echo "  console.log(i, row);";
          echo " });";
echo " </script>";
}




  ?>


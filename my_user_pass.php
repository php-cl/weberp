<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pass usuarios</title>
</head>
<body>
	<div class="container">
		 <form action="my_user_pass.php" method="POST">
		 	 <input type="text" name="pasword">
		 	 <input type="submit" value="Calcular">		 	
		 </form>



		 <?php 
            if($_POST){
            	$pass = md5($_POST['pasword']);
                echo "La constraseña es:".$pass;
            }
		 ?>
	</div>
</body>
</html>
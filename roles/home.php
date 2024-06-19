<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>Finca Don Pedro</title>
	<link href="img/logo.jpg" rel="icon">
	<link href="css/estilo.css" rel="stylesheet">
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<?php if ($_SESSION['role'] == 'admin') {?>
      		<!-- For Admin -->
      		<div class="card" style="width: 18rem;"> 

			  <div class="card-body text-center">
			    <h5 class="card-title">
			    </h5>

			  </div>
			</div>
			<div class="p-3">
				<?php include 'php/members.php';
                 if (mysqli_num_rows($res) > 0) {?>
                  
				<h1 class="display-4 fs-1">Miembros</h1>
				<table class="table" 
				       style="width: 32rem;">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Usuario</th>
				      <th scope="col">Role</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	$i =1;
				  	while ($rows = mysqli_fetch_assoc($res)) {?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['name']?></td>
				      <td><?=$rows['username']?></td>
				      <td><?=$rows['role']?></td>
				    </tr>
				    <?php $i++; }?>
				  </tbody>
				</table>
				<?php }?>
				
			</div>
			<BR></BR>
			<div class="container">
    <h1>Bienvenido Administrador</h1>
    <a href="index.html">Ir a la página principal</a>
  </div>

      	<?php }else { ?>
      		<!-- FORE USERS -->
			  <div class="container">
    <h1>Bienvenido Usuario</h1>
    <a href="index.html">Ir a la página principal</a>
  </div>
      	<?php } ?>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>
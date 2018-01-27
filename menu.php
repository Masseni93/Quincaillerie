<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

		<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/styles.css" >
</head>
<body>
	<div class="container-fluid">

		<div class="row"><!-- Menu -->

			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<a class="navbar-brand" href="index.php"><img src="img/img.jpg" width="60" height="45" style="margin-top: -10px;"></a>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="articles.php">Article</a>
							</li>
							<li>
								<a href="categories.php">Categorie</a>
							</li>

							<li>
								<a href="commandes.php">Commandes</a>
							</li>
							<li>
								<a href="ajoutadmin.php">Ajouter admin</a>
							</li>				
							<li style="">
							<?php	if (isset($_SESSION['admin'])) {
						$sql="SELECT * FROM admin WHERE id=".$_SESSION['admin'];
						$req=mysqli_query($link,$sql);
						$data=mysqli_fetch_array($req);
						?>
						<a href="admin.php"><?php echo $data['nom'].' '.$data['prenoms'];
						} ?></a>
						
							</li>			
							<li style="margin-top: -13px;">
								<form method="POST">
								<button class="btn-primary" name="deconnexion">Deconnexion</button>
								</form>
								<?php if (isset($_POST['deconnexion'])){
									session_destroy();
								} ?>
									
		
							</li>
						</ul> 
					</div>
				</nav>



</body>
</html>
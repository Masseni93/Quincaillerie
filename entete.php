
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Boutique DFS</title>

		<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css" >
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-default">
			<a href="index.php" class="navbar-brand"><img src="img/img.jpg" width="60" height="45"></a>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="contact.php" style="margin-top: 20px;">Nos contacts</a>
				</li>
				<li>
					<button name="connexion" type="submit" class="btn btn-primary"><a href="login.php"> Connexion</a></button>
				</li>
				<li>
					<button name="inscription" type="submit" class="btn btn-primary"><a href="inscription.php"> S'inscrire</a></button>
				</li>
			</ul>
		</nav>
		<div class="banner" style="background-image: linear-gradient(-225deg, rgba(0,101,168,0.6) 0%, rgba(0,36,61,0.6) 50%), url('img/nous.jpg');">
			<div class="banner-content">
				<h1>Bienvenue dans notre quincaillerie</h1>
				<p> Tout pour le bâtiment</p>
				
			</div>
			
		</div>
		<div class="container-fluid">
		<div class="row" style="margin-top: 30px;">
			<div class="col-sm-2" style="height: 800px; border: 1px lightgrey inset; background-color: lightblue;">
				<h4 style="color: hotpink;">Categories</h4>
				<h5><?php 
					$list=" SELECT * FROM categories";
					$res= mysqli_query($link,$list);
					while ($data = mysqli_fetch_array($res)){
	            echo '-'.' '.'<a style="text-decoration: none;">'.$data['libelle'].'</a>'.'<br>';
	        }?>
	        	
	        </h5> 
				<h4 style="color: hotpink;">Contacts</h4>
				<h5>Téléphones</h5>
					<ul style="font-size: 12px;">
						<li>03 81 32 82</li>
						<li>87 63 44 58</li>
						<li>47 07 59 35</li>
					</ul>
				<h5>Email</h5>
					<ul style="font-size: 12px;">
						<li>massenicoolsylla@gmail.com</li>
						<li>fofass220@gmail.com</li>
						<li>assitadoumbia9@gmail.com</li>
					</ul>
					<h4 style="color: hotpink;"> Quelques Avis</h4>
					<?php 
					$list=" SELECT description, nom FROM avis INNER JOIN users ON users.id= avis.id_users ORDER BY avis.id DESC LIMIT 0, 10";
					$res= mysqli_query($link,$list);
					while ($data = mysqli_fetch_array($res)){
					?>
					<h5><b>- <?php echo $data['description']; ?></b> (<?php echo $data['nom']; ?>)</h5>
					<?php } ?>
			</div>
<?php
include('connect.php');
	$msg="";
if (isset($_POST['ajouter'])){
		$sql= "INSERT INTO avis (description, id_users) VALUES ('".mysqli_real_escape_string($link, $_POST['description'])."','".$_SESSION['variable']."')";
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='Avis ajouté';
		}else{
			$msg=mysqli_error($link);
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Utilisateurs</title>

		<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" >
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
				<li style="margin-top: 20px;">
				<a href="users.php">	
				<?php
					if (isset($_SESSION['variable'])) {
					$sql="SELECT * FROM users WHERE id=".$_SESSION['variable'];
					$req=mysqli_query($link,$sql);
					$data=mysqli_fetch_array($req);
					echo $data['nom'].' '.$data['prenoms'];
					} 
				 ?>
				 </a>
				</li>
				<li style="margin: 5px;">
							<form method="POST">
								<button class="btn-primary" name="deconnexion">Deconnexion</button>
								</form>
								<?php if (isset($_POST['deconnexion'])){
									session_destroy();
								} ?>
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
				
			<div>
				<div class="col-sm-8" style="height: 800px;">
							<?php 
							$list=" SELECT articles.id, image, libelle, titre, stock, prix FROM articles 
							INNER JOIN categories ON categories.id= articles.id_categories /*ORDER BY articles.id DESC LIMIT 0, 16*/";
							$res= mysqli_query($link,$list);
							while ($data = mysqli_fetch_array($res)){									
						?>
					<div class="col-sm-4" style="height: 200px; float: left;">
						<div style="float: left; margin-top: 10px;">
							<img src="upload/<?php echo $data['image'];  ?>" width="140px" height="110px" alt="">
						</div>
						<div style="float: left; margin-left: 5px;">
							<h4> <?php echo ($data['libelle']) ; ?></h4>
							<h4> <?php echo ($data['titre']) ; ?></h4>
							<h4>Stock: <?php echo ($data['stock']) ; ?></h4>
							<h4 style="color: red;"><?php echo ($data['prix']) ; ?> FCFA</h4>
						</div>
						<form action="addcaddie.php" method="POST" role="form"> 
							<label> Quantité:</label>
							<input type="number" name="quantite" style="width: 50px; " value="1">
							<input type="hidden" name="titre" value="<?php echo ($data['titre']);?>" style="width: 50px; ">
							<input type="hidden" name="prix" value="<?php echo ($data['prix']);?>" style="width: 50px; ">
							<input type="image" name="" value="submit" src="img/sans-titre.png" width="40" height="45" style="margin-left: 10px;">
							<!-- <div><button name="panier" class="btn-primary"  type="submit" style="margin-top: 0px; font-size: 9px;"> Ajouter au panier </button></div> -->

						</form>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-2" style="height: 800px; background-color: lightblue;">
				<h4><a href="panier.php" style="text-decoration: none;"> Voir mon panier</a></h4>
			<h4>Donnez-nous votre avis</h4>
			<span> <?php echo $msg; ?> </span> 
			<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div style="float: left; width:200px;">
				<textarea name="description" type="text" class="form-control"></textarea>
			</div>
				
			<div style="padding: 20px;">
				<button type="submit" name="ajouter" value="Enregistrer" class="btn-primary " id="ajouter" style="margin-left: 20px;">
				Ajouter
				</button>
			</div>
		</form>
		</div>
	</div>
	</div>
</body>
</html>
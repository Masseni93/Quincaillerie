<?php
include('connect.php');
	$msg="";
	if (isset($_SESSION['panier'])) {
		$panier=$_SESSION['panier'];
	}
				 
if (isset($_POST['ajouter'])){
		$sql= "INSERT INTO avis (description, id_users) VALUES ('".mysqli_real_escape_string($link, $_POST['description'])."','".$_SESSION['variable']."')";
		$result=mysqli_query($link,$sql);
		if ($result) {
			$msg='Avis ajouté';
		}else{
			$msg=mysqli_error($link);
		}

	}

if (isset($_GET['panier'])) {
	require_once('panier.php');
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
			</div>

 <div class="row"> 
 	<div class="col-sm-1"></div>
 	<div class="col-sm-6">
		
 		<table class="table" border="1"> 
			<thead>
				<tr>
					<th>Numéro</th>
					<th>Date</th>
					<th>Article</th>
					<th>Quantité</th>
					<th>P.U</th>
					<th>P.Total</th>
				</tr>
			</thead>
			<?php
			if (isset($_SESSION['panier'])) {
			 	$n=1;
				$total=0;
				for($i=0;$i<count($panier);$i++){
				$total= $total + (($panier[$i]['prix'])*($panier[$i]['quantite']));
				$_SESSION['titre']=$panier[$i]['titre'];
				$_SESSION['quantite']=$panier[$i]['quantite'];
				$_SESSION['prix']=$panier[$i]['prix'];
				$_SESSION['tot']= (($panier[$i]['prix'])*($panier[$i]['quantite']));
			
			 ?>
			<tbody>			
<tr>
<td><?php echo $n;?></td>
<td><?php echo date('d/m/Y') ?> </td>
<td><?php echo $_SESSION['titre']; ?></td>
<td><?php echo $_SESSION['quantite']; ?></td>
<td><?php echo $_SESSION['prix']; ?></td>
<td><?php echo $_SESSION['tot']; ?></td>
<td><a href="suppdupanier.php?users=<?=$i?>">Supp</a></td>
</tr>
<?php 
				$n++;
				} 

				?>
				<tr>
					<td colspan="5">Total</td>
					<td> <?php echo $total; 
					 } 
					?></td>
				</tr>
			
			</tbody>
		</table>
		<form method="POST" action="">
		<button class="btn-primary" type="submit" name="commander">Commander</button>
		</form>
		<?php
		$msg=""; 
		$date=date('d/m/Y');
		if (isset($_POST['commander'])) {
			$sql= "SELECT id,titre, prix, stock FROM articles WHERE titre='".$_SESSION['titre']."'";
			$res= mysqli_query($link,$sql);
			while ($data = mysqli_fetch_array($res)) {
			$com= "INSERT INTO commandes (id_users, id_articles, quantite, total, datecommande) 
			VALUES ('".$_SESSION['variable']."',
			 		'".$data['id']."',
			 		'".$_SESSION['quantite']."',
			 		'".$_SESSION['tot']."',
			 		'".$date."')";
			 } 
			 $result=mysqli_query($link,$com);
				if ($result) {
			$msg='commande prix en compte';
		}else{
			$msg=mysqli_error($link);
		}
		}
		echo $msg;
		  ?>
 	</div>
 	<div class="col-sm-3"></div>

 </div>
</div>
</div>
</div>
</body>
</html>
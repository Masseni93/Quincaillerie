<?php
	include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';   
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) 
		{
			$sql= "INSERT INTO articles (titre,image,description,prix, stock, id_categories, id_admin) 
			VALUES ('".mysqli_real_escape_string($link, $_POST['titre'])."',
			 		'".$_FILES['image']['name']."',
			 		'".mysqli_real_escape_string($link, $_POST['description'])."',
			 		'".$_POST['prix']."',
			 		'".$_POST['stock']."', 
			 		'".mysqli_real_escape_string($link,$_POST['categories'])."', 
			 		'".mysqli_real_escape_string($link,$_POST['admin'])."')";
			if (isset($_GET['id']))
			{
				$sql="UPDATE articles SET titre='".$_POST['titre']."',
				image='".$_FILES['image']['name']."', 
				description='".mysqli_real_escape_string($link,$_POST['description'])."', 
				prix='".$_POST['prix']."', 
				stock='".$_POST['stock']."', 
				id_categories='".mysqli_real_escape_string($link,$_POST['categories'])."', 
				id_admin='".mysqli_real_escape_string($link,$_POST['admin'])."' WHERE id=".$_GET['id']; 
 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}
		
}
	if (isset($_GET['id'])){
	$update="SELECT * FROM articles WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	if (isset($_GET['sup'])){
	$delete="DELETE FROM articles WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
	}
?>
 <!DOCTYPE html>
<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Articles</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/styles.css" >

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend>Formulaire Des Articles </legend>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Titre</label>
							<input name="titre" type="text" class="form-control" id="" placeholder="Entrer le titre" value="<?php if (isset ($_GET['id'])) echo $dataU['titre']; ?>">
						</div>
						<div class="form-group">
							<label for="">image</label>
							<input name="image" type="file" class="form-control" id="" placeholder=" Choisissez une image" value="<?php if (isset ($_GET['id'])) echo $dataU['image']['name']; ?>">
						</div>
						<div class="form-group">
							<label for="">description</label>
							<textarea name="description" type="text" class="form-control textarea" id="" placeholder="Description de l'article"></textarea>
						</div>
						<div class="form-group">
							<label for="">Prix</label>
							<input name="prix" type="text" class="form-control" id="" placeholder="Entrer le prix" value="<?php if (isset ($_GET['id'])) echo $dataU['prix']; ?>">
						</div>
						<div class="form-group">
							<label for="">Stock</label>
							<input name="stock" type="text" class="form-control" id="" placeholder="Entrer le stock" value="<?php if (isset ($_GET['id'])) echo $dataU['stock']; ?>">
						</div>
						<div class="form-group">
							<label for="">Categories</label>
							<select name="categories" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqlcategorie="SELECT * FROM categories";
					//execute la requete et on la stock dans $repcategorie
					$repcategorie=mysqli_query($link,$sqlcategorie);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datacat=mysqli_fetch_array($repcategorie)) {
						?>
						<option value="<?php echo $datacat['id'];?>">
						<?php echo $datacat['libelle'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						</div>
						<div class="form-group">
							<label for="">Administrateurs</label>
							<select name="admin" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqladmin="SELECT * FROM admin";
					//execute la requete et on la stock dans $repcategorie
					$repadmin=mysqli_query($link,$sqladmin);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($dataadmin=mysqli_fetch_array($repadmin)) {
						?>
						<option value="<?php echo $dataadmin['id'];?>">
						<?php echo $dataadmin['nom'].' '.$dataadmin['prenoms'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						</div>
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary">Valider</button>
						</div>
					</form>
				</div>
			</div>
<br>
			<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Titre</th>
							<th>Image</th>
							<th>Description</th>
							<th>Prix</th>
							<th>Stock</th>
							<th>Categories</th>
							<th>Administrateurs</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										titre,
										image,
										articles.description,
										prix,
										stock,
										libelle,
										nom,
										prenoms,
										articles.id
									FROM articles
									INNER JOIN categories
									ON categories.id = articles.id_categories
									INNER JOIN admin
									ON admin.id = articles.id_admin
									";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td><img src="upload/<?php echo $data['image'];  ?>" width="30px" height="30px" alt=""></td>
							<td><?php echo ($data['description']) ; ?></td>
							<td><?php echo ($data['prix']) ; ?></td>
							<td><?php echo ($data['stock']) ; ?></td>
							<td><?php echo $data['libelle']; ?></td>
							<td><?php echo $data['nom'].' '.$data['prenoms']; ?></td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
								<a href="?sup=<?php echo $data['id']; ?>">Supprimer</a>
							</td>
						</tr>
						<?php 
						$n++;} 
						 ?>

					</tbody>
				</table>
				</div>
			</div>

		</div>
		

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/control.js"></script>
	</body>
</html>
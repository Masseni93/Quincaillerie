<?php
	include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO categories (description, libelle) VALUES ('".$_POST['description']."','".$_POST['libelle']."')";
		if (isset($_GET['id'])){
			$sql="UPDATE categories SET description='".mysqli_real_escape_string($link, $_POST['description'])."', libelle='".mysqli_real_escape_string($link, $_POST['libelle'])."' WHERE id=".$_GET['id']; 
 		}
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM categories WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM categories WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Categories</title>

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

					<form action="" method="POST" role="form">
						<legend>Formulaire De Categories</legend>
						<span> <?php echo $msg; ?> </span> 
						<div class="form-group">						
							<label for="">Libelle</label>
							<input name="libelle" value="<?php if (isset ($_GET['id'])) echo $dataU['libelle']; ?>" type="text" class="form-control" id="libelle" placeholder="Entrer le libelle">
						</div>
						<div>
							<label for="">Description</label>
							<input name="description" value="<?php if (isset ($_GET['id'])) echo $dataU['description']; ?>" type="text" class="form-control" id="" placeholder="Donnez la description">
						</div>
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary " id="btnValider">Valider</button>
						</div>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
<br>
			<div class="row">
				<div class=" col-md-offset-2 col-md-8 ">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Libelle</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM categories";
							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res)){
								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['libelle']; ?></td>
							<td><?php echo $data['description']; ?></td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
								<a href="?sup=<?php echo $data['id']; ?>">Supprimer</a>
							</td>
						</tr>
						<?php $n++;
						 } ?>
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
<?php
	include('menu.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Commandes</title>

		<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/styles.css" >
</head>
<body>
	<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Date de la commande</th>
							<th>Articles</th>
							<th>Stock</th>
							<th>Prix</th>
							<th>Quantité</th>
							<th>Prix total</th>
							<th>Clients</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										titre,
										prix,
										stock,
										quantite,
										total,
										nom,
										prenoms,
										email,
										datecommande
									FROM commandes
									INNER JOIN articles
									ON articles.id = commandes.id_articles
									INNER JOIN users
									ON users.id = commandes.id_users
									";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['datecommande']; ?></td>
							<td><?php echo $data['titre']; ?></td>
							<td><?php echo $data['stock'] ; ?></td>
							<td><?php echo $data['prix'] ; ?></td>
							<td><?php echo $data['quantite'] ; ?></td>
							<td><?php echo $data['total'] ; ?></td>
							<td><?php echo $data['nom'].' '.$data['prenoms']; ?></td>
							<td><?php echo $data['email']; ?></td>
						</tr>
						<?php 
						$n++;} 
						 ?>

					</tbody>
				</table>
				</div>
			</div>
</body>
</html>
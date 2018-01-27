
<?php
	include('menu.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrateur</title>

		<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/styles.css" >
</head>
<body>
	<div class="container-fluid">
		<div class="banner" style="background-image: linear-gradient(-225deg, rgba(0,101,168,0.6) 0%, rgba(0,36,61,0.6) 50%), url('img/nous.jpg');">
			<div class="banner-content">

				<h1>Bienvenue dans notre quincaillerie</h1>
				<p> Tout pour le bâtiment</p>
				
			</div>
			
		</div>
<div class="container-fluid">
			<div class="row" style="margin-top: 30px;">
			<div class="col-sm-2" style="height: 800px; border: 1px lightgrey inset; background-color: lightblue; margin-left: 20px;">
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
				
			<div>
				<div class="col-sm-8" style="height: 800px;">
							<?php 
							$list=" SELECT image, libelle, titre, stock, prix FROM articles 
							INNER JOIN categories ON categories.id= articles.id_categories ORDER BY articles.id DESC LIMIT 0, 16";
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
					</div>

						<?php  
					}
				?>
				</div>
			</div>

		</div>
	</div>
	</div>
</body>
</html>
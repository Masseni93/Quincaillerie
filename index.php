<?php
include('connect.php');
if (isset($_POST['valider']) ){

$sql="SELECT * FROM admin WHERE email='".mysqli_real_escape_string($link,$_POST['emailadmin'])."' AND mdp='".mysqli_real_escape_string($link,md5($_POST['mdpadmin']))."' LIMIT 0,1";
$req= mysqli_query($link,$sql);
if (mysqli_num_rows($req)>0) {
$data= mysqli_fetch_array($req);
$_SESSION['admin']=$data['id'];
header('location:admin.php');
}else{
echo "identifiants incorrects";
	}
}			
if (isset($_POST['btnValider']) ){

	$sql="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mdp='".mysqli_real_escape_string($link,md5($_POST['mdp']))."' LIMIT 0,1";
						//die($sql);
	$req1= mysqli_query($link,$sql);
	if (mysqli_num_rows($req1)>0) {
	$data= mysqli_fetch_array($req1);
	$_SESSION['variable']=$data['id'];
	header('location:users.php');
	}else{
		echo "identifiants incorrects";
	}
}
include('entete.php');
?>
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
			<div class="col-sm-2" style="height: 800px; border: 1px lightgrey inset; background-color: lightblue;">
				<form action="" method="POST" role="form">
					<legend style="color: hotpink;"> Connectez-vous</legend>
					<div class="form-group">
						<label for=""> Email</label>
						<input name="email" type="email" value="" class="form-control" id="" placeholder="Exemple@email.com">
					</div>
					<div class="form-group">
						<label for=""> Mot de passe</label>
						<input name="mdp" type="password" value="" class="form-control" id="" placeholder="Entrez votre mot de passe" >
					</div>
					<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary">Valider</button>
					</div>
				</form>

				<h5>Pas encore inscrit?</h5>
				<a href="inscription.php" style="text-decoration: none;">Inscrivez-vous maintenant</a>	

				<form action="" method="POST" role="form">
					<legend style="color: hotpink;"> Administrateur</legend>
					<div class="form-group">
						<label for=""> Email</label>
						<input name="emailadmin" type="email" value="" class="form-control" id="" placeholder="Exemple@email.com">
					</div>
					<div class="form-group">
						<label for=""> Mot de passe</label>
						<input name="mdpadmin" type="password" value="" class="form-control" id="" placeholder="Entrez votre mot de passe" >
					</div>
						
					<div style="text-align: center;"> 
						<button name="valider" type="submit" class="btn btn-primary">Valider </button>

					</div> 
				</form>
			</div>
		</div>







	</div>
</body>
</html>
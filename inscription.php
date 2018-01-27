<?php include('connect.php'); 
$msg="";
	if (isset($_POST['btnValider'])){

	$sql="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
		$req= mysqli_query($link,$sql);
		if (mysqli_num_rows($req)>0) {
			echo "email existe";
			}else if ($_POST['mdp']!=$_POST['v_mdp']) {
			echo " Les mots de passes ne correspondent pas";
				
			}else{

		$sql= "INSERT INTO users (nom, prenoms, contact, email, mdp, v_mdp)
			VALUES ('".mysqli_real_escape_string($link,$_POST['nom'])."',
				'".mysqli_real_escape_string($link,$_POST['prenoms'])."',
				'".$_POST['contact']."',
				'".mysqli_real_escape_string($link,$_POST['email'])."',
				 '".mysqli_real_escape_string($link, md5($_POST['mdp']))."',
				'".mysqli_real_escape_string($link, md5($_POST['v_mdp']))."')";
				$res=mysqli_query($link,$sql);
					if ($res) {
						$msg='insertion reussie';
						}else{
						$msg=mysqli_error($link);
						}
			}
	}
	include('entete.php');
?>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-3">
				<span><?php echo $msg; ?></span>
				<form action="" method="POST" role="form">
					<legend> Inscription</legend>
					<div class="form-group">
						<label for=""> Nom</label>
						<input name="nom" type="text" value="" class="form-control" id="" placeholder="Entrez le nom">
					</div>
					<div class="form-group">
						<label for=""> Prenom</label>
						<input name="prenoms" type="text" value="" class="form-control" id="" placeholder="Entrez le prenom">
					</div>
					<div class="form-group">
						<label for="">Téléphone</label>
						<input name="contact" type="text" value="" class="form-control" id="" placeholder="Entrez votre numéro de téléphone" required="">
					</div>
					<div class="form-group">
						<label for=""> Email</label>
						<input name="email" type="email" value="" class="form-control" id="" placeholder="Exemple@email.com" required="">
					</div>
					<div class="form-group">
						<label for=""> Mot de passe</label>
						<input name="mdp" type="password" value="" class="form-control" id="" placeholder="Entrez votre mot de passe">
					</div>
						<div class="form-group">
						<label for=""> Vérification du mot de passe</label>
						<input name="v_mdp" type="password" value="" class="form-control" id="" placeholder="Entrez à nouveau votre mot de passe">
					</div>
					<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary">Valider</button> 
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
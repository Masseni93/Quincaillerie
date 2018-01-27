<?php
include('connect.php');
include('entete.php');
 ?>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<form action="" method="POST" role="form">
					<legend> Connectez-vous</legend>
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
						<button name="inscrire" type="submit" class="btn btn-primary"><a href="inscription.php">S'inscrire </a></button>
						</div> 
				</form>
						<?php if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mdp='".mysqli_real_escape_string($link,md5($_POST['mdp']))."' LIMIT 0,1";
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:users.php');
								}else{
									echo "identifiants incorrects";
								}
						}
						?>
			</div>
			
		</div>







	</div>
</body>
</html>

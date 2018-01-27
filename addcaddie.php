<?php include 'connect.php'; 
	if (isset($_SESSION['panier'])) {
			# code...
		$panier=$_SESSION['panier'];
	}else{
		$panier=array();
	}
	$index=count($panier);

	$panier[$index]['titre']=$_POST['titre'];
	$panier[$index]['prix']=$_POST['prix'];
	$panier[$index]['quantite']=$_POST['quantite'];
	$_SESSION['panier']=$panier;
	header('location:panier.php?panier=1');
?>
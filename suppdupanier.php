<?php include 'connect.php'; 
$index=$_GET['users'];
$panier=$_SESSION['panier'];
unset($panier[$index]);
$_SESSION['panier']=$panier;
header('location:panier.php?panier=1');
?>
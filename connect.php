<?php session_start(); 
//nom de la machine
	$host="localhost";
// nom de l'utilisateur
	$user="root";
// Mot de passe du serveur
	$mdp="";
// Nom de la base de données
	$db="quincaillerie";
// connexion au serveur mysql
	$link=mysqli_connect($host,$user,$mdp);
// connexion à la base de données
	mysqli_select_db($link,$db);

 ?>
<?php

	$emailofthebest = "nathanchevalier.lechatelet@gmail.com";
	$sujetdeouf = "Un nouvel inscrit sur swaps";
	$letrucquonsenfout = "From: inscription@swaps.esy.es" ;
	$messagebanal = 'Bonjour, '.$pseudo.' a entammé une procédure d\'inscription';

	mail($emailofthebest, $sujetdeouf, $messagebanal, $letrucquonsenfout);

?>
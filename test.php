<?php
require_once('classes/membre.class.php');
$membre = new Membre();

echo($membre->cryptpassword("test"));

?>
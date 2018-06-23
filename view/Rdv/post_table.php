<?php
require_once 'model/Rdv.php';

$liste = new Rdv();
echo $liste->getRdvEnAttenteJSON();

?>
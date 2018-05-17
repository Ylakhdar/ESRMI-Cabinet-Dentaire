<?php 
require_once '../frame/Modele.php';
require_once 'Employe.php';


// $emp = new Employe;

// $emp->ajouterEmploye('lakhdar','youssef','1986-12-29','adresse1','0653105265','lakhdar.y@gmail.com','s804338','ylakhdar','you1007','Docteur','chirugien','2010-02-01',null,14);

$emp1 = new Employe;

// $emp1->ajouterEmploye('lakhdar','Salmane','2017-01-03','adresse1 Bis','0612548697','lakhdar.s@gmail.com','s811432','slakhdar','sal1007','Docteur','chirugien','2014-08-01',Null,13);

$doc = $emp1->getEmployeParId(2);
var_dump($doc);

 ?>






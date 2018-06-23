<?php 
require_once 'frame/Modele.php';
require_once 'model/Employe.php';
require_once 'model/Patient.php';
require_once 'model/Rdv.php';

// $emp = new Employe;

// $emp->ajouterEmploye('lakhdar','youssef','1986-12-29','adresse1','0653105265','lakhdar.y@gmail.com','s804338','you1007','Docteur','chirugien','2010-02-01',null,14);

// $emp1 = new Employe;

// $emp1->ajouterEmploye('lakhdar','Salmane','2017-01-03','adresse1 Bis','0612548697','lakhdar.s@gmail.com','s811432','sal1007','Docteur','chirugien','2014-08-01',Null,13);
// var_dump($emp1->getEmployeParId(2));



// $pat = new Patient;

// // $pat->ajouterPatient('2018-06-14','M','boulane','Oussama','1999-01-15','rue wifak','0653412568','oussama@gmail.com','A856475','RAS','nouveau patient','AXA','123456',1);

// // $pat->ajouterPatient('2018-06-13','M','nori','ayoub','2001-02-25','rue annour','070526874','ayoub@gmail.com','AD98715','RAS','nouveau patient','SAHAM','53685478',4);

// $rdv = new Rdv;

// // $rdv->ajouterRdv('2018-06-01 10:00:00','2018-06-01 10:30:00','terminer','extraction',1,2,3);
// // $rdv->ajouterRdv('2018-06-28 09:30:00','2018-06-28 10:00:00','prevu','soin',2,2,3);
// // $rdv->ajouterRdv('2018-06-19 10:30:00','2018-06-19 10:45:00','prevu','blanchiment',2,2,3);
// // $rdv->ajouterRdv('2018-06-18 12:00:00','2018-06-18 12:45:00','en cours','controle',1,2,3);
 
// $liste = $rdv->getlisteRdv("prevu");

// var_dump($liste);


$liste = new Rdv();
echo $liste->getRdvEnAttenteJSON();

 ?>

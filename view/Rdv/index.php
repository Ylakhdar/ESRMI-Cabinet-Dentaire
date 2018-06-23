<?php $this->titre = "Salle d'attente"; ?>

<?php require 'view/_Commun/barreNavigation.php'; ?>
<?php require 'view/_Commun/menuNavigation.php'; ?>
<div class="all-content-wrapper">

    <section class="container">
        <div class="form-group custom-input-space has-feedback">
            <div class="page-heading">
                <h3 class="post-title">Suivi des Patients en attente</h3>
            </div>
            <div class="page-body clearfix">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">liste des patients :</div>
                            <div class="panel-body">

                                <table id="listeRdvEnAttente" class="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Patient</th>
                                            <th>Motif de la visite</th>
                                            <th>Docteur</th>
                                            <th>Temps d'attente</th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

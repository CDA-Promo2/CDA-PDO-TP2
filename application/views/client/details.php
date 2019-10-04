<div class="row justify-content-around mt-5">
    <!--informations clients-->
    <div class="card rounded p-4 col-md-5 shadow">
        <div class="position-absolute z-index-1">
            <i class="fas fa-info-circle fa-4x text-info"></i>
        </div>
        <h2 class="text-center"><?= $client->lastname . ' ' . $client->firstname ?></h2>
        <p class="text-muted text-center"><?= date_diff(date_create($client->birthdate), date_create('now'))->y . 'ans, ' . $client->status ?></p>
        <div class="row mt-5">
            <div class="col-6">
                <img src="<?= base_url('assets/img/avatar.jpg') ?>" alt="photo de <?= $client->firstname . ' ' . $client->lastname ?>" class="img-fluid">
            </div>
            <div class="col-6">
                <h3 class="text-center">Informations personnelles</h3>
                <hr class="w-75">
                <ul class="mt-5">
                    <li>
                        <h4 class="lead">Date de naissance</h4>
                        <p><?= nice_date($client->birthdate, 'd-m-Y') ?></p>
                    </li>
                    <li>
                        <h4 class="lead">Téléphone</h4>
                        <p><?= $client->phone ?></p>
                    </li>
                    <li>
                        <h4 class="lead">Addresse</h4>
                        <p><?= $client->address . '<br>' . $client->zipcode ?></p>
                    </li>
                </ul>
                <div class="row justify-content-end mt-auto">
                    <a href="<?= site_url('edit/' . $client->id) ?>" class="btn btn-secondary text-white mx-3"><i class="fas fa-sign-in-alt"></i> Retour</a>
                    <a href="<?= site_url('edit/' . $client->id) ?>" class="btn btn-primary text-white mx-3"><i class="fas fa-pen"></i> Modifier</a>
                </div>
            </div>
        </div>
    </div>
    <!--liste des credits-->
    <div class="card rounded p-4 col-md-6 shadow">
        <div class="position-absolute z-index-1">
            <i class="fas fa-coins fa-4x text-info"></i>
        </div>
        <h2 class="text-center">Crédits en cours</h2>
        <div class="row mt-5">
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>Organisme</th>
                        <th>Type de crédit</th>
                        <th>Total</th>
                        <th>Restant</th>
                        <th>Taux</th>
                        <th>Négociable</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($credits as $credit) { ?>
                        <tr>
                            <td><?= $credit->company ?></td>
                            <td><?= $credit->type ?></td>
                            <td><?= $credit->total ?>€</td>
                            <td><?= $credit->remaining ?>€</td>
                            <td><?= $credit->rate ?>%</td>
                            <td><?= $credit->negotiable==1? 'oui' : 'non' ?></td>
                            <td>
                                <a href="<?= site_url('credit/edit/' . $credit->id) ?>"><i class="fas fa-edit"></i></a>
                                <a type="button" data-toggle="modal" data-target="#delete<?= $credit->id ?>"><i class="fas fa-trash-alt text-danger"></i></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row justify-content-end mt-auto">
            <a class="btn btn-primary text-white mr-3"><i class="fas fa-coins"></i> Ajouter un crédit</a>
        </div>
    </div>
</div>


<?php foreach ($credits as $credit) { ?>
            <div class="modal fade" id="delete<?= $credit->id ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-center">
                        <h2 class="bg-dark text-white p-2">Attention</h2>
                        <p>Voulez-vous vraiment supprimer ce crédit?</p>
                        <p>Type de crédit : <b><?= $credit->type ?></b></p>
                        <p>Il reste <b><?= $credit->remaining ?></b>€ au crédit</p>
                        <div class="row justify-content-center">
                            <a href="<?= site_url('credit/delete/' . $credit->id) ?>" class="btn btn-outline-danger col-4 my-3">Confirmer</a>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
<div class="row justify-content-center">
    <div class="col-6">
        <?= form_open(); ?>
        <div class="form-group my-1">
            <?= form_label('Nom de famille :', 'lastname', ['class' => 'essai']); ?>
            <?= form_input(['name' => 'lastname', 'id' => 'lastname', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group my-1">
            <?= form_label('Prénom :', 'firstname'); ?>
            <?= form_input(['name' => 'firstname', 'id' => 'firstname', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group my-1">
            <?= form_label('Date de naissance :', 'birthdate'); ?>
            <?= form_input(['type' => 'date', 'name' => 'birthdate', 'id' => 'birthdate', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group my-1">
            <?= form_label('Code Postal :', 'zipcode'); ?>
            <?= form_input(['name' => 'zipcode', 'id' => 'zipcode', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group my-1">
            <?= form_label('Numéro de télépone :', 'phone'); ?>
            <?= form_input(['name' => 'phone', 'id' => 'phone', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group my-1">
            <?= form_label('Statut marital :', 'status'); ?>
            <?= form_dropdown('status', ['1' => 'Célibataire', '2' => 'Concubinage', '3' => 'Divorcé', '4' => 'Marié', '5' => 'Veuf']); ?>
        </div>

        <div class="row justify-content-around my-5">
            <a href="<?= site_url() ?>" class="btn btn-secondary col-4">Retour</a>
            <?= form_submit('update', 'Valider', ['class' => 'form-control btn btn-success col-4']); ?>
        </div>
        <?= form_close(); ?>
    </div>
</div>
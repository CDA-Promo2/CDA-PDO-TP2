<div class="row justify-content-center">
    <div class="col-md-12 col-lg-6">
        <?= form_open() ?>
        <h2 class="text-center mt-3 mb-5"><?= $client->lastname ?> <?= $client->firstname ?></h2>
        <div class="form-group my-1">
            <label for="company">Entreprise :</label> <?= form_error('company') ?>
            <input type="text" id="company" name="company" class="form-control" value="<?= $_POST['company'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="rate">Taux :</label> <?= form_error('rate') ?>
            <input type="text" id="rate" name="rate" class="form-control" value="<?= $_POST['rate'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="total">Valeur emprunt :</label> <?= form_error('total') ?>
            <input type="text" id="total" name="total" class="form-control" value="<?= $_POST['total'] ?? '' ?>">
        </div>
        <div class="form-group my-3">
            <label for="negotiable">Negociable ? </label> <?= form_error('negotiable') ?>
            <select name="negotiable" id="negotiable">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>
        <div class="form-group my-1">
            <label for="credit_Type">Type de crédit :</label>
            <select name="credit_Type" class="form-control">
                <option value="0" selected disabled>Veuillez choisir un type de crédit</option>
                <?php foreach ($Credit_Types as $typeCredit): ?>
                    <option value="<?= $typeCredit->id ?>" <?= $_POST && $_POST['credit_Type'] == $typeCredit->id ? 'selected' : '' ?>><?= $typeCredit->id ?>. <?= $typeCredit->type ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row justify-content-around my-5">
            <a href="<?= site_url('details/' . $client->id) ?>" class="btn btn-secondary col-4">Retour</a>
            <input type="submit" class="form-control btn btn-success col-4" name="update">
        </div>
        <?= form_close() ?>
    </div>
</div>
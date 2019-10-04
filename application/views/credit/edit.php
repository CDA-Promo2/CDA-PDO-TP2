<div class="row justify-content-center">
    <form action="<?= site_url('edit/' . $credit->id) ?>" method="post" class="col-md-12 col-lg-8 mt-5">
        <div class="form-group my-1">
            <label for="company">Entreprise</label> <?= form_error('company') ?>
            <input type="text" id="company" name="company" class="form-control" value="<?= $credit->company ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="rate">Taux</label> <?= form_error('rate') ?>
            <input type="text" id="rate" name="rate" class="form-control" value="<?= $credit->rate ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="total">Total</label> <?= form_error('total') ?>
            <input type="date" id="total" name="total" class="form-control" value="<?= $credit->total ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="remaining">Restant</label> <?= form_error('remaining') ?>
            <input type="text" id="remaining" name="remaining" class="form-control" value="<?= $credit->remaining ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="negotiable">Negociable</label> <?= form_error('negotiable') ?>
            <input type="text" id="negotiable" name="negotiable" class="form-control" value="<?= $credit->negotiable ?? '' ?>">
        </div>
           <div class="form-group my-1">
            <label for="id_Credit_Type">Type de crédit</label>
            <select name="id_Credit_Type" class="form-control">
                <option value="0" selected disabled>Veuillez choisir un Status</option>
                <?php foreach ($marital_status as $typeCredit): ?>
                    <option value="<?= $typeCredit->id ?>" <?= $typeCredit->id_Credit_Type == $typeCredit->id ? 'selected' : '' ?>><?= $typeCredit->id ?>. <?= $typeCredit->status ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row justify-content-around my-5">
            <a href="<?= site_url('details/' . $client->id) ?>" class="btn btn-secondary col-4">Retour</a>
            <input type="submit" class="form-control btn btn-success col-4" name="update">
        </div>
    </form>
</div>
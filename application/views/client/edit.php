<div class="row justify-content-center">
    <form action="<?= site_url('edit/' . $client->id) ?>" method="post" class="col-md-12 col-lg-8 mt-5">
        <div class="form-group my-1">
            <label for="lastname">Nom</label> <?= form_error('lastname') ?>
            <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $client->lastname ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="firstname">Prénom</label> <?= form_error('firstname') ?>
            <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $client->firstname ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="birthdate">Date de naissance</label> <?= form_error('birthdate') ?>
            <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= $client->birthdate ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="address">Adresse</label> <?= form_error('address') ?>
            <input type="text" id="address" name="address" class="form-control" value="<?= $client->address ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="zipcode">Code Postal</label> <?= form_error('zipcode') ?>
            <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?= $client->zipcode ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="phone">Telephone</label> <?= form_error('phone') ?>
            <input type="text" id="phone" name="phone" class="form-control" value="<?= $client->phone ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="id_Marital_Status">Statue</label>
            <select name="id_Marital_Status" class="form-control">
                <option value="0" selected disabled>Veuillez choisir un Status</option>
                <?php foreach ($marital_status as $status): ?>
                    <option value="<?= $status->id ?>" <?= $client->id_Marital_Status == $status->id ? 'selected' : '' ?>><?= $status->id ?>. <?= $status->status ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row justify-content-around my-5">
            <a href="<?= site_url('details/' . $client->id) ?>" class="btn btn-secondary col-4">Retour</a>
            <input type="submit" class="form-control btn btn-success col-4" name="update">
        </div>
    </form>
</div>
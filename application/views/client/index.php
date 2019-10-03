<table class="table table-hover border bg-white">

    <thead class="thead-dark">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th colspan='2'></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client) { ?>
            <tr>
                <td><?= $client->lastname ?></td>
                <td><?= $client->firstname ?></td>
                <td><a href="<?= site_url('edit/' . $client->id) ?>" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a></td>
                <td><button type="button" data-toggle="modal" data-target="#delete<?= $client->id ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php foreach ($clients as $client) { ?>
    <div class="modal fade" id="delete<?= $client->id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content text-center">
                <h2 class="bg-dark text-white p-2">Attention</h2>
                <p>Voulez-vous supprimer <b><?= $client->firstname . ' ' . $client->lastname ?></b>?</p>
                <div class="row justify-content-center">
                    <a href="<?= site_url('delete/' . $client->id) ?>" class="btn btn-outline-danger col-4 my-3">Confirmer</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

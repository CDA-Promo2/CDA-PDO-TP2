<div class="row justify-content-center">
    <div class="col-6">
        <table class="table table-hover border bg-white">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) { ?>
                    <tr>
                        <td><?= $client->lastname ?></td>
                        <td><?= $client->firstname ?></td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="<?= site_url('create') ?>" class="btn btn-outline-success mr-3"><i class="fas fa-plus-circle"></i></a>
                                <a href="<?= site_url('detail') ?>" class="btn btn-outline-primary mr-3"><i class="fas fa-edit"></i></a>
                                <button type="button" data-toggle="modal" data-target="#delete" class="btn btn-outline-danger mr-5"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<h1 class="text-center"><?= $title ?></h1>
<hr>
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="row justify-content-center my-1">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Rechercher" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <table class="table table-hover text-center shadow border bg-white">
            <thead class="thead-dark">
                <tr>
                    <th><a href="?sortBy=lastname&<?= isset($_GET['ASC']) ? 'DESC' : 'ASC' ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" class="text-white"><i class="fas fa-sort-down"></i> Nom</a></th>
                    <th><a href="?sortBy=firstname&<?= isset($_GET['ASC']) ? 'DESC' : 'ASC' ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" class="text-white"><i class="fas fa-sort-down"></i> Prénom</a></th>
                    <th><a href="?sortBy=credits&<?= isset($_GET['ASC']) ? 'DESC' : 'ASC' ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" class="text-white"><i class="fas fa-sort-down"></i> Crédit</a></th>
                    <th><a href="?sortBy=remaining&<?= isset($_GET['ASC']) ? 'DESC' : 'ASC' ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" class="text-white"><i class="fas fa-sort-down"></i> Montant total</a></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) { ?>
                    <tr>
                        <td><?= $client->lastname ?></td>
                        <td><?= $client->firstname ?></td>
                        <td><?= $client->credits ? $client->credits : '-' ?></td>
                        <td><?= $client->remaining ? $client->remaining . ' €' : '-' ?></td>
                        <td class="d-flex justify-content-end">
                            <a href="<?= site_url('details/' . $client->id) ?>" class="btn btn-outline-success mx-1"><i class="fas fa-user-tie"></i></a>
                            <button type="button" data-toggle="modal" data-target="#delete<?= $client->id ?>" class="btn btn-outline-danger mx-1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="row justify-content-center">
            <?= $pagination ?>
        </div>
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
        <div class="row justify-content-end mt-4">
            <a href="<?= site_url('create') ?>" class="btn btn-success mr-3"><i class="fas fa-plus"></i> Ajouter client</a>
        </div>
    </div>
</div>
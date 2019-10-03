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
                <td><a href="" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a></td>
                <td><button type="button" data-toggle="modal" data-target="#delete" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div id="background"></div>
<div class="row justify-content-around bigLink_container">
    <section class="bigLink p-5 text-center">
        <h2 class="text-center mb-5">Statisiques</h2>
        <h3 class="my-3"><b data-total="<?= $totalClient ?>"></b> clients enregistrés</h3>
        <h3 class="my-3"><b data-total="<?= $totalCredit ?>"></b> crédits contractés</h3>
        <h3 class="my-3"><b data-total="<?= $sumCredit ?>"></b>€ de crédit enregistrés</h3>
    </section>
    <section class="bigLink p-5">
        <h2 class="text-center">Gestion des clients</h2>
        <div class="d-flex flex-column justify-content-end align-items-center h-75">
            <a href="<?= site_url('clientslist') ?>" class="btn btn-info my-4"><i class="fas fa-list"></i> Accéder à la liste des clients</a>
            <a href="<?= site_url('create') ?>" class="btn btn-info my-4"><i class="fas fa-plus"></i> Enregirstrer un nouveau client</a>
        </div>
    </section>
</div>


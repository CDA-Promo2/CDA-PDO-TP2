<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv = "X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content = "width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <header class="fixed-top">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="<?=site_url()?>"><b><i class="fas fa-university"></i> LaManu Épargne</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="<?=site_url('clientsList')?>" class="text-white nav-link"><i class="fas fa-list"></i> Liste des clients</a></li>
                            <li class="nav-item"><a href="<?=site_url('create')?>" class="text-white nav-link"><i class="fas fa-plus"></i> Ajouter un client</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <main class="py-5 mt-5">

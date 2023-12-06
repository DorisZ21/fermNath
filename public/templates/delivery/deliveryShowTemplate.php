<?php require 'components/alertFlashMessage.php'?>
<a href="/delivery/add">Ajouter une livraison</a>
<div class="container">
    <h1 class="title-delivery">Livraisons</h1>
    <div class="row container-principal-card-delivery">
        <div class="container-card-delivery">
            <?php foreach ($deliveries as $delivery): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?=$delivery['name']?></h5>
                    <p class="card-text"><?=$delivery['date']?></p>
                    <a href="/delivery/consult/<?=$delivery['id']?>" class="btn btn-secondary">Consulter</a>
                    <a href="/delivery/update/<?=$delivery['id']?>" class="btn btn-primary">Modifier</a>
                    <a href="/delivery/delete/<?=$delivery['id']?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

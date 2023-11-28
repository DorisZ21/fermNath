<?php require 'components/searchBar.php'?>

<div class="container-fluid containerCardCustomer">
    <?php if(!empty($customerSearchBar)): ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$customerSearchBar['name']?></h5>
                <h5 class="card-subtitle mb-2"><?=$customerSearchBar['first_name']?></h5>
                <p class="card-text"><?=$customerSearchBar['phone_number']?></p>
                <a href="/customer/update/<?=$customerSearchBar['id']?>" class="card-link btn btn-outline-success btn-sm btn-card" id="linkAddOrders">Modifier</a>
                <a href="/customer/delete/<?=$customerSearchBar['id']?>" class="card-link btn btn-outline-danger btn-sm btn-card" id="linkAddOrders">Supprimer</a>
            </div>
        </div>
    <?php endif; ?>
</div>
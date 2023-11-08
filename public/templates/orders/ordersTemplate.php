<div class="container-main">
    <div class="container-left">
        <?php if(!empty($_SESSION['flashMessage'])): ?>
            <?php require 'components/alertFlashMessage.php'?>
        <?php endif; ?>
        <?php require 'components/searchBar.php'?>
        <div class="container containerCard">
            <?php if(!empty($customerSearchBar)): ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$customerSearchBar['name']?></h5>
                        <h5 class="card-subtitle mb-2"><?=$customerSearchBar['first_name']?></h5>
                        <p class="card-text"><?=$customerSearchBar['phone_number']?></p>
                        <a href="/orders/add/<?=$customerSearchBar['id']?>" class="card-link btn btn-outline-success btn-sm btn-card" id="linkAddOrders">Ajouter</a>
                    </div>
                </div>
            <?php endif;  ?>
        </div>
    </div>

    <div class="container-right" id="container-right">
            <?php require 'components/tableOrders.php'?>
    </div>
</div>



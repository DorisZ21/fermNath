<div class="container-main">
    <div class="container-left">
        <?php require 'components/searchBar.php'?>
        <div class="container containerCard">
            <?php if(!empty($customerSearchBar)): ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$customerSearchBar['name']?></h5>
                        <h5 class="card-subtitle mb-2"><?=$customerSearchBar['first_name']?></h5>
                        <p class="card-text"><?=$customerSearchBar['phone_number']?></p>
                        <a href="#" class="card-link btn btn-outline-info btn-sm btn-card" id="lienConsulter">Consulter</a>
                        <a href="#" class="card-link btn btn-outline-success btn-sm btn-card" id="linkAddOrders">Ajouter</a>
                    </div>
                </div>
            <?php endif;  ?>
        </div>
    </div>

    <div class="container-right" id="container-right">
        <?php if(!empty($_POST['customerIdSearchBar'])): ?>
            <?php require '../public/components/tableOrders.php'; ?>
            <?php require '../public/forms/formOrder.php'; ?>
        <?php endif; ?>
    </div>
</div>



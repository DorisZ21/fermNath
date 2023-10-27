<div class="container-main">
    <div class="container-left">
        <?php require 'components/searchBar.php'?>
        <div class="container containerCard">
            <?php if(!empty($customer)): ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$customer['name']?></h5>
                        <h5 class="card-subtitle mb-2"><?=$customer['first_name']?></h5>
                        <p class="card-text"><?=$customer['phone_number']?></p>
                        <a href="#" class="card-link btn btn-outline-info btn-sm btn-card" id="lienConsulter">Consulter</a>
                        <a href="#" class="card-link btn btn-outline-primary btn-sm btn-card">Imprimer</a>
                        <a href="#" class="card-link btn btn-outline-success btn-sm btn-card">Ajouter</a>
                    </div>
                </div>
            <?php endif;  ?>
        </div>
    </div>

    <div class="container-right" id="container-right">

    </div>
</div>



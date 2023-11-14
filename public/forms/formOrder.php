<form action="" method="post" id="formOrder">
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$customer['name']?>" disabled >
    </div>
    <div class="mb-3">
        <label for="firstName" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="<?=$customer['first_name']?>" disabled >
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="pouletFilet">Poulet en filet</label>
        <input class="form-control" type="text" name="pouletFilet" id="pouletFilet" value="<?php echo (!empty($order['poulet_filet']) ? "$order[poulet_filet]" : '')?>">
    </div>

    <div class="mb-3">
        <label class="form-label" for="pouletDecoupe">Poulet découpé</label>
        <input class="form-control" type="text" name="pouletDecoupe" id="pouletDecoupe" value="<?php echo (!empty($order['poulet_decoupe']) ? "$order[poulet_decoupe]" : '')?>">
    </div>

    <div class="mb-3">
        <labe class="form-label" for="pouletScie">Poulet scié</label>
        <input class="form-control" type="text" name="pouletScie" id="pouletScie" value="<?php echo (!empty($order['poulet_scie']) ? "$order[poulet_scie]" : '')?>">
    </div>
    <div class="mb-3">
        <select class="form-control" id="selectDelivery" name="selectDelivery">
            <option selected="selected"  value="<?php echo (!empty($deliverySelect) ? "$deliverySelect[id]" : 'none') ?>"><?php echo (!empty($deliverySelect) ? "$deliverySelect[name] ($deliverySelect[date])" : 'Choisissez une livraison :') ?></option>
            <?php foreach ($deliveries as $delivery): ?>
                <?php
                    if($deliverySelect['id'] == $delivery['id']){
                        continue;
                    }
                ?>
                <option value="<?=$delivery['id']?>"><?=$delivery['name']?> (<?=$delivery['date']?>)</option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success" name="btnFormOrder">Valider</button>
</form>

<div class="table-responsive">
    <table class="table" id="tableOrders">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Poulet(s) scié</th>
            <th scope="col">Poulet(s) découpé</th>
            <th scope="col">Poulet(s) filet</th>
            <th scope="col">Livraison</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <th scope="row"><?=$order['id']?></th>
                    <td class="tdOrder"><?=$order['poulet_scie']?></td>
                    <td class="tdOrder"><?=$order['poulet_decoupe']?></td>
                    <td class="tdOrder"><?=$order['poulet_filet']?></td>
                    <td class="tdOrder"><?=$order['deliveryId']?></td>
                    <td class="tdOrder"><a href="/orders/update/<?=$order['id']?>" id="btnUpdateTableOrders" class="btn btn-primary btn-sm">Modifier</a> <a href="/orders/delete/<?=$order['id']?>" id="btnDeleteTableOrders" class="btn btn-danger btn-sm">Suprimer</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

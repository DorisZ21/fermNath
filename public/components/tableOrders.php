<table class="table table-responsive-lg  table-hover tableOrders" id="tableOrders">
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
    <?php foreach ($ordersByIdCustomer as $order): ?>
        <tr>
            <th scope="row"><?=$order['id']?></th>
            <td><?=$order['poulet_scie']?></td>
            <td><?=$order['poulet_decoupe']?></td>
            <td><?=$order['poulet_filet']?></td>
            <td><?=$order['deliveryId']?></td>
            <td><a href="" class="btn btn-primary btn-sm">Modifier</a> <a href="" class="btn btn-danger btn-sm">Suprimer</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <?= var_dump($ordersByIdCustomer) ?>
</table>
<div class="container container-searchBar">
    <h3 class="titleSearchBar">Rechercher un client </h3>
    <form action="" method="post" class="formSearchBar">
        <select class="searchBarOrders form-control" id="customerIdSearchBar" name="customerIdSearchBar">
            <option value="none">Rechercher un client</option>
            <?php foreach ($allCustomers as $customer): ?>
                <option value="<?=$customer['id']?>"><?=$customer['name']?> <?=$customer['first_name']?></option>
            <?php endforeach; ?>
        </select>
        <input class="btn btn-outline-success btn-sm"  type="submit" value="Rechercher"/>
    </form>
</div>
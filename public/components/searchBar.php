<form action="" method="post">
    <select class="searchBarOrders" id="customerIdSearchBar" name="customerIdSearchBar">
        <?php foreach ($allCustomers as $customer): ?>
            <option value="<?=$customer['id']?>"><?=$customer['name']?> <?=$customer['first_name']?></option>
        <?php endforeach; ?>
        <option value="d">dodo</option>
        <option value="d">dmao</option>
        <option value="d">maxo</option>
    </select>
    <button type="submit">Rechercher</button>
</form>
    
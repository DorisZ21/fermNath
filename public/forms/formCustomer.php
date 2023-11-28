<form action="" method="post">
    <div class="mb-3">
        <label for="nameCustomer">Nom</label>
        <input class="form-control" type="text" name="nameCustomer" value="<?= (!empty($infoCustomerUpdate) ? $infoCustomerUpdate['name'] : "") ?>">
    </div>
    <div class="mb-3">
        <label for="firstNameCustomer">Prenom</label>
        <input class="form-control" type="text" name="FirstNameCustomer" value="<?= (!empty($infoCustomerUpdate) ? $infoCustomerUpdate['first_name'] : "") ?>">
    </div>
    <div class="mb-3">
        <label for="phoneNumberCustomer">Numéro de téléphone</label>
        <input class="form-control" type="text" name="phoneNumberCustomer" value="<?= (!empty($infoCustomerUpdate) ? $infoCustomerUpdate['phone_number'] : "") ?>">
    </div>

    <div class="mb-3">
        <button class="btn btn-success" type="submit" name="submitFormCustomer">Valider</button>
    </div>
</form>
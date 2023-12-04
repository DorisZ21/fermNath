<?php

$routeur->map('GET|POST', '/customer/show', function() use ($conn){
    $allCustomers = selectAllCustomers($conn);
    if(!empty($_POST['customerIdSearchBar'])){
        $idCusotmer = htmlspecialchars($_POST['customerIdSearchBar']);
        $customerSearchBar = selectOneCustomer($conn,$idCusotmer);
    }
    require 'templates/customer/customerShowTemplate.php';
});

$routeur->map('GET|POST', '/customer/add',function() use($conn){
    if(isset($_POST['submitFormCustomer'])){
        if(!empty($_POST['nameCustomer'] && $_POST['firstNameCustomer'] && $_POST['phoneNumberCustomer'])){
            $nameCustomer = htmlspecialchars($_POST['nameCustomer']);
            $firstNameCustomer = htmlspecialchars($_POST['firstNameCustomer']);
            $phoneNumberCustomer = htmlspecialchars($_POST['phoneNumberCustomer']);
            $isValidated = addCustomer($conn,$nameCustomer,$firstNameCustomer,$phoneNumberCustomer);
            if($isValidated){
                $_SESSION['flashMessage'] = "Client ajouté avec succès !";
                $_SESSION['flashColor'] = "success";
                header('Location:/customer/show');
            }else{
                $_SESSION['flashMessage'] = "Erreur lors de l'ajout du client !";
                $_SESSION['flashColor'] = "danger";
                header('Location:/customer/show');
            }
        }
    }
    require 'templates/customer/customerAddTemplate.php';
});

$routeur->map('GET|POST','/customer/update/[i:id]', function($id) use ($conn){
    if(!empty($id)){
        $idCustomer = htmlspecialchars($id['id']);
        $infoCustomerUpdate = selectOneCustomer($conn,$idCustomer);
    }

    if(isset($_POST['submitFormCustomer'])){
        if(!empty($_POST['nameCustomer'] && $_POST['firstNameCustomer'] && $_POST['phoneNumberCustomer'])){
            $nameCustomer = htmlspecialchars($_POST['nameCustomer']);
            $firstNameCustomer = htmlspecialchars($_POST['firstNameCustomer']);
            $phoneNumberCustomer = htmlspecialchars($_POST['phoneNumberCustomer']);
            $isValidated = updateCustomer($conn,$nameCustomer,$firstNameCustomer,$phoneNumberCustomer,$idCustomer);
            if($isValidated){
                $_SESSION['flashMessage'] = "Client modifié avec succès !";
                $_SESSION['flashColor'] = "success";
                header('Location:/customer/show');
            }else{
                $_SESSION['flashMessage'] = "Erreur lors de la modification du client !";
                $_SESSION['flashColor'] = "danger";
                header('Location:/customer/show');
            }
        }
    }
    require 'templates/customer/customerUpdateTemplate.php';
});

$routeur->map('GET|POST','/customer/delete/[i:id]', function($id) use ($conn){
    if(!empty($id)){
        $idCustomer = htmlspecialchars($id['id']);
        $isValidated = deleteCustomer($conn,$idCustomer);
        if($isValidated){
            $_SESSION['flashMessage'] = "Client supprimé avec succès !";
            $_SESSION['flashColor'] = "success";
            header('Location:/customer/show');
        }else{
            $_SESSION['flashMessage'] = "Erreur lors de la suppression du client !";
            $_SESSION['flashColor'] = "danger";
            header('Location:/customer/show');
        }
    }
});

$match = $routeur->match();

if(is_array($match)){
    $pageOk = true;
}else{
    $pageOk = false;
}

?>
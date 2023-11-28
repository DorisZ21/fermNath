<?php

$routeur->map('GET|POST', '/customer/show', function() use ($conn){
    $allCustomers = selectAllCustomers($conn);
    if(!empty($_POST['customerIdSearchBar'])){
        $idCusotmer = htmlspecialchars($_POST['customerIdSearchBar']);
        $customerSearchBar = selectOneCustomer($conn,$idCusotmer);
    }
    require 'templates/customer/customerShowTemplate.php';
});

$routeur->map('GET|POST','/customer/update/[i:id]', function($id) use ($conn){
    if(!empty($id)){
        $idCustomer = htmlspecialchars($id['id']);
        $infoCustomerUpdate = selectOneCustomer($conn,$idCustomer);
    }

    if(!isset($_POST['submitFormCustomer'])){
        if(!empty($_POST['nameCustomer'] && $_POST['firstNameCustomer'] && $_POST['phoneNumberCustomer'])){
            $nameCustomer = htmlspecialchars($_POST['nameCustomer']);
            $firstNameCustomer = htmlspecialchars($_POST['firstNameCustomer']);
            $phoneNumberCustomer = htmlspecialchars($_POST['phoneNumberCustomer']);
            $isValidated = updateCustomer($conn,$nameCustomer,$firstNameCustomer,$phoneNumberCustomer);
            if($isValidated){
                header('Location:');
            }else{

            }
        }
    }
    require 'templates/customer/customerUpdateTemplate.php';
});


$match = $routeur->match();

if(is_array($match)){
    $pageOk = true;
}else{
    $pageOk = false;
}

?>
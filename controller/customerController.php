<?php

$routeur->map('GET|POST', '/customer/show', function() use ($conn){
    $allCustomers = selectAllCustomers($conn);
    if(!empty($_POST['customerIdSearchBar'])){
        $idCusotmer = htmlspecialchars($_POST['customerIdSearchBar']);
        $customerSearchBar = selectOneCustomer($conn,$idCusotmer);
    }
    require 'templates/customer/customerShowTemplate.php';
});


$match = $routeur->match();

if(is_array($match)){
    $pageOk = true;
}else{
    $pageOk = false;
}

?>
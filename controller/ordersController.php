<?php
require '../model/customersModel.php';
// Routeur page commandes
$routeur->map('GET|POST','/orders',function () use ($conn){
    $allCustomers = selectAllCustomers($conn);
    if(!empty($_POST['customerIdSearchBar'])){
        $idCustomer = htmlspecialchars($_POST['customerIdSearchBar']);
        $customer = selectOneCustomer($conn,$idCustomer);
        $orderByIdCustomer = selectOrderByIdCustomer($conn,$idCustomer);
        var_dump($orderByIdCustomer);
    }
    require 'templates/orders/ordersTemplate.php';

},'orders');

$match = $routeur->match();

if(is_array($match)){
    $pageOk = true;
}else{
    $pageOk = false;
}
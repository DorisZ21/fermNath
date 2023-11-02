<?php

// Routeur page commandes
$routeur->map('GET|POST','/orders',function () use ($conn){
    $allCustomers = selectAllCustomers($conn);
    if(!empty($_POST['customerIdSearchBar'])){
        $idCustomer = htmlspecialchars($_POST['customerIdSearchBar']);
        $customerSearchBar = selectOneCustomer($conn,$idCustomer);
        $ordersByIdCustomer = selectOrdersByIdCustomer($conn,$idCustomer);
    }
    require 'templates/orders/ordersTemplate.php';

},'orders');

$routeur->map('GET','/orders/add/[i:idCustomer]',function ($idCustomer) use ($conn){
    $idCustomer = $idCustomer['idCustomer'];
    $deliveries = selectAllDelivery($conn);
    $customer = selectOneCustomer($conn,$idCustomer);
    require 'templates/orders/ordersAddTemplate.php';
},'addOrders');

$match = $routeur->match();

if(is_array($match)){
    $pageOk = true;
}else{
    $pageOk = false;
}
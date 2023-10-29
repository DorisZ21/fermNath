<?php

function selectOrdersByIdCustomer($conn,$idCustomer){
    try {
        $selectOrders = $conn->prepare("SELECT * FROM orders WHERE customerId =:idCustomer");
        $selectOrders->execute([
            'idCustomer' => $idCustomer
        ]);
        $ordersByIdCustomer = $selectOrders->fetchAll();
        return $ordersByIdCustomer;
    }catch(PDOException $e){
        echo 'ERROR: '.$e->getMessage();
    }

}
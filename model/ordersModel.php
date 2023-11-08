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

function addOrder($conn,$pouletsFilets,$pouletsScies,$pouletsDecoupes,$customerId,$deliveryId) : bool{
    try{
        $queryAddOrder = $conn->prepare("INSERT INTO orders (deliveryId,customerId,poulet_scie,poulet_filet,poulet_decoupe) VALUES (:deliveryId,:customerId,:poulet_scie,:poulet_filet,:poulet_decoupe)");
        $queryAddOrder->execute([
            'deliveryId' => $deliveryId,
            'customerId' => $customerId,
            'poulet_scie' => $pouletsScies,
            'poulet_filet' => $pouletsFilets,
            'poulet_decoupe' => $pouletsDecoupes
        ]);
        return true;
    }catch (PDOException $e){
        echo 'ERROR: '.$e->getMessage();
        return false;
    }
}

function deleteOrder($conn,$orderId):bool{
    try {
        $queryDeleteOrder = $conn->prepare("DELETE FROM orders WHERE id =:orderId");
        $queryDeleteOrder->execute([
            'orderId' => $orderId
        ]);
        return true;
    }catch (PDOException $e){
        echo 'ERROR: '.$e->getMessage();
        return false;
    }
}
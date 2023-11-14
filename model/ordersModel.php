<?php
function selectOneOrder($conn,$idOrder){
    try {
        $selectOneOrder = $conn->prepare("SELECT * FROM orders WHERE id =:idOrder");
        $selectOneOrder->execute([
            'idOrder' => $idOrder
        ]);
        $oneOrder = $selectOneOrder->fetch();
        return $oneOrder;
    }catch(PDOException $e){
        echo 'ERROR: '.$e->getMessage();
    }

}
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

function selectOrderByIdDelivery(int $idDelivery,$conn){
    try {
        $queryOrderByIdDelivery = $conn->prepare("SELECT * FROM orders WHERE deliveryId = :idDelivery ");
        $queryOrderByIdDelivery->execute([
            'idDelivery' => $idDelivery
        ]);
        $resultOrders = $queryOrderByIdDelivery->fetchAll();
        return $resultOrders;
    }catch (PDOException $e){
        echo "ERROR : ".$e->getMessage();
    }
}

function addOrder($conn,$pouletsFilet,$pouletsScie,$pouletsDecoupe,$customerId,$deliveryId) : bool{
    try{
        $queryAddOrder = $conn->prepare("INSERT INTO orders (deliveryId,customerId,poulet_scie,poulet_filet,poulet_decoupe) VALUES (:deliveryId,:customerId,:poulet_scie,:poulet_filet,:poulet_decoupe)");
        $queryAddOrder->execute([
            'deliveryId' => $deliveryId,
            'customerId' => $customerId,
            'poulet_scie' => $pouletsScie,
            'poulet_filet' => $pouletsFilet,
            'poulet_decoupe' => $pouletsDecoupe
        ]);
        return true;
    }catch (PDOException $e){
        echo 'ERROR: '.$e->getMessage();
        return false;
    }
}

function updateOrder($conn,$pouletFilet,$pouletScie,$pouletDecoupe,$deliveryId,$orderId):bool{
    try{
        $queryUpdateOrder = $conn->prepare("UPDATE orders SET poulet_filet = :poulet_filet, poulet_decoupe = :poulet_decoupe, poulet_scie = :poulet_scie, deliveryId = :deliveryId WHERE id = :id");
        $queryUpdateOrder->execute([
            'poulet_filet' => $pouletFilet,
            'poulet_decoupe' => $pouletDecoupe,
            'poulet_scie' => $pouletScie,
            'deliveryId' => $deliveryId,
            'id' => $orderId
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
<?php

function selectOrderByIdCustomer($conn,$idCustomer){
    try {
        $selectOrder = $conn->prepare('SELECT * FROM order WHERE customer_id_id = :idCustomer');
        $selectOrder->execute(array(
            'idCustomer' => $idCustomer
        ));
        $orderByIdCustomer = $selectOrder->fetchAll();
    }catch(PDOException $e){
        echo 'ERROR: '.$e->getMessage();
    }

}
<?php
// fonction qui sélectionne tout les clients

function selectOneCustomer($conn,$id){
    try {
        $query = $conn->prepare("SELECT * FROM customer WHERE id = :id");
        $query->execute([
            'id' =>(int) $id
        ]);
        $result = $query->fetch();
        return $result;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
function selectAllCustomers($conn){
    try {
        $query = $conn->prepare("SELECT * FROM customer");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
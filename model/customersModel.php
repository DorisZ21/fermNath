<?php
// fonction qui sélectionne tout les clients
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
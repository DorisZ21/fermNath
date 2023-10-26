<?php
require '../config/connect.php';

// Fonction qui séléctionne toutes les livraisons
function selectAllDelivery($conn){
    try {
        $query = "SELECT * FROM delivery";
        $selectAll = $conn->prepare($query);
        $selectAll->execute();
        $delivery = $selectAll->fetchAll();
        return $delivery;
    }catch (PDOException $e){
        die($e->getMessage());
    }

}

// Fonction qui sélectionne une livraison par son id
function selectOneDelivery($conn,int $idDelivery){
    try{
        $query = "SELECT * FROM delivery WHERE id= :idDelivery";
        $selectOne = $conn->prepare($query);
        $selectOne->execute([
            'idDelivery' => $idDelivery
        ]);
        $delivery = $selectOne->fetch();
        return $delivery;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

// Fonction qui ajoute une livraison
function addDelivery($conn,$name,$date){
    try {
        $query = "INSERT INTO delivery(name,date) VALUES (:name,:date)";
        $addDelivery = $conn->prepare($query);
        $addDelivery->execute([
            'name' => $name,
            'date' => $date
        ]);
        return true;
    }catch (PDOException $e){
        die($e->getMessage());
        return false;
    }
}

// Fonction qui modifie une livraison
function updateDelivery($conn,int $idDelivery,$name,$date){
    try{
        $query = "UPDATE delivery SET name=:name,date=:date WHERE id=:idDelivery";
        $updateDelivery = $conn->prepare($query);
        $updateDelivery->execute([
            'idDelivery' => $idDelivery,
            'name' => $name,
            'date' => $date
        ]);
        return true;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

// Fonction qui supprime une livraison
function deleteDelivery($conn,int $idDelivery){
    try{
        $query = "DELETE FROM delivery WHERE id=:idDelivery";
        $deleteDelivery = $conn->prepare($query);
        $deleteDelivery->execute([
            'idDelivery' => $idDelivery
        ]);
        return true;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}
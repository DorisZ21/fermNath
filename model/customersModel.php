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

function addCustomer($conn,$name,$firstName,$phoneNumber){
    try {
        $queryAddCustomer = $conn->prepare("INSERT INTO customer (name,first_name,phone_number) VALUES(:name,:firstName,:phoneNumber)");
        $queryAddCustomer->execute([
            'name' => $name,
            'firstName' => $firstName,
            'phoneNumber' => $phoneNumber
        ]);
        return true;
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
}

function updateCustomer($conn,$name,$firstName,$phoneNumber,$id){
    try {
        $queryUpdateCustomer = $conn->prepare("UPDATE customer SET name = :name, first_name = :firstName, phone_number = :phoneNumber WHERE id = :id");
        $queryUpdateCustomer->execute([
            'name' => $name,
            'firstName' => $firstName,
            'phoneNumber' => $phoneNumber,
            'id' => $id
        ]);
        return true;
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }

}

function deleteCustomer($conn,$id){
    try {
        $queryDeleteCustomer = $conn->prepare("DELETE FROM customer WHERE id = :id");
        $queryDeleteCustomer->execute([
            'id' => $id
        ]);
        return true;
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
}
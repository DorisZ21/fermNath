<?php
// Routeur page commandes
$routeur->map('GET|POST','/orders/show',function () use ($conn){
    $allCustomers = selectAllCustomers($conn);
    if(!empty($_POST['customerIdSearchBar'])){
        $idCustomer = htmlspecialchars($_POST['customerIdSearchBar']);
        $customerSearchBar = selectOneCustomer($conn,$idCustomer);
        $orders = selectOrdersByIdCustomer($conn,$idCustomer);
    }
    require 'templates/orders/ordersTemplate.php';

},'orders');

$routeur->map('GET|POST','/orders/add/[i:idCustomer]',function ($idCustomer) use ($conn){
    $idCustomer = htmlspecialchars($idCustomer['idCustomer']);
    $deliveries = selectAllDelivery($conn);
    $customer = selectOneCustomer($conn,$idCustomer);
    if(isset($_POST['btnFormOrder'])){
       if(!empty($_POST['pouletDecoupe'] || $_POST['pouletScie'] || $_POST['pouletFilet'])){
           $pouletDecoupe = htmlspecialchars($_POST['pouletDecoupe']);
           $pouletScie = htmlspecialchars($_POST['pouletScie']);
           $pouletFilet = htmlspecialchars($_POST['pouletFilet']);
           $orderAddOk = addOrder($conn,$pouletFilet,$pouletScie,$pouletDecoupe,$idCustomer,$_POST['selectDelivery']);
           if($orderAddOk){
               $_SESSION['flashMessage'] = "Commande ajoutée avec succès";
               $_SESSION['flashColor'] = "success";
               // Faire le redirect vers la page des commandes et afficher le message flash
           }else{
                $_SESSION['flashMessage'] = "Erreur lors de l'ajout de la commande";
                $_SESSION['flashColor'] = "danger";
           }
       }else{
           $_SESSION['flashMessage'] = "Veuillez remplir au moins un champ";
           $_SESSION['flashColor'] = "danger";
       }
    }
    require 'templates/orders/ordersAddTemplate.php';
},'addOrders');

$routeur->map("GET|POST",'/orders/update/[i:idOrder]',function ($idOrder) use ($conn){
    $idOrder = htmlspecialchars($idOrder['idOrder']);
    $order = selectOneOrder($conn,$idOrder);
    $customer = selectOneCustomer($conn,$order['customerId']);
    $deliverySelect = selectOneDelivery($conn,$order['deliveryId']);
    $deliveries = selectAllDelivery($conn);
    if(isset($_POST['btnFormOrder'])){
        if(!empty($_POST['pouletDecoupe'] || $_POST['pouletScie'] || $_POST['pouletFilet'])){
            $pouletDecoupe = htmlspecialchars($_POST['pouletDecoupe']);
            $pouletScie = htmlspecialchars($_POST['pouletScie']);
            $pouletFilet = htmlspecialchars($_POST['pouletFilet']);
            $orderUpdateOk = updateOrder($conn,$pouletFilet,$pouletScie,$pouletDecoupe,$_POST['selectDelivery'],$idOrder);
            if($orderUpdateOk){
                $_SESSION['flashMessage'] = "Commande modifiée avec succès";
                $_SESSION['flashColor'] = "success";
            }else{
                $_SESSION['flashMessage'] = "Erreur lors de la modification de la commande";
                $_SESSION['flashColor'] = "danger";
            }
        }else{
            $_SESSION['flashMessage'] = "Veuillez remplir au moins un champ";
            $_SESSION['flashColor'] = "danger";
        }
    }
    require 'templates/orders/ordersUpdateTemplate.php';
},'updateOrders');



$routeur->map("GET",'/orders/delete/[i:idOrder]',function ($idOrder) use ($conn){
    $idOrder = htmlspecialchars($idOrder['idOrder']);
    $orderDeleteOk = deleteOrder($conn,$idOrder);
    if($orderDeleteOk){
        $_SESSION['flashMessage'] = "Commande supprimée avec succès";
        $_SESSION['flashColor'] = "success";
    }else{
        $_SESSION['flashMessage'] = "Erreur lors de la suppression de la commande";
        $_SESSION['flashColor'] = "danger";
    }
    header('Location: /orders/show');
},'deleteOrders');

$match = $routeur->match();

if(is_array($match)){
    $pageOk = true;
}else{
    $pageOk = false;
}
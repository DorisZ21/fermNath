<?php
// Routeur pour l'affichage des livraisons
$routeur->map('GET','/delivery/show',function () use ($conn){
    $deliveries = selectAllDelivery($conn);
    require 'templates/delivery/deliveryShowTemplate.php';
});
// Routeur pour l'ajout d'une livraison
$routeur->map('GET|POST','/delivery/add', function () use($conn){
    if(!empty($_POST['titled'])){
        $titled = htmlspecialchars($_POST['titled']);
        if(!empty($_POST['date'])){
            $date = htmlspecialchars($_POST['date']);
            $statut = addDelivery($conn,$titled,$date);
            if($statut){
                $_SESSION['flashMessage'] = "Livraison ajouté avec succès !";
                $_SESSION['flashColor'] = "success";
                header('Location:/delivery/show');
            }else{
                $_SESSION['flashMessage'] = "Erreur lors de l'ajout de la livraison !";
                $_SESSION['flashColor'] = "danger";
                header('Location:/delivery/show');
            }
        }
    }
    require 'templates/delivery/deliveryAddTemplate.php';
});
// Routeur pour la modification d'une livraison
$routeur->map('GET|POST','/delivery/update/[i:idDelivery]', function ($idDelivery) use($conn){
    $idDeliveryUpdate = htmlspecialchars((int) $idDelivery['idDelivery']);
    $resultDeliveryUpd = selectOneDelivery($conn,$idDeliveryUpdate);
    $dateDeliveryUpd = date('Y-m-d',strtotime($resultDeliveryUpd['date']));
    if(!empty($_POST['titled']) && !empty($_POST['date'])){
        $name = htmlspecialchars($_POST['titled']);
        $date = htmlspecialchars($_POST['date']);
        $dateFormat = date('Y-m-d',strtotime($date));
        $statut = updateDelivery($conn,$idDeliveryUpdate,$name,$dateFormat);
        if($statut){
            $_SESSION['flashMessage'] = "Livraison modifié avec succès !";
            $_SESSION['flashColor'] = "success";
            header('Location:/delivery/show');
        }else{
            $_SESSION['flashMessage'] = "Erreur lors de la modification de la livraison !";
            $_SESSION['flashColor'] = "danger";
            header('Location:/delivery/show');
        }
    }
    require 'templates/delivery/deliveryUpdateTemplate.php';
});
// Routeur pour supprimer une livraison
$routeur->map('GET','/delivery/delete/[i:idDelivery]',function ($idDelivery) use ($conn){
    $statut = deleteDelivery($conn,(int)$idDelivery['idDelivery']);
    if($statut){
        $_SESSION['flashMessage'] = "Livraison supprimé avec succès !";
        $_SESSION['flashColor'] = "success";
        header('Location:/delivery/show');
    }else{
        $_SESSION['flashMessage'] = "Erreur lors de la suppression de la livraison !";
        $_SESSION['flashColor'] = "danger";
        header('Location:/delivery/show');
    }
});
// match() permet de vérifier si l'url correspond à une route
$match = $routeur->match();
if(is_array($match)){
    $pageOk = true;
    if(empty($_SESSION['isConnected']) && $match['name'] != "login" && $match['name'] != "home"){
        $_SESSION['flashMessage'] = "Cette page est réservé aux admins";
        $_SESSION['flashColor'] = "danger";
        require 'templates/errors/errorNotLogin.php';
    }else{
        call_user_func($match['target'],$match['params']);
    }
}else{
    $pageOk = false;
}

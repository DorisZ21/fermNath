<div class="container">
    <h1 class="title-margin">Ajouter une commande</h1>
    <?php if(!empty($_SESSION['flashMessage'])): ?>
        <?php require 'components/alertFlashMessage.php'?>
    <?php endif; ?>
    <?php require 'forms/formOrder.php' ?>
</div>



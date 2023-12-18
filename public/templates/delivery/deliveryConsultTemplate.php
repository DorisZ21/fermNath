<div class="container">
    <h1 class="title-margin"> </h1>
    <?php require 'components/tableOrders.php'?>
</div>

<form>
    <input id="impression" name="impression" type="button" onclick="print_page()" value="Imprimer cette page" />
</form>

<script>
    function print_page(){
        window.print();
    };
</script>


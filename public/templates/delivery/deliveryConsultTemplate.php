<div class="container">
    <h1 class="title-margin"> </h1>
    <?php require 'components/tableOrders.php'?>
    <form>
        <input class="btn btn-primary" id="impression" name="impression" type="button" onclick="print_page()" value="Imprimer cette page" />
    </form>
</div>



<script>
    function print_page(){
        window.print();
    };
</script>


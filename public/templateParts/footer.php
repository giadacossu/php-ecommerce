<?php
//
$cm = new CartManager();
$cartId = $cm->getCurrentCartId();

$cartTotal = $cm->getCartTotal($cartId);

?>

</main>
<footer class="bg-primary">
    <hr>
    <p class="container text-light">Copyright &copy;2024</p>
</footer>
<script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://bootswatch.com/_vendor/prismjs/prism.js"></script>
<script src="<?php echo ROOT_URL;?>assets/js/main.js"></script>
<script >
/**$(document).ready(function(){
    $('.js-totCartsItems').html('<?php echo $cartTotal['num_products'];?> ')
})
*/
</script>
</body>

</html>

<?php
if(!defined('ROOT_URL')){//se non è passato per l'index non verra definito il root url cio avviene se l'utente cerca di manipolare l'url
die;
}

if(isset($_POST['addToCart'])){
    //add carrello
    $productId= htmlspecialchars(trim($_POST['id']));
    //addto cart logic 
    $cm= new CartManager();
    $cartId=$cm->getCurrentCartId();
  
    //agiungi al carrello cartid  il prodotto productid
    $cm->addToCart($productId,$cartId);
echo 'prodotto aggiunto';  
}


$productM = new ProductsManager();
$products = $productM->getAll();
//$products =null;
//$products = $productM->get(1);
//var_dump($products)


?>
<div clas="row">
    <?php
    if ($products) :
        foreach ($products as $product) :
    ?>

            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->name ?></h5>
                    <p class="card-text"><?php echo $product->description ?>.</p>
                    <p class="card-text"><?php echo $product->price ?></p>
                    <a href="<?php echo ROOT_URL . 'shop?page=viewProducts&id='. $product->id?>" class="btn btn-primary">vedi il prodotto</a>
                    <form method="post"  >
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                       
                        <input type="submit" name="addToCart" value="aggiungi al carrello"> 
                    </form>
                </div>
            </div>


        <?php endforeach; ?>
    <?php else : ?>
        <p>nessun prodotto disponibile..</p>

    <?php endif; ?>
   
</div>
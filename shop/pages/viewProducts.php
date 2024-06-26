<?php
if(!defined('ROOT_URL')){//se non è passato per l'index non verra definito il root url cio avviene se l'utente cerca di manipolare l'url
    die;
}

if(!isset($_GET['id'])){
    echo "<script>location.href='".ROOT_URL."'</script>";
exit;
}

if(isset($_POST['addToCart'])){
  $productId= htmlspecialchars(trim($_POST['id']));
  //addto cart logic 
  $cm= new CartManager();
  $cartId=$cm->getCurrentCartId();

  //agiungi al carrello cartid  il prodotto productid
  $cm->addToCart($productId,$cartId);


  ///stampato un messaggio per l'utente 
}


$id=htmlspecialchars(trim($_GET['id']));//toglie gli spazi trim // special trim pulisce il codice inserito 
echo($id);

$pm= new ProductsManager();
$product= $pm->get($id);

if(!(property_exists($product, 'id'))){//gli passo l'oggetto e cosa deve controllare in questo caso id 
echo "<script>location.href='".ROOT_URL."'</script>";
exit;
}
//var_dump($product)



?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $product->name;?></h5>
        <p class="card-text"><?php echo $product->description;?></p>
        <p class="card-text"><small class="text-body-secondary"><?php echo $product->description;?></small></p>
        <form method="post"  >
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                       
                        <input type="submit" name="addToCart" value="aggiungi al carrello"> 
                    </form>
      </div>
    </div>
  </div>
</div>
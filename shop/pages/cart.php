<?php



$cartTotal=[
    'numProducts'=>3,
    'total'=>35.00
];

$cartItems=[
    [
        'name'=>'prodotto 1',
        'description'=>'bellissimo',
        'single_price'=>29,
        'quantity'=>2,
        'total_price'=>58
    ],
    [
        'name'=>'prodotto 2',
        'description'=>'bellissimo',
        'single_price'=>29,
        'quantity'=>2,
        'total_price'=>58
    ],
    [
        'name'=>'prodotto 3',
        'description'=>'wow',
        'single_price'=>29,
        'quantity'=>2,
        'total_price'=>58
    ],

];

?>
<div class="col-12 order-md-last mt-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Carrello</span>
        <span class="badge bg-primary rounded-pill"><?php echo $cartTotal['numProducts'];?> elementi nel carrello
        </span>
    </h4>
<?php if(count($cartItems)):?>
    <ul class="list-group mb-3">
        <?php foreach ($cartItems as $item ):?>

        <li class="list-group-item d-flex justify-content-between lh-sm ">
            <div class="row w-100">
                <div class="col-lg-4 col-6">
                    <h6 class="my-0"><?php echo $item['name'];?></h6>
                    <small class="text-body-secondary"><?php echo $item['description'];?></small>
                </div>

                <div class="col-lg-2 col-6">
                    <span class="text-muted"><?php echo $item['single_price'];?></span>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="btn-group carts-button" role="group">
                        <button type="button" class=" btn btn-sm btn-primary">-</button>
                        <span class="text-muted"><?php echo $item['quantity'];?></span>
                        <button type="button" class="btn btn-sm btn-primary">+</button>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <span class="text-muted"><?php echo $item['total_price'];?></span>

                </div>

            </div>

        </li>
        <?php  endforeach;?>
     

        <li class="list-group-item d-flex justify-content-between p-4 cart-total">
            <div class="row w-100">
                <div class="col-lg-4 col-6">
                    <span>Totale </span>
                </div>
                <div class="col-lg-6 lg-screen">
                </div>
                <div class="col-lg-2 col-6">
                    <span><?php echo $cartTotal['total']?></span>
                </div>
            </div>
        </li>

    </ul>

    <form class="card p-2">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Checkout</button>
        </div>

    </form>
    <?php else:?>
        <p class="lead"> nessun elemento nel carrello torna a fare acquisti </p>
        <a href='<?php echo ROOT_URL ?>shop/?page=productsList' class="btn btn-primary "> Torna  a fare acquisti</a>
    <?php endif;?>
</div>